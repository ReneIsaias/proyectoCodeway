<?php

namespace App\Http\Livewire\User;

use App\Mail\MessageReceived;
use App\Models\Departament;
use App\Models\Group;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use App\Models\Holiday;
use App\Models\Period;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class UserComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $user_id, $nameUser, $firstLastname, $secondLastname, $phone, $name, $email, $corporative, $password, $status, $created_at, $updated_at, $accion = "store";

    public $search = '', $perPage = '10', $page = 1, $total, $role, $now, $user, $rool, $departament, $group, $depa, $grupos;

    public $user_profile, $avatar, $description, $facebook, $instagram, $github, $website, $other, $position;

    public $addDepartament, $nameDepa, $addArea, $nameArea;

    public $rules = [
        'nameUser'       => 'required|string|max:100',
        'firstLastname'  => 'required|alpha|max:100',
        'secondLastname' => 'required|alpha|max:100',
        'phone'          => 'required|numeric|digits_between:10,13',
        'name'           => 'required|string|max:100|unique:users,name',
        'email'          => 'required|email:rfc,dns,strict,spoof|max:100|unique:users,email',
        'corporative'    => 'required|email|max:100|unique:users,corporative',
        'password'       => 'required|string|min:8|max:100',
        'role'           => 'required',
        'departament'    => 'required',
        'group'          => 'required',
        'nameDepa'       => 'required',
        'nameArea'       => 'required',
    ];

    protected $queryString = [
        'search'  => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];

    protected $validationAttributes = [
        'nameUser'       => 'nombre',
        'firstLastname'  => 'primer apellido',
        'secondLastname' => 'segundo apellido',
        'phone'          => 'teléfono',
        'name'           => 'nombre de usuario',
        'email'          => 'email corporativo',
        'corporative'    => 'email',
        'password'       => 'contraseña',
        'role'           => 'rol',
        'departament'    => 'departamento',
        'group'          => 'área',
        'nameDepa'       => 'nombre departamento',
        'nameArea'       => 'nombre área',
    ];

    public function mount()
    {
        $this->total = count(User::all());
        $this->now = now();

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updated($propertyName)
    {
        if ($this->accion == "store") {
            $this->validateOnly($propertyName, [
                'nameUser'       => 'required|string|max:100',
                'firstLastname'  => 'required|alpha|max:100',
                'secondLastname' => 'required|alpha|max:100',
                'phone'          => 'required|numeric|digits_between:10,13',
                'name'           => 'required|string|max:100|unique:users,name',
                'email'          => 'required|email|max:100|unique:users,email',
                'corporative'    => 'required|email|max:100|unique:users,corporative',
                'password'       => 'required|string|min:8|max:100',
                'role'           => 'required',
                'departament'    => 'required',
                'group'          => 'required',
            ]);
        } else {
            $this->validateOnly($propertyName, [
                'nameUser'       => 'required|string|max:100',
                'firstLastname'  => 'required|alpha|max:100',
                'secondLastname' => 'required|alpha|max:100',
                'phone'          => 'required|numeric|digits_between:10,13',
                'name'           => 'required|string|max:100|unique:users,name,' . $this->user_id,
                'email'          => 'required|email|max:100|unique:users,email,' . $this->user_id,
                'corporative'    => 'required|email|max:100|unique:users,corporative,' . $this->user_id,
                'password'       => 'required|string|min:8|max:100',
                'role'           => 'required',
                'departament'    => 'required',
                'group'          => 'required',
            ]);
        }
    }

    public function store()
    {
        Gate::authorize('haveaccess', 'user.create');

        $this->validate([
            'nameUser'       => 'required|string|max:100',
            'firstLastname'  => 'required|alpha|max:100',
            'secondLastname' => 'required|alpha|max:100',
            'phone'          => 'required|numeric|digits_between:10,13',
            'name'           => 'required|string|max:100|unique:users,name',
            'email'          => 'required|email|max:100|unique:users,email',
            'corporative'    => 'required|email|max:100|unique:users,corporative',
            'password'       => 'required|string|min:8|max:100',
            'role'           => 'required',
            'departament'    => 'required',
            'group'          => 'required',
        ]);

        $status  = 'success';
        $content = 'Se agregó correctamente el usuario';

        try {

            DB::beginTransaction();

            $user = User::create([
                'nameUser'          => $this->nameUser,
                'firstLastname'     => $this->firstLastname,
                'secondLastname'    => $this->secondLastname,
                'phone'             => $this->phone,
                'name'              => $this->name,
                'email'             => $this->email,
                'corporative'       => $this->corporative,
                'password'          => Hash::make($this->password),
                'email_verified_at' => $this->now,
            ]);

            Profile::create([
                'user_id' => $user->id,
            ]);

            if ($this->role) {
                $user->roles()->sync($this->role);

                $asignament = Role::where('id', '=', $this->role)->first();

                if($asignament->asignament == 1){

                    if ($this->departament) {
                        $user->departaments()->sync($this->departament);

                        $depa = Departament::where('id', '=', $this->departament)->first();
                        $depa->update(['responsable' => $this->name]);
                    }

                    if ($this->group) {
                        $user->groups()->sync($this->group);
                    }

                }else if($asignament->asignament == 2){

                    if ($this->departament) {
                        $user->departaments()->sync($this->departament);
                    }

                    if ($this->group) {
                        $user->groups()->sync($this->group);

                        $group = Group::where('id', '=', $this->group)->first();
                        $group->update(['responsable' => $this->name]);
                    }

                }else{

                    if ($this->departament) {
                        $user->departaments()->sync($this->departament);
                    }

                    if ($this->group) {
                        $user->groups()->sync($this->group);
                    }
                }
            }

            $fecha  = Carbon::now();
            $anio = $fecha->format('Y');
            $period_id = Period::where('description', '=', $anio)->first();

            if ($period_id) {
                $endDate = $fecha->addYear()->format('Y-m-d');

                $vacation = Holiday::create([
                    'days'         => 6,
                    'beginDate'    => null,
                    'endDate'      => $endDate,
                    'inProcess'    => null,
                    'taken'        => null,
                    'available'    => null,
                    'responsable'  => Auth::user()->name,
                    'commentable'  => null,
                    'absence_id'   => null,
                    'period_id'    => $period_id->id,
                ]);

                $user->holidays()->sync($vacation->id);
            }

            /* Envio de email */
            /* Mail::to('admin@admin.com')->queue(new MessageReceived($user)); */

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al agregar el usuario';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('userCreatedEvent');
    }

    public function show(User $user)
    {
        Gate::authorize('view', [$user, ['user.show', 'userown.show']]);

        try {

            $created              = new Carbon($user->created_at);
            $updated              = new Carbon($user->updated_at);
            $this->user_id        = $user->id;
            $this->nameUser       = $user->nameUser;
            $this->firstLastname  = $user->firstLastname;
            $this->secondLastname = $user->secondLastname;
            $this->phone          = $user->phone;
            $this->name           = $user->name;
            $this->email          = $user->email;
            $this->corporative    = $user->corporative;
            $this->status         = $user->status;
            $this->created_at     = $created->format('l jS \\of F Y h:i:s A');
            $this->updated_at     = $updated->format('l jS \\of F Y h:i:s A');
            $this->user           = $user;

            if (isset($user->profile->id)) {
                $this->user_profile   = $user;
                $this->avatar         = $user->profile->avatar;
                $this->description    = $user->profile->description;

                if ($user->profile->facebook == "") {
                    $this->facebook       = null;
                } else {
                    $this->facebook       = $user->profile->facebook;
                }

                if ($user->profile->instagram == "") {
                    $this->instagram       = null;
                } else {
                    $this->instagram       = $user->profile->instagram;
                }

                if ($user->profile->github == "") {
                    $this->github       = null;
                } else {
                    $this->github       = $user->profile->github;
                }

                if ($user->profile->website == "") {
                    $this->website       = null;
                } else {
                    $this->website       = $user->profile->website;
                }

                if ($user->profile->other == "") {
                    $this->other       = null;
                } else {
                    $this->other       = $user->profile->other;
                }

                $this->position       = $user->profile->position_id;
            } else {
                $this->user_profile   = "nothing";
                $this->avatar         = "nothing";
                $this->description    = "nothing";
                $this->facebook       = null;
                $this->instagram      = null;
                $this->github         = null;
                $this->website        = null;
                $this->other          = null;
                $this->position       = "nothing";
            }

            if (isset($user->roles[0]->name)) {
                $this->role  = $user->roles[0]->name;
            } else {
                $this->role  = "Aún no se le ha asignado un rol";
            }

            if (isset($user->departaments[0]->name)) {
                $this->departament  = $user->departaments[0]->name;
            } else {
                $this->departament  = "Aún no se le ha asignado a un departamento";
            }

            if (isset($user->groups[0]->name)) {
                $this->group  = $user->groups[0]->name;
            } else {
                $this->group  = "Aún no se le ha asignado a un área";
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
        $this->emit('userShowEvent');
    }

    public function edit(User $user)
    {
        Gate::authorize('view', [$user, ['user.edit', 'userown.edit']]);

        try {

            $this->user_id        = $user->id;
            $this->nameUser       = $user->nameUser;
            $this->firstLastname  = $user->firstLastname;
            $this->secondLastname = $user->secondLastname;
            $this->phone          = $user->phone;
            $this->name           = $user->name;
            $this->email          = $user->email;
            $this->corporative    = $user->corporative;
            $this->status         = $user->status;
            $this->accion         = "update";
            $this->user           = $user;
            $this->user_profile   = $user;

            foreach ($user->roles as $role) {
                $this->role = $role->id;
            }

            foreach ($user->departaments as $departament) {
                $this->departament = $departament->id;
            }

            foreach ($user->groups as $group) {
                $this->group = $group->id;
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
        Gate::authorize('view', [$this->user, ['user.edit', 'userown.edit']]);

        $this->validate([
            'nameUser'       => 'required|string|max:100',
            'firstLastname'  => 'required|alpha|max:100',
            'secondLastname' => 'required|alpha|max:100',
            'phone'          => 'required|numeric|digits_between:10,13',
            'name'           => 'required|string|max:100|unique:users,name,' . $this->user_id,
            'email'          => 'required|email|max:100|unique:users,email,' . $this->user_id,
            'corporative'    => 'required|email|max:100|unique:users,corporative,' . $this->user_id,
            'password'       => 'nullable|string|min:8|max:100',
            'role'           => 'required',
            'departament'    => 'required',
            'group'          => 'required',
        ]);

        $status  = 'success';
        $content = 'Se actualizó correctamente el usuario';

        try {

            DB::beginTransaction();

            if ($this->user_id) {

                $user = User::find($this->user_id);

                $user->update([
                    'nameUser'        => $this->nameUser,
                    'firstLastname'   => $this->firstLastname,
                    'secondLastname'  => $this->secondLastname,
                    'phone'           => $this->phone,
                    'name'            => $this->name,
                    'email'           => $this->email,
                    'corporative'     => $this->corporative,
                    'status'          => $this->status,
                ]);

                if (isset($this->password)) {
                    $user->update([
                        'password'        => Hash::make($this->password),
                    ]);
                }

                if ($this->role) {
                    $user->roles()->sync($this->role);

                    $asignament = Role::where('id', '=', $this->role)->first();

                    if($asignament->asignament == 1){

                        if ($this->departament) {
                            $user->departaments()->sync($this->departament);

                            $depa = Departament::where('id', '=', $this->departament)->first();
                            $depa->update(['responsable' => $this->name]);
                        }

                        if ($this->group) {
                            $user->groups()->sync($this->group);
                        }

                    }else if($asignament->asignament == 2){

                        if ($this->departament) {
                            $user->departaments()->sync($this->departament);
                        }

                        if ($this->group) {
                            $user->groups()->sync($this->group);

                            $group = Group::where('id', '=', $this->group)->first();
                            $group->update(['responsable' => $this->name]);
                        }

                    }else{

                        if ($this->departament) {
                            $user->departaments()->sync($this->departament);
                        }

                        if ($this->group) {
                            $user->groups()->sync($this->group);
                        }
                    }
                }
            }

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al actualizar el usuario';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('userUpdatedEvent');
    }

    public function delete(User $user)
    {
        Gate::authorize('haveaccess', 'user.destroy');

        try {

            $this->user_id         = $user->id;
            $this->nameUser        = $user->nameUser;
            $this->firstLastname   = $user->firstLastname;
            $this->secondLastname  = $user->secondLastname;
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
        Gate::authorize('haveaccess', 'user.destroy');

        $status  = 'success';
        $content = 'Se eliminó correctamente el usuario';

        try {

            DB::beginTransaction();

            User::find($this->user_id)->delete();

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al eliminar el usuario';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('userDeletedEvent');
    }

    public function clean()
    {
        $this->reset([
            'user_id',
            'nameUser',
            'firstLastname',
            'secondLastname',
            'phone',
            'name',
            'email',
            'corporative',
            'password',
            'status',
            'accion',
            'user',
            'role',
            'rool',
            'created_at',
            'updated_at',
            'user_profile',
            'departament',
            'group',
            'depa',
        ]);

        $this->mount();
    }

    public function clear()
    {
        $this->reset(['search', 'perPage', 'page']);
    }

    public function addDepartament()
    {
        $this->addDepartament = true;
    }

    public function storeDepa()
    {
        Gate::authorize('haveaccess', 'departament.create');

        $status  = 'success';
        $content = 'Se agrego correctamente el departamento';

        $this->validate([
            'nameDepa'  => 'required|string|max:200|unique:departaments,name',
        ]);

        try {

            DB::beginTransaction();

            $depa = Departament::create([
                'name'         => $this->nameDepa,
                'description'  => $this->nameDepa,
                'responsable'  => Auth::user()->name,
            ]);

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al agregar el departamento';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);
        $this->cacelaDepa();
    }

    public function cacelaDepa()
    {
        $this->addDepartament = false;
        $this->nameDepa = null;
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function addArea()
    {
        $this->addArea = true;
    }

    public function storeArea()
    {
        Gate::authorize('haveaccess', 'group.create');

        $status  = 'success';
        $content = 'Se agrego correctamente el área';

        $this->validate([
            'nameArea'  => 'required|string|max:200|unique:groups,name',
        ]);

        try {

            DB::beginTransaction();

            $area = Group::create([
                'name'         => $this->nameArea,
                'description'  => $this->nameArea,
                'responsable'  => Auth::user()->name,
            ]);
            $depa = Departament::where('id', '=', $this->departament)->first();
            if ($depa) {
                $depa->groups()->attach($area->id);
            }

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al agregar el área';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);
        $this->cacelaArea();
    }

    public function cacelaArea()
    {
        $this->addArea = false;
        $this->nameArea = null;
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        /* $roless         = Role::orderBy('range')->where('status', '=', 1)->orWhere('range', '>', Auth::user()->roles)->get(); */

        $rango = Role::where('name', '=', Auth::user()->getRole())->first();

        $roless         = Role::orderBy('range')->where('range', '>', $rango->range)->get();

        $departamentss  = Departament::orderBy('name')->where('status', '=', 1)->get();

        $groupss        = Group::orderBy('name')->where('status', '=', 1)->get();

        $this->depa = $this->departament;

        if ($this->depa) {
            $departamentos = Departament::with('groups')->where('id', '=', $this->depa)->get();

            if (isset($departamentos)) {
                foreach ($departamentos as $departamento) {
                    $this->grupos = $departamento;
                }
            }
        }

        if ($this->search != '') {
            $this->page = 1;
        }

        if (isset(($this->total)) && ($this->perPage > $this->total) && ($this->page != 1)) {
            $this->reset(['perPage']);
        }

        return view(
            'livewire.user.user-component',
            [
                'users' => User::latest('id')
                    ->with('roles', 'profile', 'departaments', 'groups')
                    ->where('nameUser', 'LIKE', "%{$this->search}%")
                    ->orWhere('firstLastname', 'LIKE', "%{$this->search}%")
                    ->orWhere('secondLastname', 'LIKE', "%{$this->search}%")
                    ->orWhere('phone', 'LIKE', "%{$this->search}%")
                    ->orWhere('name', 'LIKE', "%{$this->search}%")
                    ->orWhere('email', 'LIKE', "%{$this->search}%")
                    ->orWhere('corporative', 'LIKE', "%{$this->search}%")
                    ->paginate($this->perPage)
            ],
            compact('roless', 'departamentss', 'groupss')
        );
    }
}
