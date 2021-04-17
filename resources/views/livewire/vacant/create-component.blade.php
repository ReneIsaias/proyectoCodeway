<div>
    <div class="card">
        <div class="card-header bg-secondary mt-2">
            <a href="/"><h4 class="text-uppercase text-muted text-white">Codeway Soluciones Integrales</h4></a>
        </div>
        <div class="card body">
            <label class="text-center mt-2" for="titulo"><h5 class="text-uppercase">Lista de Vacantes Disponibles</h5></label>
            <div class="row">
                @foreach ($vacantes as $vacante)
                    <div class="col-3">
                        <div class="card" style="height: 20rem">
                            <div class="card-header bg-secondary">
                                <h5 class="text-muted text-white">{{$vacante->name}}</h5>
                            </div>
                            <div class="card-body table-responsive">
                                {{-- <textarea class="form-control" rows="8">{{ $vacante->description }}</textarea> --}}
                                <h6 class="text-muted">{{ $vacante->description }}</h6>
                                <h6 class="text-muted">{{ $vacante->created_at->diffForHumans() }}</h6>
                            </div>
                            <div class="card-footer">
                                <button wire:click.prevent="show({{ $vacante->id }})" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createPreuser">Postularme</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('custom.message')
    @include('livewire.vacant.aspirante.create')
</div>
