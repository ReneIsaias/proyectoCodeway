<?php

namespace App\Http\Livewire\Type;

use App\Models\Task;
use App\Models\Type;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class TypeComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $type_id, $description, $status, $created_at, $updated_at, $accion = "store";

    public $search = '', $perPage = '10', $page = 1, $total, $type;

    public $rules = [
        'description'  => 'required|alpha|max:100|unique:types,description',
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
        $this->total = count(Type::all());

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updated($propertyName)
    {
        if ($this->accion == "store") {
            $this->validateOnly($propertyName, [
                'description' => 'required|alpha|max:100|unique:types,description',
            ]);
        } else {
            $this->validateOnly($propertyName, [
                'description' => 'required|alpha|max:100|unique:types,description,' . $this->type_id,
            ]);
        }
    }

    public function store()
    {
        Gate::authorize('haveaccess', 'type.create');

        $this->validate([
            'description' => 'required|alpha|max:100|unique:types,description',
        ]);

        $status  = 'success';
        $content = 'Se agregó correctamente el tipo';

        try {

            DB::beginTransaction();

            Type::create([
                'description'   => $this->description,
            ]);

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al agregar el tipo';

        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('typesCreatedEvent');
    }

    public function show(Type $type)
    {
        Gate::authorize('haveaccess', 'type.show');

        try {

            $created            = new Carbon($type->created_at);
            $updated            = new Carbon($type->updated_at);
            $this->type_id      = $type->id;
            $this->description  = $type->description;
            $this->status       = $type->status;
            $this->created_at   = $created->format('l jS \\of F Y h:i:s A');
            $this->updated_at   = $updated->format('l jS \\of F Y h:i:s A');
            $this->$type        = $type;

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
        $this->emit('typesShowEvent');
    }

    public function edit(Type $type)
    {
        Gate::authorize('haveaccess', 'type.edit');

        try {

            $this->type_id      = $type->id;
            $this->description  = $type->description;
            $this->status       = $type->status;
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
        Gate::authorize('haveaccess', 'type.edit');

        $this->validate([
            'description' => 'required|alpha|max:100|unique:types,description,' . $this->type_id,
        ]);

        $status  = 'success';
        $content = 'Se actualizó correctamente el tipo';

        try {

            DB::beginTransaction();

            if ($this->type_id) {
                $clase = Type::find($this->type_id);
                $clase->update([
                    'description'   => $this->description,
                    'status'        => $this->status,
                ]);
            }

            DB::commit();

        } catch (\Throwable $th) {
            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al actualizar el tipo';

        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('typesUpdatedEvent');
    }

    public function delete(Type $type)
    {
        Gate::authorize('haveaccess', 'type.destroy');

        try {

            $this->type_id      = $type->id;
            $this->description  = $type->description;
            $this->status       = $type->status;

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
        Gate::authorize('haveaccess', 'type.destroy');

        $status  = 'success';
        $content = 'Se eliminó correctamente el tipo';

        try {

            DB::beginTransaction();

            Type::find($this->type_id)->delete();

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al eliminar el tipo';

        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('typesDeletedEvent');
    }

    public function clean()
    {
        $this->reset([
            'type_id',
            'description',
            'status',
            'accion',
            'type',
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
            'livewire.type.type-component',
            [
                'types' => Type::latest('id')
                    ->where('description', 'LIKE', "%{$this->search}%")
                    ->orWhere('status', 'LIKE', "%{$this->search}%")
                    ->paginate($this->perPage)
            ],
            compact('tareas')
        );
    }
}
