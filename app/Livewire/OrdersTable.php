<?php

namespace App\Livewire;

use App\Models\Material;
use App\Models\MaterialsStock;
use App\Models\Order;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class OrdersTable extends Component
{
    public $data;
    private $approvedOrder;

    public function mount(){
        $this->data= Order::where('ordertype', '1')->get();
    }

    public function refreshOrders(){
            $this->data = Order::all();
    }

    public function approveOrder($id, $materialname){
        $approvedOrder = Order::where('id', $id)->first();
        $materialOrder= MaterialsStock::where('material', $materialname)->first();
        $newStock = $materialOrder->stock + $approvedOrder->quantity;
        $materialOrder->stock = $newStock;
        $materialOrder->save();
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
        return view('livewire.orders-table');
    }
}
