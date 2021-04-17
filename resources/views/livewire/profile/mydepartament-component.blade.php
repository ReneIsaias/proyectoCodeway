<div>
    <div wire:poll.100ms class="card" style="height: 100%;">
        <div class="card-header bg-secondary">
            <div class="row">
                <div class="col-6">
                    <h4 class="font-weight-normal text-uppercase">Departameno de {{$departamento}}</h4>
                </div>
                <div class="col-6">
                    <h6 class="justify-content-end">{{$descripcion}}</h6>
                </div>
            </div>
        </div>
        <div class="table-responsive px-1" style="height: 25rem;">
            <div class="card-body">
                @isset($comentarios)
                    @foreach ($comentarios as $comentario)
                    <div class="row">
                        @if ($comentario->user_id == $yo->id)
                            <div class="col-1 text-center">
                                <img src="{{ asset('storage/users/' . $yo->profile->avatar) }}" width="80%" alt="{{ $yo->profile->avatar }}"><br>
                            </div>
                            <div class="col-11 border border-primary rounded-pill my-1">
                                <p class="font-weight-normal text-monospace mt-2 mx-3">
                                    {{ $yo->name }} : {{ $comentario->body }}
                                    <small class="d-flex justify-content-end">{{$comentario->created_at->diffForHumans()}}</small>
                                </p>
                            </div>
                        @else
                            <div class="col-11 border border-success rounded-pill my-1">
                                @foreach ($otros as $otro)
                                    @if ($comentario->user_id == $otro->id)
                                        <p class="font-weight-normal text-monospace mt-2 mx-3">
                                            {{ $otro->name }} : {{ $comentario->body }}
                                            <small class="d-flex justify-content-end">{{$comentario->created_at->diffForHumans()}}</small>
                                        </p>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-1 text-center">
                                @foreach ($otros as $otro)
                                    @if ($comentario->user_id == $otro->id)
                                        <img src="{{ asset('storage/users/' . $otro->profile->avatar) }}" width="80%" alt="{{ $otro->profile->avatar }}"><br>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                    @endforeach
                @endisset
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1 col-1">
                    <img src="{{ asset('storage/users/' . $usuario->profile->avatar) }}" width="80%" class="rounded-circle" alt="{{ $usuario->profile->avatar }}">
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8">
                    <input type="text" class="form-control rounded-pill" wire:keydown.enter="send()" name="message" wire:model="message" autofocus>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3">
                    <button type="button" wire:click.prevent="send()" class="btn btn-primary float-end btn-block" >Enviar</button>
                </div>
            </div>
        </div>
    </div>
</div>
