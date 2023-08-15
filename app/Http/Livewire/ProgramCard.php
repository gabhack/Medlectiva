<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Program;

class ProgramCard extends Component
{
    public $program;

    public function render()
    {
        return view('livewire.program-card');
    }
}