<?php

namespace App\Http\Livewire\Profile;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MiprojectsComponent extends Component
{
    public $usuario, $proyectos, $user;

    public $res_depa, $res_area, $res_project;

    public function mount()
    {
        $this->user = Auth::user();

        $this->usuario   = User::with('projects', 'departaments', 'groups')->whereKey($this->user->id)->get();

        $this->proyectos = Project::with('users')->get();

        $this->res_depa = User::with('profile')->orderBy('id', 'Desc')->get();

        $this->res_area = User::with('profile')->orderBy('id', 'Desc')->get();

        $this->res_project = User::with('profile')->orderBy('id', 'Desc')->get();
    }

    public function render()
    {
        return view('livewire.profile.miprojects-component');
    }
}
