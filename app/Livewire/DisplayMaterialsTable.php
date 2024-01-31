<?php

namespace App\Livewire;

use App\Models\Material;
use App\Models\Order;
use Livewire\Component;

class DisplayMaterialsTable extends Component
{
    public $data;
    public int $materialId;

    public $selectedMaterial;
    public $quantity;
    public $supplier;



    public function mount(){
        $this->data= Material::all();
    }

    public function setMaterialId($id)
    {
        $this->materialId = $id;
        $this->selectedMaterial = Material::find($id);
        $this->reset(['quantity', 'supplier']); // Reset form values
        $this->dispatch('openOrderModal'); // Dispatch a browser event to open the modal
    }

    public function updatedQuantity()
    {
        $this->dispatch('quantityUpdated', $this->quantity);
    }

    public function getCost(){
        if ($this->selectedMaterial) {
            return $this->selectedMaterial->price * $this->selectedMaterial->quantity;
        }
    }

    public function sendOrder(){
        if ($this->selectedMaterial) {
            Order::create([
                'ordertype' => 1,
                'name' => $this->selectedMaterial->material,
                'quantity' => $this->quantity,
                'supplier' => $this->selectedMaterial->supplier,
            ]);

        }
    }
    public function render()
    {
        return view('livewire.display-materials-table');
    }
}
