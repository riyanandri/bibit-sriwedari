<?php

namespace App\Http\Livewire\Admin\SentraBibit;

use Livewire\Component;
use App\Models\SentraBibit;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $slug, $status;

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
            'status' => 'required',
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

    public function render()
    {
        $sentra_bibit = SentraBibit::orderBy('id', 'ASC')->paginate(10);
        return view('livewire.admin.sentra-bibit.index', ['sentra_bibit' => $sentra_bibit])->extends('layouts.admin')->section('content');
    }
}
