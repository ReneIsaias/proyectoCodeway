<div>
    <div class="card">
        <div class="card-header bg-secondary">
            <div class="row">
                <div class="col-8">
                    <h4 class="text-uppercase">Lista de Proyectos</h4>
                </div>
                <div class="col-4">
                    @can('haveaccess', 'project.create')
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#createProject">Agregar Proyecto</button>
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
                <table wire:poll.10000ms id="projectTable" class="table table-white table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Imagen</th>
                            <th scope="col">Clave</th>
                            <th scope="col">Proyecto</th>
                            <th scope="col">Responsable</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Clase</th>
                            <th scope="col">Categoria</th>
                            <th scope="colgroup">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                            <tr>
                                <th>
                                    <img width="100 rem" style="height: 4rem" class="rounded-circle" class="rounded-sm" src="{{ asset('storage/projects/' . $project->avatar) }}" alt="{{ $project->avatar }}">
                                </th>
                                <td>{{ $project->key }}</td>
                                <td>{{ $project->name }}</td>
                                {{-- <td><a class="color-bg" href="{{ route('project.show', $project) }}">{{ $project->name }}</a></td> --}}
                                <td>{{ $project->responsable }}</td>
                                <td>
                                    @if($project->status == 1)
                                        Activo
                                    @else
                                        Inactivo
                                    @endif
                                </td>
                                <td>
                                    @isset($project->clas->description)
                                        {{ $project->clas->description }}
                                    @else
                                        Sin clase
                                    @endisset
                                </td>
                                <td>
                                    @isset($project->category->description)
                                        {{ $project->category->description }}
                                    @else
                                        Sin categoría
                                    @endisset
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        @can('haveaccess', 'project.show')
                                            <button type="button" wire:click.prevent="show({{ $project }})" class="btn btn-info" data-toggle="modal" data-target="#showProject">Mostrar</button>
                                        @endcan
                                        @can('haveaccess', 'project.edit')
                                            <button type="button" wire:click.prevent="edit({{ $project }})" class="btn btn-success" data-toggle="modal" data-target="#updateProject">Editar</button>
                                        @endcan
                                        @can('haveaccess', 'project.destroy')
                                            <button type="button" wire:click.prevent="delete({{ $project }})" class="btn btn-danger" data-toggle="modal" data-target="#deleteProject">Borrar</button>
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
            @if ($projects->count())
                <nav class="col col-lg-6 justify-content-start" aria-label="Page navigation example">
                    <ul class="pagination justify-content">
                        <h6>Mostrando {{ $projects->count() }} registros de {{ $total }} registros totales en la página {{ $page }}</h6>
                    </ul>
                </nav>
                <nav class="col col-lg-6 justify-content-end" aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        {{ $projects->links() }}
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
    @include('livewire.project.create')
    @include('livewire.project.show')
    @include('livewire.project.update')
    @include('livewire.project.delete')
</div>
