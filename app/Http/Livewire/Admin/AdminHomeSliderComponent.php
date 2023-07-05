<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    public $slide_id;

    public function deleteSider()
    {
        $slide = HomeSlider::find($this->slide_id);
        $slide -> slide_id = $this->id;
        $slide ->delete();
        session()->flash('Admin_message', 'Slider Supprimé avec Success');
    }
    public function render()
    {
        $slides = HomeSlider::orderBy('created_at', 'DESC')->get();
        return view('livewire.admin.admin-home-slider-component',[
            'slides' => $slides
        ]);
    }
}
