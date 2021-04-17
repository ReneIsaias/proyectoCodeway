<div>
    <div class="card">
        <div class="card-header bg-secondary">
            <div class="row">
                <div class="col-8">
                    <h4 class="text-uppercase">Lista de Roles</h4>
                </div>
                <div class="col-4">
                    @can('haveaccess', 'role.create')
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#createRole">Agregar Rol</button>
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
                <table wire:poll.10000ms id="roleTable" class="table table-white table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Rol</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acceso total</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Creado</th>
                            <th scope="col">Actualizado</th>
                            <th scope="colgroup">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $rol)
                            <tr>
                                <td>{{ $rol->name }}</td>
                                <td>{{ $rol->description }}</td>
                                <td>
                                    @if ($rol["fullAccess"] == "yes")
                                        Si
                                    @else
                                        No
                                    @endif
                                </td>
                                <td>
                                    @if ($rol->status == "1")
                                        Activo
                                    @else
                                        Inactivo
                                    @endif
                                </td>
                                <td>{{ $rol->created_at->diffForHumans() }}</td>
                                <td>{{ $rol->updated_at->diffForHumans() }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        @can('haveaccess', 'role.show')
                                            <button type="button" wire:click.prevent="show({{ $rol->id }})" class="btn btn-info" data-toggle="modal" data-target="#showRole">Mostrar</button>
                                        @endcan
                                        @can('haveaccess', 'role.edit')
                                            <button type="button" wire:click.prevent="edit({{ $rol->id }})" class="btn btn-success" data-toggle="modal" data-target="#updateRole">Editar</button>
                                        @endcan
                                        @can('haveaccess', 'role.destroy')
                                            <button type="button" wire:click.prevent="delete({{ $rol->id }})" class="btn btn-danger" data-toggle="modal" data-target="#deleteRole">Borrar</button>
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
            @if ($roles->count())
                <nav class="col col-lg-6 justify-content-start" aria-label="Page navigation example">
                    <ul class="pagination justify-content">
                        <h6>Mostrando {{ $roles->count() }} registros de {{ $total }} registros totales en la página {{ $page }}</h6>
                    </ul>
                </nav>
                <nav class="col col-lg-6 justify-content-end" aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        {{ $roles->links() }}
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
    @include('livewire.role.create')
    @include('livewire.role.show')
    @include('livewire.role.update')
    @include('livewire.role.delete')
</div>
