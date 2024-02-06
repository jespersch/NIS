<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class Orders extends Component
{
    public function mount(){
        $this->data= Order::all();
    }

    public function render()
    {
        return view('livewire.orders');
    }
}
