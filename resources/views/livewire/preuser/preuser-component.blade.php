<div>
    <div class="card">
        <div class="card-header bg-secondary">
            <div class="row">
                <div class="col-8">
                    <h4 class="text-uppercase">Lista de Aspirantes</h4>
                </div>
                <div class="col-4">
                    @can('haveaccess', 'preuser.create')
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#createPreuser">Agregar Aspirante</button>
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
                <table wire:poll.10000ms id="preuserTable" class="table table-white table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Aspirante</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Email</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Creado</th>
                            <th scope="col">Actualizado</th>
                            <th scope="colgroup">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($preusers as $preuser)
                            <tr>
                                <td>{{ $preuser->name }} {{ $preuser->lastname }}</td>
                                <td>{{ $preuser->phone }}</td>
                                <td>{{ $preuser->email }}</td>
                                <td>
                                    @if ($preuser->status == "1")
                                        Activo
                                    @else
                                        Inactivo
                                    @endif
                                </td>
                                <td>{{ $preuser->created_at->diffForHumans() }}</td>
                                <td>{{ $preuser->updated_at->diffForHumans() }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        @can('haveaccess', 'preuser.show')
                                            <button type="button" wire:click.prevent="show({{ $preuser->id }})" class="btn btn-info" data-toggle="modal" data-target="#showPreuser">Mostrar</button>
                                        @endcan
                                        @can('haveaccess', 'preuser.edit')
                                            <button type="button" wire:click.prevent="edit({{ $preuser->id }})" class="btn btn-success" data-toggle="modal" data-target="#updatePreuser">Editar</button>
                                        @endcan
                                        @can('haveaccess', 'preuser.destroy')
                                            <button type="button" wire:click.prevent="delete({{ $preuser->id }})" class="btn btn-danger" data-toggle="modal" data-target="#deletePreuser">Borrar</button>
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
            @if ($preusers->count())
                <nav class="col col-lg-6 justify-content-start" aria-label="Page navigation example">
                    <ul class="pagination justify-content">
                        <h6>Mostrando {{ $preusers->count() }} registros de {{ $total }} registros totales en la página {{ $page }}</h6>
                    </ul>
                </nav>
                <nav class="col col-lg-6 justify-content-end" aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        {{ $preusers->links() }}
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
    @include('livewire.preuser.create')
    @include('livewire.preuser.show')
    @include('livewire.preuser.update')
    @include('livewire.preuser.delete')
</div>
