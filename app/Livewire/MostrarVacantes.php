<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\Attributes\On; 

class MostrarVacantes extends Component
{
    protected $listeners = ['eliminarVacante'];
    // protected $listeners = ['prueba'];
    // #[On('eliminarVacante')] 
    public function eliminarVacante(Vacante $vacante) 
    {
        // dd($vacante->titulo);
        $vacante->delete();
        // $this->dispatch('eliminarVacante');
    }

    // public function prueba (Vacante $vacante){
    //     dd($vacante->titulo);
    // }
    public function render()
    {
        $vacantes= Vacante::where('user_id',auth()->user()->id)->paginate(10);
        return view(
            'livewire.mostrar-vacantes',[
                'vacantes'=>$vacantes
        ]);
    }
}
