<div>
    <div class="card">
        <div class="card-header bg-secondary">
            <div class="row">
                <div class="col-8">
                    <h4 class="text-uppercase">Lista de Eventos Generales</h4>
                </div>
                <div class="col-4">
                    @can('haveaccess', 'event.create')
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#createEvent">Agregar Evento</button>
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
                <table wire:poll.10000ms id="eventTable" class="table table-white table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Usuario</th>
                            <th scope="col">Título</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Creado</th>
                            <th scope="col">Actualizado</th>
                            <th scope="colgroup">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>
                                    @isset($event->users[0]->name)
                                        @foreach ($usuarios as $usuario)
                                            @if ($usuario->name == $event->users[0]->name)
                                                <img src="{{ asset('storage/users/' . $usuario->profile->avatar) }}" width="90px" class="rounded-circle" alt="{{ $usuario->profile->avatar }}">
                                            @endif
                                        @endforeach
                                    @else
                                        Sin usuario
                                    @endisset
                                </td>
                                <td>{{ $event->title }}</td>
                                <td>
                                    @if ($event->status == "1")
                                        Activo
                                    @else
                                        Inactivo
                                    @endif
                                </td>
                                <td>{{ $event->created_at->diffForHumans() }}</td>
                                <td>{{ $event->updated_at->diffForHumans() }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        @can('haveaccess', 'event.show')
                                            <button type="button" wire:click.prevent="show({{ $event->id }})" class="btn btn-info" data-toggle="modal" data-target="#showEvent">Mostrar</button>
                                        @endcan
                                        @can('haveaccess', 'event.edit')
                                            <button type="button" wire:click.prevent="edit({{ $event->id }})" class="btn btn-success" data-toggle="modal" data-target="#updateEvent">Editar</button>
                                        @endcan
                                        @can('haveaccess', 'event.destroy')
                                            <button type="button" wire:click.prevent="delete({{ $event->id }})" class="btn btn-danger" data-toggle="modal" data-target="#deleteEvent">Borrar</button>
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
            @if ($events->count())
                <nav class="col col-lg-6 justify-content-start" aria-label="Page navigation example">
                    <ul class="pagination justify-content">
                        <h6>Mostrando {{ $events->count() }} registros de {{ $total }} registros totales en la página {{ $page }}</h6>
                    </ul>
                </nav>
                <nav class="col col-lg-6 justify-content-end" aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        {{ $events->links() }}
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
    @include('livewire.event.create')
    @include('livewire.event.show')
    @include('livewire.event.update')
    @include('livewire.event.delete')
</div>
