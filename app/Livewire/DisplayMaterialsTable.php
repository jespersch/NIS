<?php

namespace App\Livewire;

use App\Models\Material;
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

//    public function sendOrder(){
//
//    }
    public function render()
    {
        return view('livewire.display-materials-table');
    }
}
