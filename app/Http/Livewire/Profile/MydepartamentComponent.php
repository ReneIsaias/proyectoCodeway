<?php

namespace App\Http\Livewire\Profile;

use App\Models\Comment;
use App\Models\Departament;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Psy\Exception\BreakException;

class MydepartamentComponent extends Component
{
    public $departament, $usuario, $message;

    public $depa_id, $departamento, $descripcion, $responsable;

    public $user, $comentarios, $yo, $otros;

    public function mount()
    {
        /* Obtenemos el usuario logueado */
        $user = Auth::user();
        /* Obtenemos el usuario de User con el departamento que tiene */
        $usuarios = User::with('departaments')->where('id', '=', $user->id)->get();
        /* Recorremos en el foreach hasta encontrar al departamento que le correponde */
        foreach ($usuarios as $usuario) {
            /* Validamos que el usuario loguado sea igual a un registros de User */
            if ($usuario->id = $user->id) {
                /* Validamos que exista una relacion de User y Departament */
                if (isset($usuario->departaments[0]->id)) {
                    /* Asignamos a nuestras variables los datos del departamento */
                    $this->depa_id      = $usuario->departaments[0]->id;
                    $this->departamento = $usuario->departaments[0]->name;
                    $this->descripcion  = $usuario->departaments[0]->description;
                    $this->responsable  = $usuario->departaments[0]->responsable;
                }
            }
        }
        /* Obtenemos el usuario solmanete que sea igual al que esta logueado */
        $this->usuario = User::with('profile')->where('id', '=', $user->id)->first();
        /* Obtengo el departamento del usuario logueado */
        $comments = Departament::orderBy('id', 'Asc')->where('id', '=', $this->depa_id)->first();
        /* Asigno los comentarios del departamento */
        if (isset($comments->comments)) {
            $comentarios = $comments->comments;
            $this->comentarios = $comentarios->sortByDesc('id');
        }


        /* Obtengo mi usuario con perfil */
        $this->yo = User::with('profile')->where('id', '=', $user->id)->first();
        $this->otros = User::with('profile')->get();
    }

    public function send()
    {
        try {
            DB::beginTransaction();
            if (($this->message != "") && ($this->depa_id)) {
                $departament = Departament::where('id', '=', $this->depa_id)->first();

                $departament->comments()->create([
                    'body'      => $this->message,
                    'user_id'   => Auth::user()->id,
                ]);
                $this->reset(['message']);
                $this->mount();
                $this->render();
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function render()
    {
        return view('livewire.profile.mydepartament-component');
    }
}
