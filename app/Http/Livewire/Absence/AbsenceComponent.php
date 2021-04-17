<?php

namespace App\Http\Livewire\Absence;

use App\Models\Absence;
use App\Models\Holiday;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;

class AbsenceComponent extends Component
{
    /* Permite trabajar con la paginación */
    use WithPagination;

    /* Variable para definir que trabajaremos con Bootstrap */
    protected $paginationTheme = 'bootstrap';

    /* Variables del modelo Absence */
    public $absence_id, $description, $status, $created_at, $updated_at, $accion = "store";

    /* Variables para la busqueda, paginación, y la página */
    public $search = '', $perPage = '10', $total, $absence, $page = 1;

    /* Defino la variable con sus validaciones */
    public $rules = [
        'description'  => 'required|alpha|max:200|unique:absences,description',
    ];

    /* Defino excepciones en la busqueda y la página, esto son excepciones que omitira en la busqueda */
    protected $queryString = [
        'search'  => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];

    /* Defino un nombre entedible para la varibale a validar */
    protected $validationAttributes = [
        'description' => 'descripción',
    ];

    /* Metodo que se ejecuta cada que se manda llamar este componente */
    public function mount()
    {
        /* Para contar el total de registros */
        $this->total = count(Absence::all());

        /* Metodos que restablecen los errores en la validaciones de los modals */
        $this->resetErrorBag();
        $this->resetValidation();
    }

    /* Metodo que permite hacer validacions en tiempo real, ya sea si es un nuevo registro o actualizacione, para eso se valida de acuerdo a la variable $accion */
    public function updated($propertyName)
    {
        /* Solo se validara si es un nuevo registro */
        if ($this->accion == "store") {
            $this->validateOnly($propertyName, [
                'description' => 'required|alpha|unique:absences,description',
            ]);
        /* Solo se validara si es la actualización de un nuevo registro */
        } else {
            $this->validateOnly($propertyName, [
                'description' => 'required|alpha|unique:absences,description,' . $this->absence_id,
            ]);
        }
    }

    /* Metodo con el que se registra en la DB */
    public function store()
    {
        /* Validamos si tiene permiso de agregar */
        Gate::authorize('haveaccess', 'absence.create');

        /* Validamos */
        $this->validate([
            'description' => 'required|alpha|max:200|unique:absences,description',
        ]);

        /* Variables con los informamos al usuario */
        $status = 'success';
        $content = 'Se agregó correctamente la ausencia';

        /* Iniciamos un try por si ocurre un posible error */
        try {

            /* Iniciamos una transacción en la DB */
            DB::beginTransaction();

            /* Agregamos un nuevo registro a la DB */
            Absence::create([
                'description'   => $this->description,
            ]);

            /* Confirmamos la transacción */
            DB::commit();

        /* Cachamos si hay un error */
        } catch (\Throwable $th) {

            /* Cancelamos la transacción en la DB */
            DB::rollBack();

            /* Asignamos un mensaje a las variables de mensaje */
            $status = 'error';
            $content = 'Ocurrió un error al agregar la ausencia';

        }

        /* Enviamos un mensaje flash mediante una sesión con las variables de mensajes */
        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        /* Mandamos llamar el metodo que resetea las variables y el componente */
        $this->clean();
        /* Emitimos un evento que recibe el index para que se cierre el modal correspondiente */
        $this->emit('absenceCreatedEvent');
    }

    /* Metodo para ver el detalle de una ausencia */
    public function show(Absence $absence)
    {
        Gate::authorize('haveaccess', 'absence.show');

        try {

            $created            = new Carbon($absence->created_at);
            $updated            = new Carbon($absence->updated_at);
            $this->absence_id   = $absence->id;
            $this->description  = $absence->description;
            $this->status       = $absence->status;
            $this->created_at   = $created->format('l jS \\of F Y h:i:s A');
            $this->updated_at   = $updated->format('l jS \\of F Y h:i:s A');
            $this->absence      = $absence;

        } catch (\Throwable $th) {

            $status = 'error';
            $content = 'Ocurrio un error en la carga de datos';

            session()->flash('process_result', [
                'status'    => $status,
                'content'   => $content,
            ]);

        }
    }

    /* Metodo que cierra el modal de ver o mostrar */
    public function close()
    {
        $this->clean();
        $this->emit('absenceShowEvent');
    }

    /* Metodo para editar una ausencia, solo recibe el id y lo asignamos a las variables correspondientes */
    public function edit(Absence $absence)
    {
        Gate::authorize('haveaccess', 'absence.edit');

        try {

            $this->absence_id   = $absence->id;
            $this->description  = $absence->description;
            $this->status       = $absence->status;
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

    /* Metodo que actuliza un registro en la DB */
    public function update()
    {
        Gate::authorize('haveaccess', 'absence.edit');

        $this->validate([
            'description' => 'required|alpha|max:200|unique:absences,description,' . $this->absence_id,
        ]);

        $status = 'success';
        $content = 'Se actualizó correctamente la ausencia';

        try {

            DB::beginTransaction();

            if ($this->absence_id) {
                $absence = Absence::find($this->absence_id);
                $absence->update([
                    'description'   => $this->description,
                    'status'        => $this->status,
                ]);
            }

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();

            $status = 'error';
            $content = 'Ocurrió un error al actualizar la ausencia';

        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('absenceUpdatedEvent');
    }

    /* Metodo que recib un id para prepararlo para eliminar */
    public function delete(Absence $absence)
    {
        Gate::authorize('haveaccess', 'absence.destroy');

        try {

            $this->absence_id   = $absence->id;
            $this->description  = $absence->description;

        } catch (\Throwable $th) {

            $status = 'error';
            $content = 'Ocurrio un error en la carga de datos';

            session()->flash('process_result', [
                'status'    => $status,
                'content'   => $content,
            ]);

        }
    }

    /* Metodo que elimina un registro de la DB de manera suave */
    public function destroy()
    {
        Gate::authorize('haveaccess', 'absence.destroy');

        $status = 'success';
        $content = 'Se eliminó correctamente la ausencia';

        try {

            DB::beginTransaction();

            Absence::find($this->absence_id)->delete();

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();

            $status = 'error';
            $content = 'Ocurrió un error al eliminar la ausencia';

        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('absenceDeletedEvent');
    }

    /* Metodo que restable las variables a su estado principal y carga el componente de nuevo */
    public function clean()
    {
        $this->reset([
            'absence_id',
            'description',
            'status',
            'accion',
            'absence',
            'created_at',
            'updated_at',
        ]);

        $this->mount();
    }

    /* Metodo que resetea las variables de busqueda, paginación y pagina */
    public function clear()
    {
        $this->reset(['search', 'perPage', 'page']);
    }

    /* Metodo que renderisa el compoenete a la vista blade correpondiente, se le pasan lo datos que se requieran */
    public function render()
    {
        $vacaciones = Holiday::latest('id')->get();

        if ($this->search != '') {
            $this->page = 1;
        }

        if (isset(($this->total)) && ($this->perPage > $this->total) && ($this->page != 1)) {
            $this->reset(['perPage']);
        }

        return view(
            'livewire.absence.absence-component',
            [
                'absences' => Absence::latest('id')
                    ->where('description', 'LIKE', "%{$this->search}%")
                    ->paginate($this->perPage)
            ],
            compact('vacaciones')
        );
    }
}
