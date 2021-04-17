<div>
    <div class="card">
        <div class="card-header bg-secondary">
            <div class="row">
                <div class="col-8">
                    <h4 class="text-uppercase">Lista de Vacaciones</h4>
                </div>
                <div class="col-4">
                    @can('haveaccess', 'holiday.create')
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#createHoliday">Agregar Vacación</button>
                    @endcan
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="form-group">
                    <div class="row">
                        <div class="col-8">
                            <input type="text" class="form-control" placeholder="Buscar" wire:model="search" wire:dirty.class="bg-secondary">
                        </div>
                        <div class="col-3 justify-content-end">
                            <select class="form-control" wire:model="perPage">
                                <option value="10">10 por página</option>
                                <option value="25">25 por página</option>
                                <option value="50">50 por página</option>
                                <option value="100">100 por página</option>
                            </select>
                        </div>
                        @if ($search !== '')
                            <div wire:click="clear" class="col-1">
                                <button class="btn btn-light">X</button>
                            </div>
                        @endif
                    </div>
                </div>
                <table wire:poll.10000ms id="holidayTable" class="table table-white table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Usuario</th>
                            <th scope="col">Días</th>
                            <th scope="col">Inicio</th>
                            <th scope="col">Termino</th>
                            <th scope="col">Proceso</th>
                            <th scope="col">Tomadas</th>
                            <th scope="col">Viables</th>
                            <th scope="col">Resposable</th>
                            <th scope="col">Ausencia</th>
                            <th scope="col">Periodo</th>
                            <th scope="colgroup">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($holidays as $holiday)
                            <tr>
                                <td>
                                    @isset($holiday->users[0]->id)
                                        {{ $holiday->users[0]->name }}
                                    @else
                                        No hay usuario
                                    @endisset
                                </td>
                                <td>{{ $holiday->days }}</td>
                                <td>{{ $holiday->created_at }}</td>
                                <td>{{ $holiday->endDate }}</td>
                                <td>{{ $holiday->inProcess }}</td>
                                <td>{{ $holiday->taken }}</td>
                                <td>{{ $holiday->available }}</td>
                                <td>{{ $holiday->responsable }}</td>
                                <td>
                                    @isset($holiday->absence->description)
                                        {{ $holiday->absence->description }}
                                    @else
                                        Sin ausencia
                                    @endisset
                                </td>
                                <td>
                                    @isset($holiday->period->description)
                                        {{ $holiday->period->description }}
                                    @else
                                        Sin periodo
                                    @endisset
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        @can('haveaccess', 'holiday.show')
                                            <button type="button" wire:click.prevent="show({{ $holiday->id }})" class="btn btn-info" data-toggle="modal" data-target="#showHoliday">Mostrar</button>
                                        @endcan
                                        @can('haveaccess', 'holiday.edit')
                                            <button type="button" wire:click.prevent="edit({{ $holiday->id }})" class="btn btn-success" data-toggle="modal" data-target="#updateHoliday">Editar</button>
                                        @endcan
                                        @can('haveaccess', 'holiday.destroy')
                                            <button type="button" wire:click.prevent="delete({{ $holiday->id }})" class="btn btn-danger" data-toggle="modal" data-target="#deleteHoliday">Borrar</button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
            @if ($holidays->count())
                <nav class="col col-lg-6 justify-content-start" aria-label="Page navigation example">
                    <ul class="pagination justify-content">
                        <h6>Mostrando {{ $holidays->count() }} registros de {{ $total }} registros totales en la página {{ $page }}</h6>
                    </ul>
                </nav>
                <nav class="col col-lg-6 justify-content-end" aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        {{ $holidays->links() }}
                    </ul>
                </nav>
            @else
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content">
                        <h6>No hay resultados para la búsqueda "{{ $search}}" en la página {{ $page }} al mostrar {{ $perPage }} por página</h6>
                    </ul>
                </nav>
            @endif
        </div>
    </div>
    @include('custom.message')
    @include('livewire.holiday.create')
    @include('livewire.holiday.show')
    @include('livewire.holiday.update')
    @include('livewire.holiday.delete')
</div>
