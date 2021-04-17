<?php

namespace App\Http\Livewire\Vacant;

use App\Models\Preuser;
use App\Models\Vacant;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateComponent extends Component
{

    public $preuser_id, $name, $lastname, $phone, $email, $status, $created_at, $updated_at, $accion = "store";

    public $vacant_id, $title, $description;

    public $rules = [
        'name'         => 'required|alpha|max:100',
        'lastname'     => 'required|alpha|max:100',
        'phone'        => 'required|numeric|digits_between:10,13|unique:preusers,phone',
        'email'        => 'required|email|max:100|unique:preusers,email',
    ];

    protected $validationAttributes = [
        'name'          => 'nombre',
        'lastname'      => 'apellidos',
        'phone'         => 'teléfono',
        'email'         => 'email',
    ];

    public function mount()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate([
            'name'         => 'required|alpha|max:100',
            'lastname'     => 'required|alpha|max:100',
            'phone'        => 'required|numeric|digits_between:10,13|unique:preusers,phone',
            'email'        => 'required|email|max:100|unique:preusers,email',
        ]);

        $status  = 'success';
        $content = $this->name . ' se ha postulado correctamente a la vacante ' . $this->title;

        try {

            DB::beginTransaction();

            $aspirante = Preuser::create([
                'name'          => $this->name,
                'lastname'      => $this->lastname,
                'phone'         => $this->phone,
                'email'         => $this->email,
            ]);

            $aspirante->vacants()->sync($this->vacant_id);

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollBack();

            $status  = 'error';
            $content = 'Ocurrió un error al enviar la solicitud, intentelo mas tarde';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('preuserCreatedEvent');
    }

    public function show(Vacant $vacant)
    {
        $this->vacant_id    = $vacant->id;
        $this->title        = $vacant->name;
        $this->description  = $vacant->description;
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

    public function render()
    {
        $vacantes = Vacant::where('status', '=', 1)->get();

        return view('livewire.vacant.create-component', compact('vacantes'));
    }
}
