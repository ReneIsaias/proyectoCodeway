<?php

namespace App\Http\Livewire\Task;

use App\Models\Priority;
use App\Models\Statu;
use App\Models\Task;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class TaskComponent extends Component
{
    use WithPagination;

    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $task_id, $name, $description, $file, $start, $end, $informer, $responsable, $created_at, $updated_at, $accion = "store";

    public $estado, $tipo, $prioridad, $statu_id, $priority_id, $type_id;

    public $search = '', $perPage = '10', $page = 1, $total, $temporary;

    public $rules = [
        'name'          => 'required|string|max:200',
        'description'   => 'required|string',
        'temporary'     => 'file|max:10000|mimes:jpeg,png|nullable|mimetypes:video/mp4',
        'file'          => 'file|max:10000|mimes:jpeg,png|nullable|mimetypes:video/mp4',
        'start'         => 'required|date|after_or_equal:today',
        'end'           => 'required|date|after_or_equal:start',
        'informer'      => 'required|string|',
        'responsable'   => 'required|string|',
        'statu_id'      => 'required',
        'priority_id'   => 'required',
        'type_id'       => 'required',
    ];

    protected $queryString = [
        'search'  => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];

    protected $validationAttributes = [
        'name'          => 'nombre',
        'description'   => 'descripción',
        'temporary'     => 'archivo',
        'file'          => 'archivo',
        'start'         => 'fecha inicio',
        'end'           => 'fecha termino',
        'informer'      => 'informador',
        'responsable'   => 'responsable',
        'statu_id'      => 'estado',
        'priority_id'   => 'prioridad',
        'type_id'       => 'tipo',
    ];

    public function mount()
    {
        $this->total       = count(Task::all());
        $this->responsable = Auth::user()->name;

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updated($propertyName)
    {
        if ($this->accion == "store") {
            $this->validateOnly($propertyName, [
                'name'          => 'required|string|max:200',
                'description'   => 'required|string',
                'temporary'     => 'file|max:10000|nullable',
                'start'         => 'required|after_or_equal:today',
                'end'           => 'required|after_or_equal:start',
                'informer'      => 'required|string',
                'responsable'   => 'required|string',
                'statu_id'      => 'required',
                'priority_id'   => 'required',
                'type_id'       => 'required',
            ]);
        } else {
            $this->validateOnly($propertyName, [
                'name'          => 'required|string|max:200',
                'description'   => 'required|string',
                'file'          => 'file|max:10000|nullable',
                'start'         => 'required|after_or_equal:today',
                'end'           => 'required|after_or_equal:start',
                'informer'      => 'required|string',
                'responsable'   => 'required|string',
                'statu_id'      => 'required',
                'priority_id'   => 'required',
                'type_id'       => 'required',
            ]);
        }
    }

    public function store()
    {
        Gate::authorize('haveaccess', 'task.create');

        $this->validate([
            'name'          => 'required|string|max:200',
            'description'   => 'required|string|',
            'temporary'     => 'file|max:10000|nullable',
            'start'         => 'required|after_or_equal:today',
            'end'           => 'required|after_or_equal:start',
            'informer'      => 'required|string',
            'responsable'   => 'required|string',
            'statu_id'      => 'required',
            'priority_id'   => 'required',
            'type_id'       => 'required',
        ]);

        $status  = 'success';
        $content = 'Se agregó correctamente la tarea';

        try {

            DB::beginTransaction();

            if ($this->temporary != null) {
                if ($this->temporary->getClientOriginalName()) {
                    $nameFile = time() . '_' . $this->temporary->getClientOriginalName();
                    $this->temporary->storePubliclyAs('storage/files', $nameFile, 'public_uploads');
                }
            } else {
                $nameFile = null;
            }

            Task::create([
                'name'          => $this->name,
                'slug'          => Str::slug($this->name, '-'),
                'description'   => $this->description,
                'file'          => $nameFile,
                'start'         => $this->start,
                'end'           => $this->end,
                'informer'      => $this->informer,
                'responsable'   => Auth::user()->name,
                'statu_id'      => $this->statu_id,
                'priority_id'   => $this->priority_id,
                'type_id'       => $this->type_id,
            ]);

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al agregar la tarea';

        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('taskCreatedEvent');
    }

    public function show(Task $task)
    {
        Gate::authorize('haveaccess', 'task.show');

        try {

            $created             = new Carbon($task->created_at);
            $updated             = new Carbon($task->updated_at);
            $this->task_id       = $task->id;
            $this->name          = $task->name;
            $this->description   = $task->description;
            $this->file          = $task->file;
            $this->start         = $task->start;
            $this->end           = $task->end;
            $this->informer      = $task->informer;
            $this->responsable   = $task->responsable;
            $this->statu_id      = $task->statu_id;
            $this->priority_id   = $task->priority_id;
            $this->type_id       = $task->type_id;
            $this->created_at    = $created->format('l jS \\of F Y h:i:s A');
            $this->updated_at    = $updated->format('l jS \\of F Y h:i:s A');

            if (isset($task->statu->description)) {
                $this->estado   = $task->statu->description;
            } else {
                $this->estado   = "Sin estado";
            }

            if (isset($task->type->description)) {
                $this->tipo     = $task->type->description;
            } else {
                $this->tipo     = "Sin tipo";
            }

            if (isset($task->priority->description)) {
                $this->prioridad = $task->priority->description;
            } else {
                $this->prioridad = "Sin prioridad";
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

    public function close()
    {
        $this->clean();
        $this->emit('taskShowEvent');
    }

    public function edit(Task $task)
    {
        Gate::authorize('haveaccess', 'task.edit');

        try {

            $this->task_id       = $task->id;
            $this->name          = $task->name;
            $this->description   = $task->description;
            $this->file          = $task->file;
            $this->start         = $task->start;
            $this->end           = $task->end;
            $this->informer      = $task->informer;
            $this->statu_id      = $task->statu_id;
            $this->priority_id   = $task->priority_id;
            $this->type_id       = $task->type_id;
            $this->created_at    = $task->created_at;
            $this->updated_at    = $task->updated_at;
            $this->accion        = "update";

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
        Gate::authorize('haveaccess', 'task.edit');

        $this->validate([
            'name'          => 'required|string|max:200',
            'description'   => 'required|string',
            'temporary'     => 'file|max:10000|nullable',
            'start'         => 'required|after_or_equal:today',
            'end'           => 'required|after_or_equal:start',
            'informer'      => 'required|string',
            'responsable'   => 'required|string',
            'statu_id'      => 'required',
            'priority_id'   => 'required',
            'type_id'       => 'required',
        ]);

        $status  = 'success';
        $content = 'Se actualizó correctamente la tarea';

        try {

            DB::beginTransaction();

            if ($this->task_id) {
                $task = Task::find($this->task_id);

                $task->update([
                    'name'          => $this->name,
                    'slug'          => Str::slug($this->name, '-'),
                    'description'   => $this->description,
                    'end'           => $this->end,
                    'informer'      => $this->informer,
                    'responsable'   => Auth::user()->name,
                    'statu_id'      => $this->statu_id,
                    'priority_id'   => $this->priority_id,
                    'type_id'       => $this->type_id,
                ]);

                if ($this->temporary != null) {
                    if ($this->temporary->getClientOriginalName()) {
                        $nameFile = time() . '_' . $this->temporary->getClientOriginalName();
                        $this->temporary->storePubliclyAs('storage/files', $nameFile, 'public_uploads');
                        $task->update(['file'   => $nameFile]);
                    }
                }

            }

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al actualizar la tarea';

        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('taskUpdatedEvent');
    }

    public function delete(Task $task)
    {
        Gate::authorize('haveaccess', 'task.destroy');

        try {

            $this->task_id      = $task->id;
            $this->name         = $task->name;

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
        Gate::authorize('haveaccess', 'task.destroy');

        $status  = 'success';
        $content = 'Se eliminó correctamente la tarea';

        try {

            DB::beginTransaction();

            Task::find($this->task_id)->delete();

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al eliminar la tarea';

        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);
        /* Storage::delete('file.jpg'); */

        $this->clean();
        $this->emit('taskDeletedEvent');
    }

    public function clean()
    {
        $this->reset([
            'task_id',
            'name',
            'description',
            'file',
            'temporary',
            'start',
            'end',
            'informer',
            'responsable',
            'statu_id',
            'priority_id',
            'type_id',
            'created_at',
            'updated_at',
            'accion',
            'estado',
            'tipo',
            'prioridad',
        ]);

        $this->mount();
    }

    public function clear()
    {
        $this->reset(['search', 'perPage', 'page']);
    }

    public function render()
    {
        $estados    = Statu::orderBy('description')->where('status', '=', 1)->get();
        $types      = Type::orderBy('description')->where('status', '=', 1)->get();
        $priorities = Priority::orderBy('description')->where('status', '=', 1)->get();

        if ($this->search != '') {
            $this->page = 1;
        }

        if (isset(($this->total)) && ($this->perPage > $this->total) && ($this->page != 1)) {
            $this->reset(['perPage']);
        }

        return view(
            'livewire.task.task-component',
            [
                'tasks' => Task::latest('id')
                    ->with('type', 'statu', 'priority')
                    ->where('name', 'LIKE', "%{$this->search}%")
                    ->orWhere('description', 'LIKE', "%{$this->search}%")
                    ->orWhere('informer', 'LIKE', "%{$this->search}%")
                    ->orWhere('responsable', 'LIKE', "%{$this->search}%")
                    ->paginate($this->perPage)
            ],
            compact('estados', 'types', 'priorities')
        );
    }
}
