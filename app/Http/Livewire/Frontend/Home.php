<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

// Database
use App\Models\Article;
use App\Models\Newsletter;
use App\Models\User;

// Plugins
use Jenssegers\Agent\Agent;
use Carbon\Carbon;
use Auth;
use Str;
use Storage;
use Image;

class Home extends Component
{
    use WithPagination, WithFileUploads;

    public $module = 'home';

    public $isSend = 0;

    public $loggedIn = false;

    public $memberInactive = false;

    public $memberInvalid = false;

    public $firstname, $lastname, $email;

    public $loginEmail, $loginPassword;
    
    public function mount(Request $request) {
        
        header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
        header("Pragma: no-cache"); // HTTP 1.0.
        header("Expires: 0"); // Proxies.

        $this->firstname = $request->firstname;
        $this->lastname  = $request->lastname;
        $this->email     = $request->email;

        // for login
        $this->loginEmail    = $request->loginEmail;
        $this->loginPassword = $request->loginPassword;

    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->firstname = null;
        $this->lastname  = null;
        $this->email     = null;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $agent      = new Agent();
        $articles   = Article::active()->ordering()->get();
        $newsletter = new Newsletter;
        
        //is IE 11 or below
        if (preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false)) { 
            redirect('https://www.microsoft.com/en-us/edge');
        }
          

        return view('livewire.frontend.home', compact('agent','articles','newsletter'))->layout('layouts.front');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function sendNewsletter()
    {
        $this->validate([
            'firstname' => 'required',
            'email'     => 'required|email',
        ], [
            'firstname.required' => __('validation.required', array('attribute' => __('label.firstname.name'))),
        ]);

        $input = [
            'firstname' => $this->firstname,
            'lastname'  => $this->lastname,
            'email'     => $this->email
        ];

        Newsletter::create($input);

        $this->formSend();
        $this->resetInputFields();
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function postLogin()
    {
        $this->validate([
            'loginEmail'     => 'required|email',
            'loginPassword'  => 'required',
        ], [
            'loginEmail.required' => __('validation.required', array('attribute' => __('label.email.name'))),
            'loginPassword.required' => __('validation.required', array('attribute' => __('label.password.name'))),
        ]);


        if (auth()->attempt(['email' => $this->loginEmail , 'password' => $this->loginPassword ])) {

            if(auth()->user()->active == 1) {

                $user  =  User::where(['email' => $this->loginEmail])->first();
                
                auth()->login($user);
                $this->loggedIn();
                $this->emit('alert', ['type' => 'success', 'message' => __('dashboard.welcome.title',array('attribute' => (new User)->module))]);
          
            } else {
                $this->memberInactive();
            }
            
        } else {
            $this->memberInvalid();
        }



        

        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function formSend()
    {
        $this->isSend = true;
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function formClose()
    {
        $this->isSend = false;
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function loggedIn()
    {
        $this->loggedIn = true;
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function loggedOut()
    {
        $this->loggedIn = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function memberInactive()
    {
        $this->memberInactive = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function memberInvalid()
    {
        $this->memberInvalid = true;
    }
}
