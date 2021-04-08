<?php

namespace App\Http\Livewire\Backend;

use Laravel\Jetstream\HasProfilePhoto;
use App\Actions\Fortify\PasswordValidationRules;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;


use App\Models\User;
use App\Models\Team;
use Carbon\Carbon;
use Str;
use Storage;
use Image;
use DB;

class Users extends Component
{
    use WithPagination, WithFileUploads, PasswordValidationRules;

    public $module = 'users';

    protected $pagination = 5;

    protected $paginationTheme = 'tailwind';

    public $tab = 'index';

    public $isForm = 0;

    public $sort,$show;

    public $sortBy,$showDataTotal;

    public $search;

    public $searchClear;

    public $onSave;

    public $confirmArchive;

    public $confirmDestroy;

    public $method;

    public $modelTeam, $setModelTeam;
    
    public 
    $userId, 
    $name, 
    $username, 
    $email, 
    $profile_photo_path, 
    $password,
    $password_confirmation,
    $current_team_id,
    $active, 
    $updated_at;


    /**
     * The attributes that are mount assignable.
     *
     * @var array
     */
    public function mount(Request $request)
    {
        $this->method                = 'POST';
        $this->name                  = $request->name;
        $this->username              = $request->username;
        $this->email                 = $request->email;
        $this->profile_photo_path    = $request->profile_photo_path;
        $this->password              = $request->password;
        $this->password_confirmation = $request->password_confirmation;
        $this->active                = $request->active;
        $this->current_team_id       = $request->current_team_id;

        $this->modelTeam = Team::pluck('name','id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->userId                = null;
        $this->name                  = null;
        $this->username              = null;
        $this->email                 = null;
        $this->profile_photo_path    = null;
        $this->password              = null;
        $this->password_confirmation = null;
        $this->active                = null;
        $this->submitted_at          = null;
        $this->current_team_id       = null;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $pageName = ucfirst((new User)->module);

        $this->sort = array(
            'name-asc'        => 'name (ascending)',
            'name-desc'       => 'name (descending)',
            'username-asc'    => 'username (ascending)',
            'username-desc'   => 'username (descending)',
            'email-asc'       => 'email (ascending)',
            'email-desc'      => 'email (descending)',
            'created_at-asc'  => 'created at (ascending)',
            'created_at-desc' => 'created at (descending)',
        );

        $this->show = array(
            '5' => 5,
            '10' => 10,
            '25' => 25,
            '50' => 50,
        );

        $showDataTotal = ($this->showDataTotal) ? $this->showDataTotal : $this->pagination;

        if($this->search == null) {
            if($this->tab == 'index') {  

                if($this->sortBy) {
                    $expSort = explode('-',$this->sortBy);
                    $users = User::orderBy($expSort[0],$expSort[1])->paginate($showDataTotal);
                } else {
                    $users = User::descending()->paginate($showDataTotal);
                }

            } else {
                if($this->sortBy) {
                    $expSort = explode('-',$this->sortBy);
                    $users = User::onlyTrashed()->orderBy($expSort[0],$expSort[1])->paginate($showDataTotal);
                } else {
                    $users = User::onlyTrashed()->descending()->paginate($showDataTotal);
                }

            }
        } else {
            if($this->tab == 'index') {  
                $users = User::where('name','like','%'.$this->search.'%')
                ->where('email','like','%'.$this->search.'%')->descending()->paginate($showDataTotal);
            } else {
                $users = User::onlyTrashed()->where('name','like','%'.$this->search.'%')
                ->where('email','like','%'.$this->search.'%')->descending()->paginate($showDataTotal);
            }
        }

        foreach($users as $key => $user) {
            if($this->page && $this->page <> 1) {
                $current = $users->currentpage();
                $perpage = $users->perpage();
                $loop = ($current-1) * $perpage + 1 + $key;
            } else {
                $loop = $key+1;
            }
            $user->no = $loop;
        }
        
        return view('livewire.backend.users.index',compact('pageName',$this->module));

        $this->closeForm();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $user            = new User;
        $this->user      = $user;
        $this->method    = 'POST';

        $this->resetInputFields();
        $this->openForm();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $user                     = User::findOrFail($id);
        $this->method             = 'PUT';
        $this->userId             = $id;
        $this->user               = $user;
        $this->name               = $user->name;
        $this->username           = $user->username;
        $this->email              = $user->email;
        $this->profile_photo_path = $user->profile_photo_path;
        $this->password           = null;
        $this->active             = $user->active;
        $this->current_team_id    = $user->current_team_id;
        $this->updated_at         = $user->updated_at;
     
        $this->openForm();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store(Request $request)
    {
        if($this->method == 'POST') {
            $this->validate([
                'name'            => 'required|string|max:255',
                'username'        => 'required|max:255|'.Rule::unique('users'),
                'email'           => 'required|email|max:255|'.Rule::unique('users'),
                'password'        => $this->passwordRules(),
            ]);
        } else {
            $this->validate([
                'name'            => 'required|string|max:255',
                'username'        => 'required|unique:users,username,'.$this->userId,
                'email'           => 'required|email|unique:users,email,'.$this->userId,
            ]);
        }
        if (\Laravel\Jetstream\Jetstream::hasTeamFeatures()) {
            $this->validate([
                'current_team_id' => 'required',
            ]);
        }
        // if clear image 
        if($this->method == 'PUT' && $this->profile_photo_path == null) {
            $users = User::find($this->userId);
            Storage::disk('public')->delete('profile-photos/'.$users->profile_photo_path);
        }
        // image
        if (count(collect($this->profile_photo_path)) > 1) {

            $this->validate([
                'profile_photo_path' => 'nullable|image|max:5000',
            ]);
            // remove old image on put
            if($this->method == 'PUT') {
                $users = User::find($this->userId);
                Storage::disk('public')->delete('profile-photos/'.$users->profile_photo_path);
            }

            $renamePhoto    = preg_replace('/\..+$/', '', $this->profile_photo_path->getClientOriginalName());
            $uploadPhoto    = 'profile-photos/'.Str::slug($renamePhoto, '-') . '-' . Str::random(5) . '.' . $this->profile_photo_path->getClientOriginalExtension();
            $this->profile_photo_path->storeAs('public/',$uploadPhoto);
            
            $putPhoto    = $uploadPhoto;
        } else {
            $putPhoto    = $this->profile_photo_path;
        }
        $input = [
            'name'               => $this->name,
            'username'           => $this->username,
            'email'              => $this->email,
            'profile_photo_path' => $putPhoto,
            'active'             => ($this->active) ? 1 : 0,
            'current_team_id'    => $this->current_team_id,
        ];

        if($this->method == 'POST') {
            $inputPassword = [
                'password'    => Hash::make($this->password),
            ];
            User::updateOrCreate(['id' => $this->userId], $input + $inputPassword);
        } else {
            User::updateOrCreate(['id' => $this->userId], $input);
        }


        $this->userId ? $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.updated',array('attribute' => (new User)->module))]) : $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.created',array('attribute' => (new User)->module))]);
        
        if($this->onSave == 'exit') {
            $this->closeForm();
            $this->resetInputFields();
        }
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function updatePassword(Request $request)
    {
        $this->validate([
            'password' => $this->passwordRules(),
        ]);

        $user = User::find($this->userId);
        $user->password = Hash::make($this->password);
        $user->update();
        
        $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.password',array('attribute' => (new User)->module))]);

        $this->password              = null;
        $this->password_confirmation = null;
    }
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function restore($id)
    {
        User::withTrashed()->find($id)->restore();
        $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.restored',array('attribute' => (new User)->module))]);
    }

    /**
     * Confirm that the user would like to delete their account.
     *
     * @return void
     */
    public function confirmArchive($id)
    {
        $this->confirmArchive = $id;
    }

    /**
     * Confirm that the user would like to delete their account.
     *
     * @return void
     */
    public function cancelArchive()
    {
        $this->confirmArchive = false;
    }
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function archive($id)
    {
        User::find($id)->delete();
        $this->emit('alert', ['type' => 'warning', 'message' => __('validation.action.archived',array('attribute' => (new User)->module))]);
    }

    /**
     * Confirm that the user would like to delete their account.
     *
     * @return void
     */
    public function confirmDestroy($id)
    {
        $this->confirmDestroy = $id;
    }

    /**
     * Confirm that the user would like to delete their account.
     *
     * @return void
     */
    public function cancelDestroy()
    {
        $this->confirmDestroy = false;
    }
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function destroy($id)
    {
        $users = User::withTrashed()->find($id);
        if($users->image) {
            Storage::disk('public')->delete('profile-photos/'.$users->image);
        }
        $users->forceDelete();
        $this->emit('alert', ['type' => 'error', 'message' => __('validation.action.destroyed',array('attribute' => (new User)->module))]);
    }



    public function sortBy()
    {
        $this->sortBy;
    }

    public function showDataTotal()
    {
        $this->showDataTotal;
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function clearPhoto()
    {
        $this->profile_photo_path = null;
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function searchClear()
    {
        $this->search = '';
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function onSave($type = '')
    {
        $this->onSave = $type;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function pagination()
    {
         $this->emit('pagination'); 
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openForm()
    {
        $this->isForm = true;
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeForm()
    {
        $this->isForm = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function setModelTeam()
    {
        $this->setModelTeam;
    }

}
