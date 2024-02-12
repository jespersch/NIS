<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ProductOrdersTable extends Component
{
    public $data;
    public function mount(){
    $this->data= Order::where('ordertype', '2')->get();
    }

    public function refreshOrders(){
        $this->data= Order::where('ordertype', '2')->get();
    }

    public function approveOrder($id){
        $approvedOrder = Order::where('id', $id)->first();
        $productOrdered = Product::where('id', $approvedOrder->productid)->first();
        $newStock = $productOrdered->stock + $approvedOrder->quantity;
        $productOrdered->stock = $newStock;
        $productOrdered->save();
        $approvedOrder->delete();
        $this->refreshOrders();


    }

    public function declineOrder($id): void
    {
        $declinedOrder = Order::where('id', $id)->delete();
        $this->refreshOrders();
    }
    public function render()
    {
        return view('livewire.product-orders-table');
    }
}
