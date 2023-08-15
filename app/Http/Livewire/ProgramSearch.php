<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Program;

class ProgramSearch extends Component
{
    public $search = '';
    public $programs = [];

    public function mount()
    {
        $this->programs = Program::limit(18)->get();
    }

    public function updatedSearch()
    {
        $this->programs = Program::where('nombre', 'LIKE', '%' . $this->search . '%')
            ->orWhereHas('especialidad', function ($query) {
                $query->where('nombre', 'LIKE', '%' . $this->search . '%');
            })
            ->get();
    }

    public function render()
    {
        return view('livewire.program-search');
    }
}