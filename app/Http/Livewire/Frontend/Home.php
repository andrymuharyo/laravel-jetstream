<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

// Database
use App\Models\Slide;
use App\Models\Newsletter;

// Plugins
use Carbon\Carbon;
use Str;
use Storage;
use Image;

class Home extends Component
{
    use WithPagination, WithFileUploads;

    public $module = 'home';

    public $isSend = 0;

    public $firstname, $lastname, $email;
    
    public function mount(Request $request) {

        $this->firstname = $request->firstname;
        $this->lastname  = $request->lastname;
        $this->email     = $request->email;

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
        $slides     = Slide::active()->ordering()->get();
        $newsletter = new Newsletter;

        return view('livewire.frontend.home', compact('slides','newsletter'))->layout('layouts.front');
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
}
