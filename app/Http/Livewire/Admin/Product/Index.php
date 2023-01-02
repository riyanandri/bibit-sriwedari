<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $product_id;
    protected $listeners = ['deleteConfirmed' => 'deleteProduct'];

    public function deleteConfirmation($product_id)
    {
        $this->product_id = $product_id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteProduct()
    {
        $product = Product::where('id', $this->product_id)->first();
        $product->delete();

        $this->dispatchBrowserEvent('productDeleted');
    }

    public function render()
    {
        $products = Product::orderBy('id', 'ASC')->paginate(10);
        return view('livewire.admin.product.index', ['products' => $products]);
    }
}
