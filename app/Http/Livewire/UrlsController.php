<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Url;



class UrlsController extends Component
{
    use WithPagination;

    public $pageTitle, $componentName, $customFileName,$search, $selected_id;
    public $address, $status, $access_date_time, $image,

    public function render()
    {
        return view('livewire.url.index');
    }
}
