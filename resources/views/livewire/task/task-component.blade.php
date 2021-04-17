<div>
    <div class="card">
        <div class="card-header bg-secondary">
            <div class="row">
                <div class="col-8">
                    <h4 class="text-uppercase">Lista de Tareas</h4>
                </div>
                {{-- <div class="col-4">
                    @can('haveaccess', 'task.create')
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#createTask">Agregar Tarea</button>
                    @endcan
                </div> --}}
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
                <table wire:poll.10000ms id="classTable" class="table table-white table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Tarea</th>
                            <th scope="col">Informador</th>
                            <th scope="col">Responsable</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Prioridad</th>
                            <th scope="colgroup">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->name }}</td>
                                <td>{{ $task->informer }}</td>
                                <td>{{ $task->responsable }}</td>
                                <td>
                                    @isset($task->statu->description)
                                        {{ $task->statu->description }}
                                    @else
                                        Sin estado
                                    @endisset
                                </td>
                                <td>
                                    @isset($task->type->description)
                                        {{ $task->type->description }}
                                    @else
                                        Sin tipo
                                    @endisset
                                </td>
                                <td>
                                    @isset($task->priority->description)
                                        {{ $task->priority->description }}
                                    @else
                                        Sin prioridad
                                    @endisset
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        @can('haveaccess', 'task.show')
                                            <button type="button" wire:click.prevent="show({{ $task->id }})" class="btn btn-info" data-toggle="modal" data-target="#showTask">Mostrar</button>
                                        @endcan
                                        @can('haveaccess', 'task.edit')
                                            <button type="button" wire:click.prevent="edit({{ $task->id }})" class="btn btn-success" data-toggle="modal" data-target="#updateTask">Editar</button>
                                        @endcan
                                        @can('haveaccess', 'task.destroy')
                                            <button type="button" wire:click.prevent="delete({{ $task->id }})" class="btn btn-danger" data-toggle="modal" data-target="#deleteTask">Borrar</button>
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
            @if ($tasks->count())
                <nav class="col col-lg-6 justify-content-start" aria-label="Page navigation example">
                    <ul class="pagination justify-content">
                        <h6>Mostrando {{ $tasks->count() }} registros de {{ $total }} registros totales en la página {{ $page }}</h6>
                    </ul>
                </nav>
                <nav class="col col-lg-6 justify-content-end" aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        {{ $tasks->links() }}
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
    @include('livewire.task.create')
    @include('livewire.task.show')
    @include('livewire.task.update')
    @include('livewire.task.delete')
</div>
