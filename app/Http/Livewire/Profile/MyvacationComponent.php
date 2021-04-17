<?php

namespace App\Http\Livewire\Profile;

use App\Models\Absence;
use App\Models\Holiday;
use App\Models\Period;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;

class MyvacationComponent extends Component
{
    /* Datos para la tabla de vacaiones */
    public $vacan_id, $days, $beginDate, $endDate, $inProcess, $taken, $available, $responsable, $commentable, $status, $absence_id, $period_id, $usuario_id, $created_at;
    /* Datos para los modelos necesarios para este mòdulo */
    public $vacation, $periodo, $ausencia, $absences, $usuario, $usuarios, $vacaciones;
    /* Datos que el usuario vera para ver si la toma o no */
    public $inicio, $fin, $dias, $ausencia_id;

    public $anioHoy, $aniInicio, $anioTermino, $mesHoy, $mesInicio, $mesTermino, $diaHoy, $diaInicio, $diaTermino;


    public $rules = [
        'days'          => 'required|numeric',
        'beginDate'     => 'required|date',
        'endDate'       => 'required|date|after_or_equal:beginDate',
        'inProcess'     => 'required|numeric',
        'taken'         => 'required|numeric',
        'available'     => 'required|numeric',
        'responsable'   => 'required|string',
        'commentable'   => '',
        'status'        => 'required',
        'absence_id'    => 'required',
        'period_id'     => 'required',
        'created_at'    => 'required',
    ];

    protected $validationAttributes = [
        'days'          => 'días',
        'beginDate'     => 'fecha de inicio',
        'endDate'       => 'fecha de terminó',
        'inProcess'     => 'proceso',
        'taken'         => 'tomadas',
        'available'     => 'disponible',
        'responsable'   => 'responsable',
        'commentable'   => 'comentario',
        'status'        => 'estado',
        'absence_id'    => 'ausecia',
        'period_id'     => 'periodo',
        'inicio'        => 'fecha de inicio',
        'fin'           => 'fecha de termino',
        'created_at'    => 'fecha de inicio de vacación',
    ];

    public function mount()
    {
        $user = Auth::user();

        $this->usuario = User::with('profile')->where('id', '=', $user->id)->first();

        $this->usuarios = User::with('profile')->get();

        $this->absences = Absence::where('status', '=', 1)->get();

        $this->vacaciones = Holiday::with('users', 'absence', 'period')->get();

        $vacaciones = Holiday::with('users')->get();

        foreach ($vacaciones as $vacacion) {
            if (isset($vacacion->users[0])) {
                if (($vacacion->users[0]->id  == $user->id)) {
                    $beginDate          = new Carbon($vacacion->created_at);
                    $endDate            = new Carbon($vacacion->endDate);
                    $this->beginDate    = $beginDate->format('l jS \\of F Y');
                    $this->endDate      = $endDate->format('l jS \\of F Y');
                    $this->vacan_id     = $vacacion->id;
                    $this->responsable  = $vacacion->responsable;
                    $this->status       = $vacacion->status;
                    $this->period_id    = $vacacion->period_id;
                    /* $this->inProcess    = $vacacion->inProcess; */
                    $this->taken        = $vacacion->taken;
                    $this->days         = $vacacion->days;
                    $this->available    = $vacacion->available;
                    $this->created_at   = $vacacion->beginDate;
                    $this->calculaNuevoRegistro($vacacion->created_at, $vacacion->endDate);
                    if ($vacacion->status == 1) {
                        //preceso de validación
                        $this->days         = $vacacion->days;
                        /* $this->inProcess    = $vacacion->inProcess; */
                        $this->taken        = $vacacion->taken;
                        $this->available    = $vacacion->available;
                        $this->commentable  = $vacacion->commentable;
                        $this->absence_id   = $vacacion->absence_id;
                        $this->usuario_id   = $vacacion->users[0]->id;
                    } else if ($vacacion->status == 2) {
                        //Ya se acepto la validación
                        $this->obtieneDiasConTaken($vacacion->created_at, $vacacion->taken, $vacacion->beginDate, $vacacion->inProcess);
                        $this->inProcess    = $vacacion->inProcess;
                    } else {
                        //Es nuevo o ya se acpeto la validacion
                        $this->obtieneDias($vacacion->created_at);
                    }
                    if (!(isset($this->days))) {
                        $this->days = 0;
                    }
                    if (!(isset($this->inProcess))) {
                        $this->inProcess = 0;
                    }
                    if (!(isset($this->taken))) {
                        $this->taken = 0;
                    }
                    if (!(isset($this->available))) {
                        $this->available = 0;
                    }
                }
            }
        }
        /* Asigno y obtengo el period y la ausencia que tenga o este relacionado */
        if ($this->period_id) {
            $this->periodo = Period::where('id', '=', $this->period_id)->first();
        } else {
            $this->periodo = "no tiene perido";
        }
        if ($this->absence_id) {
            $this->ausencia = Absence::where('id', '=', $this->absence_id)->first();
        } else {
            $this->ausencia = "no tiene ausencia";
        }
    }

    public function obtieneDiasConTaken($fechaInicio, $tomadas, $fechaVacacion, $inProcess)
    {
        $fechaHoy    = Carbon::now();
        $fechaBegin  = new Carbon($fechaInicio);
        $fechaVacacion  = new Carbon($fechaVacacion);

        $anioHoy     = $fechaHoy->format('Y');
        $anioInicio  = $fechaVacacion->format('Y');

        $mesHoy      = $fechaHoy->format('m');
        $mesInicio   = $fechaVacacion->format('m');

        $diaHoy      = $fechaHoy->format('d');
        $diaInicio   = $fechaVacacion->format('d');

        if ($anioHoy == $anioInicio) {
            if ($mesHoy >= $mesInicio) {
                if ($diaHoy >= $diaInicio) {
                    $vacation = Holiday::where('id', '=', $this->vacan_id)->first();
                    if (isset($inProcess)) {
                        $vacation->update([
                            'days'          => $this->days - $inProcess,
                            'inProcess'     => null,
                            'taken'         => $inProcess + $this->taken,
                            'available'     => $this->available - $inProcess,
                            'status'        => 0,
                        ]);
                    }
                }
            }
        }

        $fechaHoy = $fechaHoy->format('Y-m-d');

        $diferencia_en_dias = $fechaBegin->diffInDays($fechaHoy);

        $diferencia_en_meses = $fechaBegin->diffInMonths($fechaHoy);

        $meses = $diferencia_en_meses / 2;

        $dias = $meses - $tomadas;

        /* $this->days = round($dias, 0, PHP_ROUND_HALF_DOWN); */
        $days = round($dias, 0, PHP_ROUND_HALF_DOWN);

        $diasRestantes = $diferencia_en_dias / 365;

        $disponibles = $meses + $diasRestantes;

        $available = $disponibles - $tomadas;

        /* $this->available = round($available, 2); */
    }

    public function obtieneDias($fechaInicio)
    {
        $fechaHoy    = Carbon::now();
        $fechaBegin  = new Carbon($fechaInicio);

        $fechaHoy = $fechaHoy->format('Y-m-d');

        $diferencia_en_dias = $fechaBegin->diffInDays($fechaHoy);

        $diferencia_en_meses = $fechaBegin->diffInMonths($fechaHoy);

        $meses = $diferencia_en_meses / 2;

        /* $this->days = round($meses, 0, PHP_ROUND_HALF_DOWN); */
        $days = round($meses, 0, PHP_ROUND_HALF_DOWN);

        $diasRestantes = $diferencia_en_dias / 365;

        $disponibles = $days + $diasRestantes - $this->taken;

        $this->available = round($disponibles, 2);
    }

    public function calculaNuevoRegistro($fechaInicio, $fechaTermino)
    {
        $fechaHoy    = Carbon::now();
        $fechaBegin  = new Carbon($fechaInicio);
        $fechaEnd    = new Carbon($fechaTermino);

        $anioHoy     = $fechaHoy->format('Y');
        $aniInicio   = $fechaBegin->format('Y');
        $anioTermino = $fechaEnd->format('Y');

        $mesHoy      = $fechaHoy->format('m');
        $mesInicio   = $fechaBegin->format('m');
        $mesTermino  = $fechaEnd->format('m');

        $diaHoy      = $fechaHoy->format('d');
        $diaInicio   = $fechaBegin->format('d');
        $diaTermino  = $fechaEnd->format('d');

        //Si el año actual es igual al año de inicio
        if ($anioHoy == $anioTermino) {
            // Y que el mes de hoy sea mayo o igual al mes de termino
            if ($mesHoy >= $mesTermino) {
                // Y que el dia de hoy se mayor o igual al dia de termino
                if ($diaHoy >= $diaTermino) {
                    //se crea un nuevo registro con los datos del usuario y vacaciones, se suma un año a sus vacaciones
                    $fecha  = Carbon::now();
                    /* $anio = $fecha->format('Y');
                    $period_id = Period::where('description', '=', $anio)->first(); */

                    $periodo = $fecha->format('Y');
                    $period_id = Period::where('description', '=', $periodo)->first();
                    if ($period_id) {

                        $vacacion = Holiday::where('id', '=', $this->vacan_id)->first();
                        $dias = $vacacion->days;
                        $fechaBegin = new Carbon($vacacion->created_at);
                        $fechaEnd = new Carbon($vacacion->endDate);

                        $fecha1 = $fechaBegin->addYear();
                        $fecha2 = $fechaEnd->addYear();

                        $vacation = Holiday::create([
                            'days'         => $dias + 7,
                            'beginDate'    => null,
                            'endDate'      => $fecha2,
                            'inProcess'    => null,
                            'taken'        => null,
                            'available'    => null,
                            'responsable'  => $this->responsable,
                            'commentable'  => null,
                            'status'       => 0,
                            'absence_id'   => null,
                            'period_id'    => $period_id->id,
                            'created_at'   => $fecha1,
                        ]);

                        $this->usuario->holidays()->attach($vacation->id);
                    }
                }
            }
        }
    }

    public function updated()
    {
        if ($this->inicio) {
            $this->validate([
                'inicio'       => 'required|date|after:today',
            ]);
        }
        if ($this->fin) {
            $this->validate([
                'fin'       => 'required|date|after_or_equal:inicio',
            ]);
        }

        if (isset($this->inicio) && isset($this->fin)) {

            $fechaInicio    = new Carbon($this->inicio);
            $fechaTermino    = new Carbon($this->fin);

            $diferencia_en_dias = $fechaInicio->diffInDays($fechaTermino);

            $this->dias = $diferencia_en_dias + 1;
            $days = $this->available;

            $this->validate([
                'inicio'       => 'required|date|after:today',
                'fin'          => 'required|date|after_or_equal:inicio',
                'dias'         => 'required|numeric|min:diaInicio|max:days',
            ]);
        }
    }

    public function validaDias()
    {
        $fechaInicio    = new Carbon($this->inicio);
        $fechaTermino    = new Carbon($this->fin);

        $diferencia_en_dias = $fechaInicio->diffInDays($fechaTermino);

        $this->dias = $diferencia_en_dias + 1;

        $days = $this->available;

        $this->validate([
            'inicio'       => 'required|date|after:today',
            'fin'          => 'required|date|after_or_equal:inicio',
            /* 'dias'         => 'required|numeric|min:diaInicio|max:days', */
            'ausencia_id'  => 'required',
        ]);
        if ($this->dias > $this->available) {
            $status = 'error';
            $content = 'Los dias que has solicitado no pueden ser mayor a los dias de los que dispones';
            session()->flash('process_result', [
                'status'    => $status,
                'content'   => $content,
            ]);
        } else {
            $this->update();
        }
    }

    public function update()
    {
        $status = 'success';
        $content = 'Se solicito correctamente la vacación en las fechas de ' . $this->inicio . ' a ' . $this->fin . '. Por lo que solicito ' . $this->dias . ' dias de vacaciones';

        try {

            DB::beginTransaction();

            if ($this->vacan_id) {
                $holiday = Holiday::find($this->vacan_id);

                $holiday->update([
                    'days'         => $this->days,
                    'beginDate'    => $this->inicio,
                    'inProcess'    => $this->dias,
                    'available'    => $this->available,
                    'responsable'  => $this->responsable,
                    'commentable'  => $this->commentable,
                    'status'       => 1,
                    'absence_id'   => $this->ausencia_id,
                ]);

                $this->usuario->holidays()->sync($holiday);
            }

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollBack();

            $status = 'error';
            $content = 'Ocurrio un error al tratar de solicitar sus vacaciones';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
    }

    public function clean()
    {
        $this->reset([
            'vacan_id',
            'days',
            'beginDate',
            'endDate',
            'inProcess',
            'taken',
            'available',
            'responsable',
            'commentable',
            'status',
            'absence_id',
            'period_id',
            'usuario_id',
            'vacation',
            'periodo',
            'ausencia',
            'absences',
            'usuario',
            'dias',
            'inicio',
            'fin',
            'ausencia_id'
        ]);

        $this->mount();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.profile.myvacation-component');
    }
}
