<?php

namespace App\Livewire;

use Livewire\Component;

class MostrarAlerta extends Component
{


    //Al momento de utilizar esa varaible en crear-vacante line: 14 yo debo registrarlo aca 
    public $mensaje;
    public function render()
    {
        return view('livewire.mostrar-alerta');
    }
}
