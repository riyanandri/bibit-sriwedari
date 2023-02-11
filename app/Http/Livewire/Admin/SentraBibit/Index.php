<?php

namespace App\Http\Livewire\Admin\SentraBibit;

use Livewire\Component;
use App\Models\SentraBibit;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $slug, $status, $sentra_id;
    protected $listeners = ['deleteConfirmed' => 'deleteSentraBibit'];

    public function resetInput()
    {
        $this->name = NULL;
        $this->slug = NULL;
    }

    public function storeSentraBibit()
    {
        $this->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable',
        ]);

        SentraBibit::create([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? 1 : 0,
        ]);

        session()->flash('message', 'Data sentra bibit berhasil ditambahkan');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function openModal()
    {
        $this->resetInput();
    }

    public function editSentraBibit(int $sentra_id)
    {
        $this->sentra_id = $sentra_id;
        $sentra = SentraBibit::findOrFail($sentra_id);
        $this->name = $sentra->name;
        $this->slug = $sentra->slug;
        $this->status = $sentra->status;
    }

    public function updateSentraBibit()
    {
        $this->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable',
        ]);

        SentraBibit::findOrFail($this->sentra_id)->update([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? 1 : 0,
        ]);

        session()->flash('message', 'Data sentra bibit berhasil diupdate');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteConfirmation($sentra_id)
    {
        $this->sentra_id = $sentra_id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteSentraBibit()
    {
        $sentra = SentraBibit::where('id', $this->sentra_id)->first();
        $sentra->delete();

        $this->dispatchBrowserEvent('sentraBibitDeleted');
    }

    public function render()
    {
        $sentra_bibit = SentraBibit::orderBy('id', 'ASC')->paginate(10);
        return view('livewire.admin.sentra-bibit.index', ['sentra_bibit' => $sentra_bibit])->extends('layouts.admin')->section('content');
    }
}
