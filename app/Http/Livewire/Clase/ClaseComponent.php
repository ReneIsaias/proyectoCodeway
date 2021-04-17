<?php

namespace App\Http\Livewire\Clase;

use App\Models\Clas;
use App\Models\Project;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ClaseComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $class_id, $description, $status, $created_at, $updated_at, $accion = "store";

    public $search = '', $perPage = '10', $page = 1, $total, $clase;

    public $rules = [
        'description'  => 'required|alpha|max:200|unique:class,description',
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
        $this->total = count(Clas::all());

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updated($propertyName)
    {
        if ($this->accion == "store") {
            $this->validateOnly($propertyName, [
                'description' => 'required|alpha|max:200|unique:class,description',
            ]);
        } else {
            $this->validateOnly($propertyName, [
                'description' => 'required|alpha|max:200|unique:class,description,' . $this->class_id,
            ]);
        }
    }

    public function store()
    {
        Gate::authorize('haveaccess', 'class.create');

        $this->validate([
            'description' => 'required|alpha|max:200|unique:class,description',
        ]);

        $status = 'success';
        $content = 'Se agregó correctamente la clase';

        try {

            DB::beginTransaction();

            Clas::create([
                'description'   => $this->description,
            ]);

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();

            $status = 'error';
            $content = 'Ocurrió un error al agregar la clase';

        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('classCreatedEvent');
    }

    public function show(Clas $clase)
    {
        Gate::authorize('haveaccess', 'class.show');

        try {

            $created            = new Carbon($clase->created_at);
            $updated            = new Carbon($clase->updated_at);
            $this->class_id     = $clase->id;
            $this->description  = $clase->description;
            $this->status       = $clase->status;
            $this->created_at   = $created->format('l jS \\of F Y h:i:s A');
            $this->updated_at   = $updated->format('l jS \\of F Y h:i:s A');
            $this->clase        = $clase;

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
        $this->emit('classShowEvent');
    }

    public function edit(Clas $clase)
    {
        Gate::authorize('haveaccess', 'class.edit');

        try {

            $this->class_id     = $clase->id;
            $this->description  = $clase->description;
            $this->status       = $clase->status;
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
        Gate::authorize('haveaccess', 'class.edit');

        $this->validate([
            'description' => 'required|alpha|max:200|unique:class,description,' . $this->class_id,
        ]);

        $status = 'success';
        $content = 'Se actualizó correctamente la clase';

        try {

            DB::beginTransaction();

            if ($this->class_id) {
                $clase = Clas::find($this->class_id);
                $clase->update([
                    'description'   => $this->description,
                    'status'        => $this->status,
                ]);
            }

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();

            $status = 'error';
            $content = 'Ocurrió un error al actualizar la clase';

        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('classUpdatedEvent');
    }

    public function delete(Clas $clase)
    {
        Gate::authorize('haveaccess', 'class.destroy');

        try {

            $this->class_id     = $clase->id;
            $this->description  = $clase->description;

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
        Gate::authorize('haveaccess', 'class.destroy');

        $status = 'success';
        $content = 'Se eliminó correctamente la clase';

        try {

            DB::beginTransaction();

            Clas::find($this->class_id)->delete();

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();

            $status = 'error';
            $content = 'Ocurrió un error al eliminar la clase';

        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('classDeletedEvent');
    }

    public function clean()
    {
        $this->reset([
            'class_id',
            'description',
            'status',
            'accion',
            'clase',
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
        $proyectos = Project::orderBy('name')->where('status', '=', 1)->get();

        if ($this->search != '') {
            $this->page = 1;
        }
        if (isset(($this->total)) && ($this->perPage > $this->total) && ($this->page != 1)) {
            $this->reset(['perPage']);
        }

        return view(
            'livewire.clase.clase-component',
            [
                'clases' => Clas::latest('id')
                    ->where('description', 'LIKE', "%{$this->search}%")
                    ->paginate($this->perPage)
            ],
            compact('proyectos')
        );
    }
}
