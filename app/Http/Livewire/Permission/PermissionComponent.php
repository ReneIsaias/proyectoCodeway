<?php

namespace App\Http\Livewire\Permission;

use App\Models\Permission;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PermissionComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $permission_id, $name, $description, $slug, $status, $created_at, $updated_at, $accion = "store";

    public $search = '', $perPage = '10', $page = 1, $total;

    public $rules = [
        'name'         => 'required|string|max:100|unique:permissions,name',
        'slug'         => 'required|string|max:100|unique:permissions,slug',
        'description'  => 'required|string',
    ];

    protected $queryString = [
        'search'  => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];

    protected $validationAttributes = [
        'name'          => 'nombre',
        'description'   => 'descripción',
        'slug'          => 'slug',
    ];

    public function mount()
    {
        $this->total = count(Permission::all());

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updated($propertyName)
    {
        if ($this->accion == "store") {
            $this->validateOnly($propertyName, [
                'name'         => 'required|string|max:100|unique:permissions,name',
                'slug'         => 'required|string|max:100|unique:permissions,slug',
                'description'  => 'required|string',
            ]);
        } else {
            $this->validateOnly($propertyName, [
                'name'         => 'required|alpha|max:100|unique:permissions,name,' . $this->permission_id,
                'slug'         => 'required|string|max:100|unique:permissions,slug,' . $this->permission_id,
                'description'  => 'required|string',
            ]);
        }
    }

    public function store()
    {
        Gate::authorize('haveaccess', 'permission.create');

        $this->validate([
            'name'         => 'required|string|max:100|unique:permissions,name',
            'slug'         => 'required|string|max:100|unique:permissions,slug',
            'description'  => 'required|string',
        ]);

        $status  = 'success';
        $content = 'Se agregó correctamente el permiso, SI ESTO SE MUESTRA ALGO ESTA MAL YA QUE NO SE DEBEN DE AGREGAR LOS PERMISOS DESDE EL FRONT';

        try {

            DB::beginTransaction();

            Permission::create([
                'name'          => $this->name,
                /* 'slug'          => $this->slug, */
                'description'   => $this->description,
            ]);

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();

            $status  = 'error';
            $content = 'Ocurrió un error al agregar el permiso';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('permissionCreatedEvent');
    }

    public function show(Permission $permission)
    {
        Gate::authorize('haveaccess', 'permission.show');

        try {

            $created                = new Carbon($permission->created_at);
            $updated                = new Carbon($permission->updated_at);
            $this->permission_id    = $permission->id;
            $this->name             = $permission->name;
            $this->slug             = $permission->slug;
            $this->description      = $permission->description;
            $this->status           = $permission->status;
            $this->created_at       = $created->format('l jS \\of F Y h:i:s A');
            $this->updated_at       = $updated->format('l jS \\of F Y h:i:s A');

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
        $this->emit('permissionShowEvent');
    }

    public function edit(Permission $permission)
    {
        Gate::authorize('haveaccess', 'permission.edit');

        try {

            $this->permission_id    = $permission->id;
            $this->name             = $permission->name;
            $this->slug             = $permission->slug;
            $this->description      = $permission->description;
            $this->status           = $permission->status;
            $this->accion           = "update";

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
        Gate::authorize('haveaccess', 'permission.edit');

        $this->validate([
            'name'         => 'required|alpha|max:100|unique:permissions,name,' . $this->permission_id,
            'slug'         => 'required|string|max:100|unique:permissions,slug,' . $this->permission_id,
            'description'  => 'required|string',
        ]);

        $status  = 'success';
        $content = 'Se actualizó correctamente el permiso';

        try {

            DB::beginTransaction();

            if ($this->permission_id) {
                $permissions = Permission::find($this->permission_id);
                $permissions->update([
                    'name'          => $this->name,
                    /* 'slug'          => $this->slug, */
                    'description'   => $this->description,
                    'status'        => $this->status,
                ]);
            }

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();

            $status  = 'error';
            $content = 'Ocurrió un error al actualizar el permiso';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('permissionUpdatedEvent');
    }

    public function delete(Permission $permissions)
    {
        Gate::authorize('haveaccess', 'permission.destroy');

        try {

            $this->permission_id    = $permissions->id;
            $this->name             = $permissions->name;

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
        Gate::authorize('haveaccess', 'permission.destroy');

        $status  = 'success';
        $content = 'Se eliminó correctamente el permiso, QUE NO DEBERIA DE HACER ESO YA QUE ALGO ESTAS HACIENDO MAL';

        try {

            DB::beginTransaction();

            Permission::find($this->permission_id)->delete();

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();

            $status  = 'error';
            $content = 'Ocurrió un error al eliminar el permiso HAHAHA';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('permissionDeletedEvent');
    }

    public function clean()
    {
        $this->reset([
            'permission_id',
            'name',
            'slug',
            'description',
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
        if ($this->search != '') {
            $this->page = 1;
        }

        if (isset(($this->total)) && ($this->perPage > $this->total) && ($this->page != 1)) {
            $this->reset(['perPage']);
        }

        return view(
            'livewire.permission.permission-component',
            [
                'permissions' => Permission::orderBy('id','Asc')
                    ->where('name', 'LIKE', "%{$this->search}%")
                    ->orWhere('slug', 'LIKE', "%{$this->search}%")
                    ->orWhere('description', 'LIKE', "%{$this->search}%")
                    ->paginate($this->perPage)
            ]
        );
    }
}
