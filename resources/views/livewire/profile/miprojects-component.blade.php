<div>

    <div class="card">
        <div class="card-body">
            @foreach ($usuario as $user)
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    @forelse($user->departaments as $departament)
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <label class="text-white text-uppercase" for="name"> Departamento {{ $departament->name }}</label>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="description">Descripción</label>
                                    <h5>{{ $departament->description }}</h5>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="form-group">
                                    <div class="d-flex justify-content-end">
                                        @foreach ($res_depa as $responsable)
                                            @if ($responsable->name == $departament->responsable)
                                                <img src="{{ asset('storage/users/' . $responsable->profile->avatar) }}" width="10%" class="rounded-circle" alt="{{ $responsable->profile->avatar }}">
                                                {{-- <small> {{ $departament->responsable}} </small> --}}
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <label class="text-white text-uppercase" for="nombre">Aun no eres asignado a un departamento</label>
                            </div>
                            <div class="card-body">
                                <h5>
                                    Parece que no te han asignado un departamento en el que puedas trabajar, es raro que pase esto por lo que te recomiendo que le informes a tu superior.
                                </h5>
                                <h5>
                                    Prueba estas opciones:
                                </h5>
                                <h5>
                                    <li>Cierra sesión y vuelve a entrar</li>
                                    <li>Revisa tu conexión a internet</li>
                                    <li>Verifica que estés en un departamento</li>
                                    <li>Infórmale  a tu superior tu situación</li>
                                </h5>
                            </div>
                            <div class="card-footer">
                                - - - -
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    @forelse($user->groups as $group)
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <label class="text-white text-uppercase" for="name">Área {{ $group->name }}</label>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="description">Descripción</label>
                                    <h5>{{ $group->description }}</h5>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="form-group">
                                    <div class="d-flex justify-content-end">
                                        @foreach ($res_area as $responsable)
                                            @if ($responsable->name == $group->responsable)
                                                <img src="{{ asset('storage/users/' . $responsable->profile->avatar) }}" width="10%" class="rounded-circle" alt="{{ $responsable->profile->avatar }}">
                                                {{-- <small> {{ $group->responsable}} </small> --}}
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <label class="text-white text-uppercase" for="nombre">Aun no eres asignado a un área</label>
                            </div>
                            <div class="card-body">
                                <h5>
                                    Parece que no te han asignado un área en la que puedas trabajar, es raro que pase esto por lo que te recomiendo que le informes a tu superior.
                                </h5>
                                <h5>
                                    Prueba estas opciones:
                                </h5>
                                <h5>
                                    <li>Cierra sesión y vuelve a entrar</li>
                                    <li>Revisa tu conexión a internet</li>
                                    <li>Verifica que estés en un departamento</li>
                                    <li>Infórmale a tu superior tu situación</li>
                                </h5>
                            </div>
                            <div class="card-footer">
                                - - - -
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
            <hr>
            <h4 class="text-uppercase text-center">MIS PROYECTOS</h4>
                @forelse($user->projects as $project)
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <label class="text-white text-uppercase" for="nombre">{{ $project->name }}</label>
                            <a class="btn btn-primary float-right" href="{{ route('project.show', $project) }}">Trabajar en este proyecto</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <label for="clave">Clave</label>
                                        <h5>{{ $project->key }}</h5>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Descripción</label>
                                        <h5>{{ $project->description }}</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label for="clase">Clase</label>
                                                @isset($project->clas->description)
                                                    <h5>{{ $project->clas->description }}</h5>
                                                @else
                                                    <h5>Este proyecto no esta asignado a una clase</h5>
                                                @endisset
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label for="categoria">Categoría</label>
                                                @isset($project->category->description)
                                                    <h5>{{ $project->category->description }}</h5>
                                                @else
                                                    <h5>Este proyecto no esta asignado a una categoría</h5>
                                                @endisset
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        @if ($project->status == "1")
                                            <h5>Activo</h5>
                                        @else
                                            <h5>Inactivo</h5>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <img class="img-fluid" src="{{ asset('storage/projects/' . $project->avatar) }}" alt="{{ $project->avatar }}">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group">
                                <div class="d-flex justify-content-end">
                                    @foreach ($res_project as $responsable)
                                        @if ($responsable->name == $project->responsable)
                                            <img src="{{ asset('storage/users/' . $responsable->profile->avatar) }}" width="10%" class="rounded-circle" alt="{{ $responsable->profile->avatar }}">
                                            {{-- <small> {{ $project->responsable}} </small> --}}
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <label class="text-white text-uppercase" for="nombre">Aun no eres asignado a un proyecto</label>
                        </div>
                        <div class="card-body">
                            <h5>
                                Parece que no te han asignado un proyecto en el que puedas trabajar, es raro que pase esto por lo que te recomiendo que le informes a tu superior.
                            </h5>
                            <h5>
                                Prueba estas opciones:
                            </h5>
                            <h5>
                                <li>Cierra sesión y vuelve a entrar</li>
                                <li>Revisa tu conexión a internet</li>
                                <li>Verifica que estés en un departamento</li>
                                <li>Infórmale a tu superior tu situación</li>
                            </h5>
                        </div>
                        <div class="card-footer">
                            - - - -
                        </div>
                    </div>
                @endforelse
            @endforeach
        </div>
    </div>
</div>
