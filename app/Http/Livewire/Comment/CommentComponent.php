<?php

namespace App\Http\Livewire\Comment;

use Livewire\Component;

class CommentComponent extends Component
{

    public $component, $mensaje;

    /* protected $listeners = ['veamos' => 'esperoquesi']; */
    protected $listeners = ['veamos'];

    public function veamos()
    {
        $this->mensaje = "Evento recibido desde ese componente";
    }

    public function postAdded($dale)
    {
        $this->mensaje = "Evento recibido con el dato que es" . $dale;
    }

    public function mount($component)
    {
        if (isset($component)) {
            $this->mensaje = "si llego el componenete";
            $this->component = $component;
        } else {
            $this->mensaje = "No llego el componenete";
            $this->component = $component;
        }
    }

    public function render()
    {

        /*    $this->mensaje = $this->component; */

        return view('livewire.comment.comment-component');
    }
}
