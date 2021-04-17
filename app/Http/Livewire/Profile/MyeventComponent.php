<?php

namespace App\Http\Livewire\Profile;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;

class MyeventComponent extends Component
{
    public $user_id, $eventos, $usuario;

    public $event_id, $title, $description, $start, $end, $color, $textColor, $status, $created_at, $updated_at, $accion = "store";

    public $rules = [
        'title'         => 'required|string|max:200|unique:events,title',
        'description'   => 'required|string',
        'start'         => 'required|date|after_or_equal:today',
        'end'           => 'required|date|after_or_equal:start',
        'color'         => 'required|string|max:100',
        'textColor'     => 'required|string|max:100',
        'user_id'       => 'required',
    ];

    protected $validationAttributes = [
        'title'         => 'título',
        'description'   => 'descripción',
        'start'         => 'fecha de inicio',
        'end'           => 'fecha de termino',
        'color'         => 'color de fondo',
        'textColor'     => 'color de texto',
        'user_id'       => 'usuario',
    ];

    public function mount()
    {
        $user = Auth::user();
        $this->user_id = $user->id;

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updated($propertyName)
    {
        if ($this->accion == "store") {
            $this->validateOnly($propertyName, [
                'title'         => 'required|string|max:200|unique:events,title',
                'description'   => 'required|string',
                'start'         => 'required|date|after_or_equal:today',
                'end'           => 'required|date|after_or_equal:start',
                'color'         => 'required|string|max:100',
                'textColor'     => 'required|string|max:100',
                'user_id'       => 'required',
            ]);
        } else {
            $this->validateOnly($propertyName, [
                'title'         => 'required|string|max:200|unique:events,title,' . $this->event_id,
                'description'   => 'required|string',
                'start'         => 'required|date|after_or_equal:today',
                'end'           => 'required|date|after_or_equal:start',
                'color'         => 'required|string|max:100',
                'textColor'     => 'required|string|max:100',
                'user_id'       => 'required',
            ]);
        }
    }

    protected $messages = [
        'start.after_or_equal' => 'El campo fecha de inicio debe ser una fecha posterior o igual a hoy.',
    ];

    public function store()
    {
        $this->validate([
            'title'         => 'required|string|max:200|unique:events,title',
            'description'   => 'required|string',
            'start'         => 'required|date|after_or_equal:today',
            'end'           => 'required|date|after_or_equal:start',
            'color'         => 'required|string|max:100',
            'textColor'     => 'required|string|max:100',
            'user_id'       => 'required',
        ]);

        $status = 'success';
        $content = 'Se agregó correctamente el evento';

        try {

            DB::beginTransaction();

            $evento = Event::create([
                'title'         => $this->title,
                'slug'          => Str::slug($this->title, '-'),
                'description'   => $this->description,
                'start'         => $this->start,
                'end'           => $this->end,
                'color'         => $this->color,
                'textColor'     => $this->textColor,
            ]);

            if ($this->user_id) {
                $evento->users()->sync($this->user_id);
            }

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollBack();

            $status = 'error';
            $content = 'Ocurrió un error al agregar el evento';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('eventCreatedEvent');
    }

    public function edit(Event $event)
    {
        try {

            $this->event_id     = $event->id;
            $this->title        = $event->title;
            $this->description  = $event->description;
            $this->start        = $event->start;
            $this->end          = $event->end;
            $this->color        = $event->color;
            $this->textColor    = $event->textColor;
            $this->status       = $event->status;
            $this->accion       = "update";
        } catch (\Throwable $th) {

            $status = 'error';
            $content = 'Ocurrio un error en la carga de datos';

            session()->flash('process_result', [
                'status'    => $status,
                'content'   => $content,
            ]);
        }
    }

    public function update()
    {
        $this->validate([
            'title'         => 'required|string|max:200|unique:events,title,' . $this->event_id,
            'description'   => 'required|string',
            'start'         => 'required|date|after_or_equal:today',
            'end'           => 'required|date|after_or_equal:start',
            'color'         => 'required|string|max:100',
            'textColor'     => 'required|string|max:100',
            'user_id'       => 'required',
        ]);

        $status = 'success';
        $content = 'Se actualizó correctamente el evento';

        try {

            DB::beginTransaction();

            if ($this->event_id) {
                $event = Event::find($this->event_id);
                $event->update([
                    'title'         => $this->title,
                    'slug'          => Str::slug($this->title, '-'),
                    'description'   => $this->description,
                    'start'         => $this->start,
                    'end'           => $this->end,
                    'color'         => $this->color,
                    'textColor'     => $this->textColor,
                    'status'        => $this->status,
                ]);

                if ($this->user_id) {
                    $event->users()->sync($this->user_id);
                }
            }

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollBack();

            $status = 'error';
            $content = 'Ocurrió un error al actualizar el evento';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('eventUpdatedEvent');
    }

    public function clean()
    {
        $this->reset([
            'event_id',
            'title',
            'description',
            'start',
            'end',
            'color',
            'textColor',
            'status',
            'accion',
            'created_at',
            'updated_at',
        ]);

        $this->mount();
    }


    public function close()
    {
        $this->clean();
        $this->emit('eventShowEvent');
    }

    public function render()
    {
        $events = Event::with('users')->orderBy('id', 'Desc')->get();
        return view('livewire.profile.myevent-component', compact('events'));
    }
}
