<?php
namespace App\Http\Livewire;

use App\Models\Anggota;
use Livewire\Component;

class Basbasboyanggota extends Component
{
    public $searchTerm = '';
    public $selectedAnggota = null;

    public function render()
    {
        $anggota = Anggota::query()
            ->where('nama', 'like', '%' . $this->searchTerm . '%')
            ->get();

        return view('livewire.basbasboyanggota', compact('anggota'));
    }

    public function updatedSearchTerm()
    {
        $this->selectedAnggota = null;
    }
}
