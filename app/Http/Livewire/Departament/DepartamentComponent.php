<?php

namespace App\Http\Livewire\Departament;

use App\Models\Departament;
use App\Models\Group;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class DepartamentComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $departament_id, $name, $description, $responsable, $status, $created_at, $updated_at, $accion = "store";

    public $search = '', $perPage = '10', $page = 1, $total, $usuarios;

    public $departament_group = [], $group = [], $departamento;

    public $rules = [
        'name'         => 'required|string|max:200|unique:departaments,name',
        'description'  => 'required|string',
        'responsable'  => 'required|string',
    ];

    protected $queryString = [
        'search'  => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];

    protected $validationAttributes = [
        'name'          => 'nombre',
        'description'   => 'descripción',
        'responsable'   => 'responsable',
    ];

    public function mount()
    {
        $this->total     = count(Departament::all());
        $this->usuarios  = User::where('status', '=', 1)->get();

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updated($propertyName)
    {
        if ($this->accion == "store") {
            $this->validateOnly($propertyName, [
                'name'         => 'required|string|max:200|unique:departaments,name',
                'description'  => 'required|string',
                'responsable'  => 'required|string',
            ]);
        } else {
            $this->validateOnly($propertyName, [
                'name'         => 'required|string|max:200|unique:departaments,name,' . $this->departament_id,
                'description'  => 'required|string',
                'responsable'  => 'required|string',
            ]);
        }
    }

    public function store()
    {
        Gate::authorize('haveaccess', 'departament.create');

        $this->validate([
            'name'         => 'required|string|max:200|unique:departaments,name',
            'description'  => 'required|string',
            'responsable'  => 'required|string',
        ]);

        $status = 'success';
        $content = 'Se agregó correctamente el departamento';

        try {

            DB::beginTransaction();

            $departament = Departament::create([
                'name'          => $this->name,
                'description'   => $this->description,
                'responsable'   => $this->responsable,
            ]);

            $departament->groups()->sync($this->group);

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollBack();

            $status = 'error';
            $content = 'Ocurrió un error al agregar el departamento';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('departamentCreatedEvent');
    }

    public function show(Departament $departament)
    {
        Gate::authorize('haveaccess', 'departament.show');

        try {

            $created                  = new Carbon($departament->created_at);
            $updated                  = new Carbon($departament->updated_at);
            $this->departament_id     = $departament->id;
            $this->name               = $departament->name;
            $this->description        = $departament->description;
            $this->responsable        = $departament->responsable;
            $this->status             = $departament->status;
            $this->created_at         = $created->format('l jS \\of F Y h:i:s A');
            $this->updated_at         = $updated->format('l jS \\of F Y h:i:s A');
            $this->departamento       = $departament;

            foreach ($departament->groups as $group) {
                $this->departament_group[] = $group->id;
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
        $this->emit('departamentShowEvent');
    }

    public function edit(Departament $departament)
    {
        Gate::authorize('haveaccess', 'departament.edit');

        try {

            $this->departament_id     = $departament->id;
            $this->name               = $departament->name;
            $this->description        = $departament->description;
            $this->responsable        = $departament->responsable;
            $this->status             = $departament->status;
            $this->accion             = "update";

            foreach ($departament->groups as $group) {
                $this->group[] = $group->id;
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
        Gate::authorize('haveaccess', 'departament.edit');

        $this->validate([
            'name'         => 'required|string|max:200|unique:departaments,name,' . $this->departament_id,
            'description'  => 'required|string',
            'responsable'  => 'required|string',
        ]);

        $status = 'success';
        $content = 'Se actualizó correctamente el departamento';

        try {

            DB::beginTransaction();

            if ($this->departament_id) {
                $departaments = Departament::find($this->departament_id);
                $departaments->update([
                    'name'          => $this->name,
                    'description'   => $this->description,
                    'responsable'   => $this->responsable,
                    'status'        => $this->status,
                ]);

                $departaments->groups()->sync($this->group);
            }

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollBack();

            $status = 'error';
            $content = 'Ocurrió un error al actualizar el departamento';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('departamentUpdatedEvent');
    }

    public function limpia()
    {
        $this->reset(['group']);
    }

    public function delete(Departament $departament)
    {
        Gate::authorize('haveaccess', 'departament.destroy');

        try {

            $this->departament_id     = $departament->id;
            $this->name               = $departament->name;
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
        Gate::authorize('haveaccess', 'departament.destroy');

        $status = 'success';
        $content = 'Se eliminó correctamente el departamento';

        try {

            DB::beginTransaction();

            Departament::find($this->departament_id)->delete();

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollBack();

            $status = 'error';
            $content = 'Ocurrió un error al eliminar el departamento';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('departamentDeletedEvent');
    }

    public function clean()
    {
        $this->reset([
            'departament_id',
            'name',
            'description',
            'responsable',
            'status',
            'accion',
            'created_at',
            'updated_at',
            'departament_group',
            'group',
            'departamento',
        ]);

        $this->mount();
    }

    public function clear()
    {
        $this->reset(['search', 'perPage', 'page']);
    }

    public function render()
    {
        $groups = Group::orderBy('id', 'Asc')->where('status', '=', 1)->get();

        if ($this->search != '') {
            $this->page = 1;
        }

        if (isset(($this->total)) && ($this->perPage > $this->total) && ($this->page != 1)) {
            $this->reset(['perPage']);
        }

        return view(
            'livewire.departament.departament-component',
            [
                'departaments' => Departament::latest('id')
                    ->with('groups')
                    ->where('name', 'LIKE', "%{$this->search}%")
                    ->orWhere('description', 'LIKE', "%{$this->search}%")
                    ->orWhere('responsable', 'LIKE', "%{$this->search}%")
                    ->paginate($this->perPage)
            ],
            compact('groups')
        );
    }
}
