<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class EventComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $event_id, $title, $description, $start, $end, $color, $textColor, $status, $created_at, $updated_at, $accion = "store";

    public $search = '', $perPage = '10', $page = 1, $total, $user_id;

    public $rules = [
        'title'         => 'required|string|max:200|unique:events,title',
        'description'   => 'required|string',
        'start'         => 'required|date|after_or_equal:today',
        'end'           => 'required|date|after_or_equal:start',
        'color'         => 'required|string|max:100',
        'textColor'     => 'required|string|max:100',
        'user_id'       => 'required',
    ];

    protected $queryString = [
        'search'  => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];

    protected $validationAttributes = [
        'title'         => 'título',
        'description'   => 'descripción',
        'start'         => 'fecha inicio',
        'end'           => 'fecha termino',
        'color'         => 'color',
        'textColor'     => 'color de texto',
        'user_id'       => 'usuario',
    ];

    public function mount()
    {
        $this->total = count(Event::all());

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
        Gate::authorize('haveaccess', 'event.create');

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

    public function show(Event $event)
    {
        Gate::authorize('haveaccess', 'event.show');

        try {

            $created            = new Carbon($event->created_at);
            $updated            = new Carbon($event->updated_at);
            $this->event_id     = $event->id;
            $this->title        = $event->title;
            $this->description  = $event->description;
            $this->start        = $event->start;
            $this->end          = $event->end;
            $this->color        = $event->color;
            $this->textColor    = $event->textColor;
            $this->status       = $event->status;
            $this->created_at   = $created->format('l jS \\of F Y h:i:s A');
            $this->updated_at   = $updated->format('l jS \\of F Y h:i:s A');
        } catch (\Throwable $th) {

            $status = 'error';
            $content = 'Ocurrio un error en la carga de datos';

            session()->flash('process_result', [
                'status'    => $status,
                'content'   => $content,
            ]);
        }
    }

    public function close()
    {
        $this->clean();
        $this->emit('eventShowEvent');
    }

    public function edit(Event $event)
    {
        Gate::authorize('haveaccess', 'event.edit');

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

            foreach ($event->users as $user) {
                $this->user_id = $user->id;
            }
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
        Gate::authorize('haveaccess', 'event.edit');

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

    public function delete(Event $event)
    {
        Gate::authorize('haveaccess', 'event.destroy');

        try {

            $this->event_id     = $event->id;
            $this->title        = $event->title;
        } catch (\Throwable $th) {

            $status = 'error';
            $content = 'Ocurrio un error en la carga de datos';

            session()->flash('process_result', [
                'status'    => $status,
                'content'   => $content,
            ]);
        }
    }

    public function destroy()
    {
        Gate::authorize('haveaccess', 'event.destroy');

        $status = 'success';
        $content = 'Se eliminó correctamente el evento';

        try {

            DB::beginTransaction();

            Event::find($this->event_id)->delete();

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollBack();

            $status = 'error';
            $content = 'Ocurrió un error al eliminar el evento';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('eventDeletedEvent');
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

    public function clear()
    {
        $this->reset(['search', 'perPage', 'page']);
    }

    public function render()
    {
        $usuarios = User::with('profile')->where('status', '=', 1)->get();

        if ($this->search != '') {
            $this->page = 1;
        }

        if (isset(($this->total)) && ($this->perPage > $this->total) && ($this->page != 1)) {
            $this->reset(['perPage']);
        }

        return view(
            'livewire.event.event-component',
            [
                'events' => Event::latest('id')
                    ->with('users')
                    ->where('title', 'LIKE', "%{$this->search}%")
                    ->orWhere('description', 'LIKE', "%{$this->search}%")
                    ->orWhere('start', 'LIKE', "%{$this->search}%")
                    ->orWhere('end', 'LIKE', "%{$this->search}%")
                    ->paginate($this->perPage)
            ],
            compact('usuarios')
        );
    }
}
