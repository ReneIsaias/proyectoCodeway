<?php

namespace App\Http\Livewire\Preuser;

use App\Models\Preuser;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PreuserComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $preuser_id, $name, $lastname, $phone, $email, $status, $created_at, $updated_at, $accion = "store";

    public $search = '', $perPage = '10', $page = 1, $total;

    public $rules = [
        'name'         => 'required|alpha|max:100',
        'lastname'     => 'required|alpha|max:100',
        'phone'        => 'required|numeric|digits_between:10,13|unique:preusers,phone',
        'email'        => 'required|email|max:100|unique:preusers,email',
    ];

    protected $queryString = [
        'search'  => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];

    protected $validationAttributes = [
        'name'          => 'nombre',
        'lastname'      => 'apellidos',
        'phone'         => 'teléfono',
        'email'         => 'email',
    ];

    public function mount()
    {
        $this->total = count(Preuser::all());

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updated($propertyName)
    {
        if ($this->accion == "store") {
            $this->validateOnly($propertyName, [
                'name'         => 'required|alpha|max:100',
                'lastname'     => 'required|alpha|max:100',
                'phone'        => 'required|numeric|digits_between:10,13|unique:preusers,phone',
                'email'        => 'required|email|max:100|unique:preusers,email',
            ]);
        } else {
            $this->validateOnly($propertyName, [
                'name'         => 'required|alpha|max:100',
                'lastname'     => 'required|alpha|max:100',
                'phone'        => 'required|numeric|digits_between:10,13|unique:preusers,phone,' . $this->preuser_id,
                'email'        => 'required|email|max:100|unique:preusers,email,' . $this->preuser_id,
            ]);
        }
    }

    public function store()
    {
        Gate::authorize('haveaccess', 'preuser.create');

        $this->validate([
            'name'         => 'required|alpha|max:100',
            'lastname'     => 'required|alpha|max:100',
            'phone'        => 'required|numeric|digits_between:10,13|unique:preusers,phone',
            'email'        => 'required|email|max:100|unique:preusers,email',
        ]);

        $status  = 'success';
        $content = 'Se agregó correctamente al aspirante';

        try {

            DB::beginTransaction();

            Preuser::create([
                'name'          => $this->name,
                'lastname'      => $this->lastname,
                'phone'         => $this->phone,
                'email'         => $this->email,
            ]);

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();

            $status  = 'error';
            $content = 'Ocurrió un error al agregar al aspirante';

        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('preuserCreatedEvent');
    }

    public function show(Preuser $preuser)
    {
        Gate::authorize('haveaccess', 'preuser.show');

        try {

            $created                = new Carbon($preuser->created_at);
            $updated                = new Carbon($preuser->updated_at);
            $this->preuser_id       = $preuser->id;
            $this->name             = $preuser->name;
            $this->lastname         = $preuser->lastname;
            $this->phone            = $preuser->phone;
            $this->email            = $preuser->email;
            $this->status           = $preuser->status;
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
        $this->emit('preuserShowEvent');
    }

    public function edit(Preuser $preuser)
    {
        Gate::authorize('haveaccess', 'preuser.edit');

        try {

            $this->preuser_id       = $preuser->id;
            $this->name             = $preuser->name;
            $this->lastname         = $preuser->lastname;
            $this->phone            = $preuser->phone;
            $this->email            = $preuser->email;
            $this->status           = $preuser->status;
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
        Gate::authorize('haveaccess', 'preuser.edit');

        $this->validate([
            'name'         => 'required|alpha|max:100',
            'lastname'     => 'required|alpha|max:100',
            'phone'        => 'required|numeric|digits_between:10,13|unique:preusers,phone,' . $this->preuser_id,
            'email'        => 'required|email|max:100|unique:preusers,email,' . $this->preuser_id,
        ]);

        $status  = 'success';
        $content = 'Se actualizó correctamente al aspirante';

        try {

            DB::beginTransaction();

            if ($this->preuser_id) {
                $preusers = Preuser::find($this->preuser_id);
                $preusers->update([
                    'name'          => $this->name,
                    'lastname'      => $this->lastname,
                    'phone'         => $this->phone,
                    'email'         => $this->email,
                    'status'        => $this->status,
                ]);
            }

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();

            $status  = 'error';
            $content = 'Ocurrió un error al actualizar al aspirante';

        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,

        ]);

        $this->clean();
        $this->emit('preuserUpdatedEvent');
    }

    public function delete(Preuser $preusers)
    {
        Gate::authorize('haveaccess', 'preuser.destroy');

        try {

            $this->preuser_id   = $preusers->id;
            $this->name         = $preusers->name;
            $this->lastname     = $preusers->lastname;

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
        Gate::authorize('haveaccess', 'preuser.destroy');

        $status  = 'success';
        $content = 'Se eliminó correctamente al aspirante';

        try {

            DB::beginTransaction();

            Preuser::find($this->preuser_id)->delete();

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();

            $status  = 'error';
            $content = 'Ocurrió un error al eliminar al aspirante';

        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('preuserDeletedEvent');
    }

    public function clean()
    {
        $this->reset([
            'preuser_id',
            'name',
            'lastname',
            'phone',
            'email',
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
            'livewire.preuser.preuser-component',
            [
                'preusers' => Preuser::latest('id')
                    ->where('name', 'LIKE', "%{$this->search}%")
                    ->orWhere('lastname', 'LIKE', "%{$this->search}%")
                    ->orWhere('phone', 'LIKE', "%{$this->search}%")
                    ->orWhere('email', 'LIKE', "%{$this->search}%")
                    ->paginate($this->perPage)
            ]
        );
    }
}
