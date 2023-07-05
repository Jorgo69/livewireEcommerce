<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditHomeSlideComponent extends Component
{
    use WithFileUploads;


    public $slide_id;
    public $image;
    public $top_title;
    public $title;
    public $sub_title;
    public $offer;
    public $link;
    public $status;
    public $newImage;


    public function mount($slide_id)
    {
        $slide = HomeSlider::find($slide_id);
        $this->slide_id = $slide->id;
        $this->image = $slide ->image;
        $this->top_title = $slide->top_title;
        $this->title = $slide->title;
        $this->sub_title = $slide->sub_title;
        $this->offer = $slide->offer;
        $this->link = $slide->link;
        $this->status = $slide->status;
        
        
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'image' => 'required',
            'top_title' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'offer' => 'required',
            'link' => 'required',
            'status' => 'required',
        ]);
        
    }

    public function UpdateSlide()
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

        $slide = HomeSlider::find($this->slide_id);

        if($this->newImage)
        {
            // unlink('assets/imgs/products/'.$product->image);
            $imageName = Carbon::now()->timestamp. '.' .$this->newImage->extension();
            $this->newImage->storeAs('slider', $imageName);
            $slide->image = $imageName;

        }
    

        $slide -> top_title = $this-> top_title;
        $slide -> title = $this-> title;
        $slide -> sub_title = $this-> sub_title;
        $slide -> offer = $this-> offer;
        $slide -> link = $this-> link;
        $slide -> status = $this-> status;
        
        $slide ->save();
        return redirect()-> route('admin.home.slider')->with('Admin_message', 'Slider Modifier avec Success');
    }
    

    public function render()
    {
        return view('livewire.admin.admin-edit-home-slide-component');
    }
}
