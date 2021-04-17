<?php

namespace App\Http\Livewire\Priority;

use App\Models\Priority;
use App\Models\Task;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PriorityComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $priority_id, $description, $status, $created_at, $updated_at, $accion = "store";

    public $search = '', $perPage = '10', $page = 1, $total, $task, $priority;

    public $rules = [
        'description'  => 'required|alpha|max:200|unique:priorities,description',
    ];

    protected $queryString = [
        'search'  => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];

    protected $validationAttributes = [
        'description' => 'descripción',
    ];

    public function mount()
    {
        $this->total = count(Priority::all());

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updated($propertyName)
    {
        if ($this->accion == "store") {
            $this->validateOnly($propertyName, [
                'description' => 'required|alpha|max:200|unique:priorities,description',
            ]);
        } else {
            $this->validateOnly($propertyName, [
                'description' => 'required|alpha|max:200|unique:priorities,description,' . $this->priority_id,
            ]);
        }
    }

    public function store()
    {
        Gate::authorize('haveaccess', 'priority.create');

        $this->validate([
            'description' => 'required|alpha|max:200|unique:priorities,description',
        ]);

        $status  = 'success';
        $content = 'Se agregó correctamente la prioridad';

        try {

            DB::beginTransaction();

            Priority::create([
                'description'   => $this->description,
            ]);

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al agregar la prioridad';

        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('priorityCreatedEvent');
    }

    public function show(Priority $priority)
    {
        Gate::authorize('haveaccess', 'priority.show');

        try {

            $created            = new Carbon($priority->created_at);
            $updated            = new Carbon($priority->updated_at);
            $this->priority_id  = $priority->id;
            $this->description  = $priority->description;
            $this->status       = $priority->status;
            $this->created_at   = $created->format('l jS \\of F Y h:i:s A');
            $this->updated_at   = $updated->format('l jS \\of F Y h:i:s A');
            $this->$priority    = $priority;

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
        $this->emit('priorityShowEvent');
    }

    public function edit(Priority $priority)
    {
        Gate::authorize('haveaccess', 'priority.edit');

        try {

            $this->priority_id  = $priority->id;
            $this->description  = $priority->description;
            $this->status       = $priority->status;
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
        Gate::authorize('haveaccess', 'priority.edit');

        $this->validate([
            'description' => 'required|alpha|max:200|unique:priorities,description,' . $this->priority_id,
        ]);

        $status  = 'success';
        $content = 'Se actualizó correctamente la prioridad';

        try {

            DB::beginTransaction();

            if ($this->priority_id) {
                $priority = Priority::find($this->priority_id);
                $priority->update([
                    'description'   => $this->description,
                    'status'        => $this->status,
                ]);
            }

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al actualizar la prioridad';

        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('priorityUpdatedEvent');
    }

    public function delete(Priority $priority)
    {
        Gate::authorize('haveaccess', 'priority.destroy');

        try {

            $this->priority_id  = $priority->id;
            $this->description  = $priority->description;

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
        Gate::authorize('haveaccess', 'priority.destroy');

        $status  = 'success';
        $content = 'Se eliminó correctamente la prioridad';

        try {

            DB::beginTransaction();

            Priority::find($this->priority_id)->delete();

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al eliminar la prioridad';

        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('priorityDeletedEvent');
    }

    public function clean()
    {
        $this->reset([
            'priority_id',
            'description',
            'status',
            'accion',
            'task',
            'priority',
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
        $tareas = Task::orderBy('name')->get();

        if ($this->search != '') {
            $this->page = 1;
        }
        if (isset(($this->total)) && ($this->perPage > $this->total) && ($this->page != 1)) {
            $this->reset(['perPage']);
        }

        return view(
            'livewire.priority.priority-component',
            [
                'priorities' => Priority::latest('id')
                    ->where('description', 'LIKE', "%{$this->search}%")
                    ->paginate($this->perPage)
            ],
            compact('tareas')
        );
    }
}
