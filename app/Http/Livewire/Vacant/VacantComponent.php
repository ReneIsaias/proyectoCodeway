<?php

namespace App\Http\Livewire\Vacant;

use App\Models\Vacant;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class VacantComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $vacant_id, $name, $description, $quantity, $status, $created_at, $updated_at, $accion = "store";

    public $search = '', $perPage = '10', $page = 1, $total, $vacantes;

    public $rules = [
        'name'         => 'required|string|max:200|unique:vacants,name',
        'description'  => 'required|string',
        'quantity'     => 'required|numeric',
    ];

    protected $queryString = [
        'search'  => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];

    protected $validationAttributes = [
        'name'          => 'nombre',
        'description'   => 'descripción',
        'quantity'      => 'cantidad',
    ];

    public function mount()
    {
        $this->total = count(Vacant::all());

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updated($propertyName)
    {
        if ($this->accion == "store") {
            $this->validateOnly($propertyName, [
                'name'         => 'required|string|max:200|unique:vacants,name',
                'description'  => 'required|string',
                'quantity'     => 'required|numeric',
            ]);
        } else {
            $this->validateOnly($propertyName, [
                'name'         => 'required|string|max:200|unique:vacants,name,' . $this->vacant_id,
                'description'  => 'required|string',
                'quantity'     => 'required|numeric',
            ]);
        }
    }

    public function store()
    {
        Gate::authorize('haveaccess', 'vacant.create');

        $this->validate([
            'name'         => 'required|string|max:200|unique:vacants,name',
            'description'  => 'required|string',
            'quantity'     => 'required|numeric',
        ]);

        $status  = 'success';
        $content = 'Se agregó correctamente la vacante';

        try {

            DB::beginTransaction();

            Vacant::create([
                'name'          => $this->name,
                'slug'          => Str::slug($this->name, '-'),
                'description'   => $this->description,
                'quantity'      => $this->quantity,
            ]);

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al agregar la vacante';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('vacantCreatedEvent');
    }

    public function show(Vacant $vacant)
    {
        Gate::authorize('haveaccess', 'vacant.show');

        try {

            $created            = new Carbon($vacant->created_at);
            $updated            = new Carbon($vacant->updated_at);
            $this->vacant_id    = $vacant->id;
            $this->name         = $vacant->name;
            $this->description  = $vacant->description;
            $this->quantity     = $vacant->quantity;
            $this->status       = $vacant->status;
            $this->created_at   = $created->format('l jS \\of F Y h:i:s A');
            $this->updated_at   = $updated->format('l jS \\of F Y h:i:s A');
            $this->vacantes     = Vacant::with('preusers')->where('id', '=', $vacant->id)->get();
            
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
        $this->emit('vacantShowEvent');
    }

    public function edit(Vacant $vacant)
    {
        Gate::authorize('haveaccess', 'vacant.edit');

        try {

            $this->vacant_id    = $vacant->id;
            $this->name         = $vacant->name;
            $this->description  = $vacant->description;
            $this->quantity     = $vacant->quantity;
            $this->status       = $vacant->status;
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
        Gate::authorize('haveaccess', 'vacant.edit');

        $this->validate([
            'name'         => 'required|string|max:200|unique:vacants,name,' . $this->vacant_id,
            'description'  => 'required|string',
            'quantity'     => 'required|numeric',
        ]);

        $status  = 'success';
        $content = 'Se actualizó correctamente la vacante';

        try {

            DB::beginTransaction();

            if ($this->vacant_id) {

                $vacants = Vacant::find($this->vacant_id);
                $vacants->update([
                    'name'          => $this->name,
                    'slug'          => Str::slug($this->name, '-'),
                    'description'   => $this->description,
                    'quantity'      => $this->quantity,
                    'status'        => $this->status,
                ]);
            }

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al actualizar la vacante';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('vacantUpdatedEvent');
    }

    public function delete(Vacant $vacant)
    {
        Gate::authorize('haveaccess', 'vacant.destroy');

        try {

            $this->vacant_id    = $vacant->id;
            $this->name         = $vacant->name;
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
        Gate::authorize('haveaccess', 'vacant.destroy');

        $status  = 'success';
        $content = 'Se eliminó correctamente la vacante';

        try {

            DB::beginTransaction();

            Vacant::find($this->vacant_id)->delete();

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al eliminar la vacante';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('vacantDeletedEvent');
    }

    public function clean()
    {
        $this->reset([
            'vacant_id',
            'name',
            'description',
            'quantity',
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
            'livewire.vacant.vacant-component',
            [
                'vacants' => Vacant::latest('id')
                    ->where('name', 'LIKE', "%{$this->search}%")
                    ->orWhere('description', 'LIKE', "%{$this->search}%")
                    ->paginate($this->perPage)
            ]
        );
    }
}
