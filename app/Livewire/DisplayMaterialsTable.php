<?php

namespace App\Livewire;

use App\Models\Material;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DisplayMaterialsTable extends Component
{
    public $data;
    public int $materialId;

    public $selectedMaterial;
    public $quantity;
    public $supplier;



    public function mount(){
        $this->data = DB::table('materials')
            ->join('materialsstock', function ($join) {
                $join->on(DB::raw("CONCAT(materials.material, ', ', materials.length, 'm rol')"), '=', 'materialsstock.material');
            })
            ->select('materials.*', 'materialsstock.*')
            ->get();
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
                'length' => $this->selectedMaterial->length,
                'supplier' => $this->selectedMaterial->supplier,
                'price' => $this->selectedMaterial->cost,
                'materialid' => $this->selectedMaterial->id
            ]);

        }
    }
    public function render()
    {
        return view('livewire.display-materials-table');
    }
}
