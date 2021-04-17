<?php

namespace App\Http\Livewire\Profile;

use App\Models\Priority;
use Livewire\Component;
use App\Models\Project;
use App\Models\Statu;
use App\Models\Task;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MytaskComponent extends Component
{
    use WithFileUploads;

    public $search = '', $responsable_proyecto, $responsable_imagen, $pivote, $usuarios, $informadores;

    public $proyecto, $tareas, $usuario;

    public $estados, $inicia, $termina;

    public $task_id, $name, $description, $file, $start, $end, $informer, $responsable, $created_at, $updated_at, $accion = "store";

    public $estado, $tipo, $prioridad, $statu_id, $priority_id, $type_id, $temporary, $informador;

    public $rules = [
        'name'          => 'required|string|max:200',
        'description'   => 'required|string',
        'temporary'     => 'file|mimetypes:video/mp4,application/pdf,application/docx,image/png,image/jpg,image/jpeg|max:10000|nullable',
        'file'          => 'file|max:10000|mimes:jpeg,png|nullable|mimetypes:video/mp4',
        'start'         => 'required|date|after_or_equal:today',
        'inicia'        => 'required|date|after_or_equal:today',
        'end'           => 'required|date|after_or_equal:start',
        'termina'       => 'required|date|after_or_equal:start',
        'informer'      => 'required|string|',
        'responsable'   => 'required|string|',
        'statu_id'      => 'required',
        'priority_id'   => 'required',
        'type_id'       => 'required',
    ];

    protected $queryString = [
        'search'  => ['except' => ''],
        'search'  => ['except' => ''],
    ];

    protected $validationAttributes = [
        'name'          => 'nombre',
        'description'   => 'descripción',
        'temporary'     => 'archivo',
        'file'          => 'archivo',
        'start'         => 'fecha de inicio',
        'end'           => 'fecha termino',
        'inicia'        => 'fecha de inicio',
        'termina'       => 'fecha termino',
        'informer'      => 'informador',
        'responsable'   => 'responsable',
        'statu_id'      => 'estado',
        'priority_id'   => 'prioridad',
        'type_id'       => 'tipo',
    ];

    public function mount(Project $project)
    {
        $this->proyecto   = $project;
        $this->pivote     = Project::with('tasks', 'users')->where('id', '=', $project->id)->get();
        $this->estados    = Statu::orderBy('id', 'Asc')->where('status', '=', 1)->get();

        $this->responsable_proyecto = $this->proyecto->responsable;
        $responsable = User::with('profile')->where('name', '=', $this->proyecto->responsable)->first();
        $this->responsable_imagen = $responsable->profile->avatar;

        $this->usuarios = User::with('profile')->orderBy('id', 'Desc')->get();

        $this->informadores = User::orderBy('id', 'Desc')->get();

        $this->informer = $this->responsable_proyecto;

        $this->usuario = Auth::user()->name;
        $this->responsable = Auth::user()->name;

        $fecha = Carbon::now();

        $this->inicia  = $fecha->format('Y-m-d');
        $this->termina = $fecha->addDay()->format('Y-m-d');

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
                'inicia'        => 'required|date|after_or_equal:today',
                'termina'       => 'required|date|after_or_equal:inicia',
                'informer'      => 'required|string',
                'responsable'   => 'required|string',
                'statu_id'      => 'required',
                'priority_id'   => 'required',
                'type_id'       => 'required',
            ]);
        } else {
            $this->validateOnly($propertyName, [
                'name'          => 'required|string|max:200,' . $this->task_id,
                'description'   => 'required|string',
                'file'          => 'file|max:10000|nullable',
                'start'         => 'required|date|after_or_equal:today',
                'end'           => 'required|date|after_or_equal:start',
                'informer'      => 'required|string',
                'responsable'   => 'required|string',
                'statu_id'      => 'required',
                'priority_id'   => 'required',
                'type_id'       => 'required',
            ]);
        }
    }

    protected $messages = [
        'start.after_or_equal' => 'El campo fecha de inicio debe ser una fecha posterior o igual a hoy.',
    ];

    public function store()
    {
        $this->validate([
            'name'          => 'required|string|max:200',
            'description'   => 'required|string|',
            'temporary'     => 'file|max:10000|nullable',
            'inicia'        => 'required|date|after_or_equal:today',
            'termina'       => 'required|date|after_or_equal:inicia',
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

            $task = Task::create([
                'name'          => $this->name,
                'slug'          => Str::slug($this->name, '-'),
                'description'   => $this->description,
                'file'          => $nameFile,
                'start'         => $this->inicia,
                'end'           => $this->termina,
                'informer'      => $this->informer,
                'responsable'   => Auth::user()->name,
                'statu_id'      => $this->statu_id,
                'priority_id'   => $this->priority_id,
                'type_id'       => $this->type_id,
            ]);

            $task->projects()->sync($this->proyecto->id);

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

    public function close()
    {
        $this->clean();
        $this->emit('taskShowEvent');
    }

    public function edit(Task $task)
    {
        try {

            $this->task_id       = $task->id;
            $this->name          = $task->name;
            $this->description   = $task->description;
            $this->file          = $task->file;
            $this->start         = $task->start;
            $start               = new Carbon($task->start);
            $this->start         = $start->format('Y-m-d');
            $this->end           = $task->end;
            $this->informer      = $task->informer;
            $this->responsable   = $task->responsable;
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
        $this->validate([
            'name'          => 'required|string|max:200,' . $this->task_id,
            'description'   => 'required|string',
            'temporary'     => 'file|max:10000|nullable',
            'start'         => 'required|date|after_or_equal:today',
            'end'           => 'required|date|after_or_equal:start',
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
            /* 'informer', */
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

        $this->responsable = Auth::user()->name;
        $fecha = Carbon::now();

        $this->inicia  = $fecha->format('Y-m-d');
        $this->termina = $fecha->addDay()->format('Y-m-d');
        
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function clear()
    {
        $this->reset(['search',]);
    }

    public function render()
    {
        $estados    = Statu::orderBy('description')->where('status', '=', 1)->get();
        $types      = Type::orderBy('description')->where('status', '=', 1)->get();
        $priorities = Priority::orderBy('description')->where('status', '=', 1)->get();

        $informador = "";

        return view(
            'livewire.profile.mytask-component',
            [
                'tasks' => Task::orderBy('id', 'Desc')
                    ->with('type', 'statu', 'priority', 'projects')
                    ->where('name', 'LIKE', "%{$this->search}%")
                    ->orWhere('informer', 'LIKE', "%{$this->search}%")
                    ->orWhere('responsable', 'LIKE', "%{$this->search}%")
                    ->get()
            ],
            compact('estados', 'types', 'priorities')
        );
    }
}
