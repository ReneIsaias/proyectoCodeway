<?php

namespace App\Http\Livewire\Period;

use App\Models\Holiday;
use App\Models\Period;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PeriodComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $period_id, $description, $status, $created_at, $updated_at, $accion = "store";

    public $search = '', $perPage = '10', $page = 1, $total, $period;

    public $rules = [
        'description'  => 'required|numeric|unique:periods,description',
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
        $this->total = count(Period::all());

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updated($propertyName)
    {
        if ($this->accion == "store") {
            $this->validateOnly($propertyName, [
                'description' => 'required|numeric|unique:periods,description',
            ]);
        } else {
            $this->validateOnly($propertyName, [
                'description' => 'required|numeric|unique:periods,description,' . $this->period_id,
            ]);
        }
    }

    public function store()
    {
        Gate::authorize('haveaccess', 'period.create');

        $this->validate([
            'description' => 'required|numeric|unique:periods,description',
        ]);

        $status  = 'success';
        $content = 'Se agregó correctamente el periodo';

        try {

            DB::beginTransaction();

            Period::create([
                'description'   => $this->description,
            ]);

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();

            $status  = 'error';
            $content = 'Ocurrió un error al agregar el periodo';

        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('periodCreatedEvent');
    }

    public function show(Period $period)
    {
        Gate::authorize('haveaccess', 'period.show');

        try {

            $created            = new Carbon($period->created_at);
            $updated            = new Carbon($period->updated_at);
            $this->period_id    = $period->id;
            $this->description  = $period->description;
            $this->status       = $period->status;
            $this->created_at   = $created->format('l jS \\of F Y h:i:s A');
            $this->updated_at   = $updated->format('l jS \\of F Y h:i:s A');
            $this->period       = $period;

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
        $this->emit('periodShowEvent');
    }

    public function edit(Period $period)
    {
        Gate::authorize('haveaccess', 'period.edit');

        $this->period_id    = $period->id;
        $this->description  = $period->description;
        $this->status       = $period->status;
        $this->accion       = "update";
    }

    public function update()
    {
        Gate::authorize('haveaccess', 'period.edit');

        $this->validate([
            'description' => 'required|numeric|unique:periods,description,' . $this->period_id,
        ]);

        $status  = 'success';
        $content = 'Se actualizó correctamente el periodo';

        try {

            DB::beginTransaction();

            if ($this->period_id) {
                $periods = Period::find($this->period_id);
                $periods->update([
                    'description'   => $this->description,
                    'status'        => $this->status,
                ]);
            }

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();

            $status  = 'error';
            $content = 'Ocurrió un error al actualizar el periodo';

        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('periodUpdatedEvent');
    }

    public function delete(Period $period)
    {
        Gate::authorize('haveaccess', 'period.destroy');

        try {

            $this->period_id    = $period->id;
            $this->description  = $period->description;
            
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
        Gate::authorize('haveaccess', 'period.destroy');

        $status  = 'success';
        $content = 'Se eliminó correctamente el periodo';

        try {

            DB::beginTransaction();

            Period::find($this->period_id)->delete();

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();

            $status  = 'error';
            $content = 'Ocurrió un error al eliminar el periodo';

        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('periodDeletedEvent');
    }

    public function clean()
    {
        $this->reset([
            'period_id',
            'description',
            'status',
            'accion',
            'period',
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
        $vacaciones = Holiday::latest('id')->get();

        if ($this->search != '') {
            $this->page = 1;
        }

        if (isset(($this->total)) && ($this->perPage > $this->total) && ($this->page != 1)) {
            $this->reset(['perPage']);
        }

        return view(
            'livewire.period.period-component',
            [
                'periods' => Period::latest('id')
                    ->where('description', 'LIKE', "%{$this->search}%")
                    ->paginate($this->perPage)
            ],
            compact('vacaciones')
        );
    }
}
