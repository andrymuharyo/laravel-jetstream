<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\Content;
use App\Models\Navigation;

use DB;
use Carbon\Carbon;
use Storage;
use Str;

class AreaProfiles extends Component
{
    use WithPagination, WithFileUploads;

    public $modules;

    public $content;

    public $sidebar;

    public $slug;
    
    public function mount(Request $request) {

        $this->modules = __('Area Profiles');

        $this->sidebar = Navigation::where('id',2)->first();
    }

    public function render()
    {
        return view('livewire.frontend.area-profile')->layout('layouts.front');
    }
}
