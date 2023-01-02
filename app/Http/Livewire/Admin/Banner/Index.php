<?php

namespace App\Http\Livewire\Admin\Banner;

use App\Models\Banner;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $banner_id;
    protected $listeners = ['deleteConfirmed' => 'deleteBanner'];

    public function deleteConfirmation($banner_id)
    {
        $this->banner_id = $banner_id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteBanner()
    {
        $banner = Banner::where('id', $this->banner_id)->first();
        $banner->delete();

        $this->dispatchBrowserEvent('bannerDeleted');
    }

    public function render()
    {
        $banners = Banner::orderBy('id', 'ASC')->paginate(10);
        return view('livewire.admin.banner.index', ['banners' => $banners]);
    }
}
