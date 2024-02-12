<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;

class DisplayProductsTable extends Component
{
    public $data;
    public $selectedProduct;
    public $quantity;


    public function mount(){
        $this->data = Product::all();
    }

    public function setProductId($id)
    {
        $this->materialId = $id;
        $this->selectedProduct = Product::find($id);
        $this->reset(['quantity']); // Reset form values
        $this->dispatch('openOrderModal'); // Dispatch a browser event to open the modal
    }

    public function sendOrder(){
        if ($this->selectedProduct) {
            Order::create([
                'ordertype' => 2,
                'name' => $this->selectedProduct->name,
                'quantity' => $this->quantity,
                'productid' => $this->selectedProduct->id
            ]);

        }
    }
    public function render()
    {
        return view('livewire.display-products-table');
    }
}
