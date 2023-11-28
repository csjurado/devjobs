<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;
    public $cv;
    public $vacante;
    protected $rules = [
        'cv'=> 'required| mimes:pdf'
    ];
    public  function mount (Vacante $vacante){
       $this->vacante = $vacante;
    }
    public function postularme(){
        //Almacenar Cv en el disco duro
        $datos = $this->validate();
        //Almacenar la imagen
        $cv =$this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/','',$cv);

        //Crear el candidato a la vacante
        $this->vacante->candidatos()->create([
            'users_id'=>auth()->user()->id,
            'cv'=>$datos['cv']
        ]);

        //Crear Notificacion y enviar el email
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id , $this->vacante->titulo , auth()->user()->id ));


        //Mostrar al usuario un mensaje de que se envio correctamente
        session()->flash('mensaje','Se envió correctamente tu información, mucha suerte');
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
