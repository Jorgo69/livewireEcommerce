<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddHomeSlideComponent extends Component
{
    use WithFileUploads;
    
    public $image;
    public $top_title;
    public $title;
    public $sub_title;
    public $offer;
    public $link;
    public $status;

    public function addSlide()
    {
        $this->validate([
            'image' => 'required',
            'top_title' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'offer' => 'required',
            'link' => 'required',
            'status' => 'required',
        ]);

        $slide = new HomeSlider();
        
        $imageName = Carbon::now()->timestamp. '.' .$this->image->extension();
        $this->image -> storeAs('slider', $imageName);
        $slide ->image = $imageName;

        $slide -> top_title = $this-> top_title;
        $slide -> title = $this-> title;
        $slide -> sub_title = $this-> sub_title;
        $slide -> offer = $this-> offer;
        $slide -> link = $this-> link;
        $slide -> status = $this-> status;
        $slide->save();

        return redirect()->route('admin.home.slider')->with('Admin_message', 'Diaposition ajouter avec Success :-) ');
    }
    public function render()
    {
        
        return view('livewire.admin.admin-add-home-slide-component');
    }
}
