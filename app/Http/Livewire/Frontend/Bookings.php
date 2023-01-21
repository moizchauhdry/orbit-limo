<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Bookings extends Component
{
    public $current_step = 1;

    public function render()
    {
        return view('livewire.frontend.bookings');
    }

    public function submitStep1()
    {
        $this->current_step = 2;
    }

    public function submitStep2()
    {
        $this->current_step = 3;
    }

    public function submitStep3()
    {
        $this->current_step = 4;
    }

    public function submitStep4()
    {
        $this->current_step = 5;
    }

    public function back($step)
    {
        $this->current_step = $step;
        $this->render();
    }
}
