<?php

namespace App\Http\Livewire\Role;

use App\Models\Permission;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class RoleComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $role_id, $name, $slug, $description, $fullAccess, $responsable, $status, $range, $asignament, $created_at, $updated_at, $accion = "store";

    public $search = '', $perPage = '10', $page = 1, $total;

    public $permission = [], $permission_role = [];

    public $rules = [
        'name'         => 'required|string|max:100|unique:roles,name',
        'slug'         => 'required|string|max:100|unique:roles,slug',
        'description'  => 'required|string',
        'resposanble'  => 'required|string',
        'fullAccess'   => 'required|in:yes,no',
        'range'        => 'required|numeric|max:20|min:1',
        'asignament'   => 'required',
    ];

    protected $queryString = [
        'search'  => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];

    protected $validationAttributes = [
        'name'          => 'nombre',
        'slug'          => 'identificador',
        'description'   => 'descripción',
        'resposanble'   => 'responsable',
        'fullAccess'    => 'acceso total',
        'range'         => 'rango',
        'asignament'    => 'asignamiento',
    ];

    public function mount()
    {
        $this->total = count(Role::all());
        $this->responsable = Auth::user()->name;
        $this->fullAccess = 'no';
        $this->asignament = '0';

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updated($propertyName)
    {
        if ($this->accion == "store") {
            $this->validateOnly($propertyName, [
                'name'         => 'required|string|max:100|unique:roles,name',
                'slug'         => 'required|string|max:100|unique:roles,slug',
                'description'  => 'required|string',
                'responsable'  => 'required|string',
                'fullAccess'   => 'required|in:yes,no',
                'range'        => 'required|numeric|max:20|min:1',
                'asignament'   => 'required',
            ]);
        } else {
            $this->validateOnly($propertyName, [
                'name'         => 'required|string|max:100|unique:roles,name,' . $this->role_id,
                'slug'         => 'required|string|max:100|unique:roles,slug,' . $this->role_id,
                'description'  => 'required|string',
                'responsable'  => 'required|string',
                'fullAccess'   => 'required|in:yes,no',
                'range'        => 'required|numeric|max:20|min:1',
                'asignament'   => 'required',
            ]);
        }
        $this->slug = Str::slug($this->name, '.');
    }

    public function store()
    {
        Gate::authorize('haveaccess', 'role.create');

        $this->validate([
            'name'         => 'required|string|max:100|unique:roles,name',
            'slug'         => 'required|string|max:100|unique:roles,slug',
            'description'  => 'required|string',
            'responsable'  => 'required|string',
            'fullAccess'   => 'required|in:yes,no',
            'range'        => 'required|numeric|max:20|min:1',
            'asignament'   => 'required',
        ]);

        $status  = 'success';
        $content = 'Se agregó correctamente el rol';

        try {

            DB::beginTransaction();

            $role = Role::create([
                'name'          => $this->name,
                'slug'          => $this->slug,
                'description'   => $this->description,
                'responsable'   => Auth::user()->name,
                'fullAccess'    => $this->fullAccess,
                'range'         => $this->range,
                'asignament'    => $this->asignament,
            ]);

            $role->permissions()->sync($this->permission);

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al agregar el rol';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('roleCreatedEvent');
    }

    public function show(Role $role)
    {
        Gate::authorize('haveaccess', 'role.show');

        try {

            $created            = new Carbon($role->created_at);
            $updated            = new Carbon($role->updated_at);
            $this->role_id      = $role->id;
            $this->name         = $role->name;
            $this->slug         = $role->slug;
            $this->description  = $role->description;
            $this->responsable  = $role->responsable;
            $this->fullAccess   = $role->fullAccess;
            $this->status       = $role->status;
            $this->range        = $role->range;
            $this->asignament   = $role->asignament;
            $this->created_at   = $created->format('l jS \\of F Y h:i:s A');
            $this->updated_at   = $updated->format('l jS \\of F Y h:i:s A');

            foreach ($role->permissions as $permission) {
                $this->permission_role[] = $permission->id;
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
        $this->emit('roleShowEvent');
    }

    public function edit(Role $role)
    {
        Gate::authorize('haveaccess', 'role.edit');

        try {

            $this->role_id      = $role->id;
            $this->name         = $role->name;
            $this->slug         = $role->slug;
            $this->description  = $role->description;
            $this->responsable  = $role->responsable;
            $this->fullAccess   = $role->fullAccess;
            $this->status       = $role->status;
            $this->range        = $role->range;
            $this->asignament   = $role->asignament;
            $this->accion       = "update";

            foreach ($role->permissions as $permission) {
                $this->permission[] = $permission->id;
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
        Gate::authorize('haveaccess', 'role.edit');

        $this->validate([
            'name'         => 'required|string|max:100|unique:roles,name,' . $this->role_id,
            'slug'         => 'required|string|max:100|unique:roles,slug,' . $this->role_id,
            'description'  => 'required|string',
            'responsable'  => 'required|string',
            'fullAccess'   => 'required|in:yes,no',
            'range'        => 'required|numeric|max:20|min:1',
            'asignament'   => 'required',
        ]);

        $status  = 'success';
        $content = 'Se actualizó correctamente el rol';

        try {

            DB::beginTransaction();

            if ($this->role_id) {
                $role = Role::find($this->role_id);
                $role->update([
                    'name'          => $this->name,
                    'slug'          => $this->slug,
                    'description'   => $this->description,
                    'responsable'   => Auth::user()->name,
                    'fullAccess'    => $this->fullAccess,
                    'status'        => $this->status,
                    'range'         => $this->range,
                    'asignament'    => $this->asignament,
                ]);

                $role->permissions()->sync($this->permission);
            }

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al actualizar el rol';
        }
        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('roleUpdatedEvent');
    }

    public function limpia()
    {
        $this->reset(['permission']);
    }

    public function delete(Role $role)
    {
        Gate::authorize('haveaccess', 'role.destroy');

        try {

            $this->role_id   = $role->id;
            $this->name      = $role->name;
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
        Gate::authorize('haveaccess', 'role.destroy');

        $status  = 'success';
        $content = 'Se eliminó correctamente el rol';

        try {

            DB::beginTransaction();

            Role::find($this->role_id)->delete();

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al eliminar el rol';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('roleDeletedEvent');
    }

    public function clean()
    {
        $this->reset([
            'role_id',
            'name',
            'slug',
            'description',
            'responsable',
            'fullAccess',
            'status',
            'range',
            'asignament',
            'accion',
            'permission',
            'permission_role',
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
        $permissions = Permission::orderBy('id', 'Asc')->where('status', '=', 1)->get();

        if ($this->search != '') {
            $this->page = 1;
        }

        if (isset(($this->total)) && ($this->perPage > $this->total) && ($this->page != 1)) {
            $this->reset(['perPage']);
        }

        return view(
            'livewire.role.role-component',
            [
                'roles' => Role::latest('id')
                    ->where('name', 'LIKE', "%{$this->search}%")
                    ->orWhere('description', 'LIKE', "%{$this->search}%")
                    ->paginate($this->perPage)
            ],
            compact('permissions')
        );
    }
}
