<div>
    <div class="card">
        <div class="card-header bg-secondary">
            <div class="row">
                <div class="col-8">
                    <h4 class="text-uppercase">Lista de Usuarios</h4>
                </div>
                <div class="col-4">
                    @can('haveaccess', 'user.create')
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#createUser">Agregar Usuario</button>
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
                <table wire:poll.10000ms id="userTable" class="table table-white table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Avatar</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Email</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Departamento</th>
                            <th scope="colgroup">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th>
                                    @isset($user->profile->avatar)
                                        <img src="{{ asset('storage/users/' . $user->profile->avatar) }}" width="90px" class="rounded-circle" alt="{{ $user->profile->avatar }}">
                                    @endisset
                                </th>
                                <td>{{ $user->nameUser }} {{ $user->firstLastname }} {{ $user->secondLastname }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @isset( $user->roles[0]->name )
                                        {{ $user->roles[0]->name }}
                                    @else
                                        Sin Rol
                                    @endisset
                                </td>
                                <td>
                                    @isset( $user->departaments[0]->name )
                                        {{ $user->departaments[0]->name }}
                                    @else
                                        Sin Departamento
                                    @endisset
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        @can('view',[$user, ['user.show','userown.show'] ])
                                            <button type="button" wire:click.prevent="show({{ $user->id }})" class="btn btn-info" data-toggle="modal" data-target="#showUser">Mostrar</button>
                                        @endcan
                                        @can('view', [$user, ['user.edit','userown.edit'] ])
                                            <button type="button" wire:click.prevent="edit({{ $user->id }})" class="btn btn-success" data-toggle="modal" data-target="#updateUser">Editar</button>
                                        @endcan
                                        @can('haveaccess', 'user.destroy')
                                            <button type="button" wire:click.prevent="delete({{ $user->id }})" class="btn btn-danger" data-toggle="modal" data-target="#deleteUser">Borrar</button>
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
            @if ($users->count())
                <nav class="col col-lg-6 justify-content-start" aria-label="Page navigation example">
                    <ul class="pagination justify-content">
                        <h6>Mostrando {{ $users->count() }} registros de {{ $total }} registros totales en la página {{ $page }}</h6>
                    </ul>
                </nav>
                <nav class="col col-lg-6 justify-content-end" aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        {{ $users->links() }}
                    </ul>
                </nav>
            @else
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content">
                        <h6>No hay resultados para la búsqueda "{{ $search }}" en la página {{ $page }} al mostrar {{ $perPage }} por página</h6>
                    </ul>
                </nav>
            @endif
        </div>
    </div>
    @include('custom.message')
    @include('livewire.user.create')
    @include('livewire.user.show')
    @include('livewire.user.update')
    @include('livewire.user.delete')
</div>
