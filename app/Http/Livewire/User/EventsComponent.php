<?php

namespace App\Http\Livewire\User;

use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Carbon;

class EventsComponent extends Component
{
    public $events, $fecha;

    public function mount()
    {
        $fecha  = Carbon::now();

        $this->fecha = $fecha->format('Y-m-d');

        $this->events = Event::with('users')->where('status', '=', 1)->get();

        /*
        orWhere('start', '=', $this->fecha)->orWhere('end', '=', $this->fecha)->
        $dale = Carbon::now();
        $this->dale = Event::with('users')->where('status', '=', 1)->orWhere('start', '=', $this->fecha)->orWhere('end', '=', $this->fecha)->get(); */
    }

    public function render()
    {
        return view('livewire.user.events-component');
    }
}
