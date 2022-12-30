<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category_id;
    protected $listeners = ['deleteConfirmed' => 'deleteCategory'];

    public function deleteConfirmation($category_id)
    {
        $this->category_id = $category_id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteCategory()
    {
        $category = Category::where('id', $this->category_id)->first();
        $category->delete();

        $this->dispatchBrowserEvent('categoryDeleted');
    }

    public function render()
    {
        $categories = Category::orderBy('id', 'ASC')->paginate(10);
        return view('livewire.admin.category.index', ['categories' => $categories]);
    }
}
