<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Collection;
use Livewire\Component;

class OrderComponent extends Component
{
    public Collection $products;
    public array $orderProducts = [];

    public function mount()
    {
        $this->products = Product::all();
    }

    public function render()
    {
        return view('livewire.order-component');
    }

    public function addProduct()
    {
        $this->orderProducts[] = [
            'product_id' => '',
            'quantity' => 1,
            'product_name' => '',
            'price' => 0,
            'subtotal' => 0
        ];
    }

    public function calculateSubTotal($index)
    {
        $this->orderProducts[$index]['subtotal'] =
            (int) $this->orderProducts[$index]['quantity'] * (int) $this->orderProducts[$index]['price'];
    }
}
