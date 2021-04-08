<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\Contact as Data;
use Carbon\Carbon;
use Str;
use Storage;
use Image;

class Contact extends Component
{

    use WithPagination, WithFileUploads;

    public $module = 'contact';

    public $isForm = 0;

    public $tabLang = 'en';

    public $onSave;

    public $method;
    
    public 
    $contactId, 
    $title, 
    $title_id, 
    $description, 
    $description_id, 
    $address, 
    $phone, 
    $email, 
    $email_inquiry, 
    $embed, 
    $updated_at;


    /**
     * The attributes that are mount assignable.
     *
     * @var array
     */
    public function mount(Request $request)
    {
        $this->method         = 'POST';
        $this->title          = $request->title;
        $this->title_id       = $request->title_id;
        $this->description    = $request->description;
        $this->description_id = $request->description_id;
        $this->address        = $request->address;
        $this->phone          = $request->phone;
        $this->email          = $request->email;
        $this->email_inquiry  = $request->email_inquiry;
        $this->embed          = $request->embed;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->contactId      = null;
        $this->title          = null;
        $this->title_id       = null;
        $this->description    = null;
        $this->description_id = null;
        $this->address        = null;
        $this->phone          = null;
        $this->email          = null;
        $this->email_inquiry  = null;
        $this->embed          = null;
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $pageName = ucfirst((new Data)->module);

        $contact = Data::get();

        return view('livewire.backend.contact.index',compact('pageName',$this->module));

        $this->closeForm();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $contact             = Data::findOrFail($id);
        $this->method         = 'PUT';
        $this->contactId     = $id;
        $this->contact       = $contact;
        $this->title          = $contact->title;
        $this->title_id       = $contact->title_id;
        $this->description    = $contact->description;
        $this->description_id = $contact->description_id;
        $this->address        = $contact->address;
        $this->phone          = $contact->phone;
        $this->email          = $contact->email;
        $this->email_inquiry  = $contact->email_inquiry;
        $this->embed          = $contact->embed;
        $this->updated_at     = $contact->updated_at;
     
        $this->openForm();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store(Request $request)
    {
        $this->validate([
            'address'       => 'required',
            'email_inquiry' => 'required',
        ]);

        $input = [
            'title'          => $this->title,
            'title_id'       => $this->title_id,
            'description'    => $this->description,
            'description_id' => $this->description_id,
            'address'        => $this->address,
            'phone'          => $this->phone,
            'email'          => $this->email,
            'email_inquiry'  => $this->email_inquiry,
            'embed'          => $this->embed,
        ];

        Data::updateOrCreate(['id' => $this->contactId], $input);

        $this->contactId ? $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.updated',array('attribute' => (new Data)->module))]) : $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.created',array('attribute' => (new Contact)->module))]);
        
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
    public function onSave($type = '')
    {
        $this->onSave = $type;
    }


}
