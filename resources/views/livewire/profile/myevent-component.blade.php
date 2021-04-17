<div>
    <div class="card">
        <div class="card-header bg-secondary">
            <label class="card-title" for="title"><h4 class="text-uppercase">Lista de mis eventos</h4></label>
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#createEvent">Agregar Evento</button>
        </div>
        <div class="card-body">
            @foreach ($events as $event)
                @if ($event->users[0]->id == $user_id)
                    <div class="alert {{$event->color}} alert-dismissible fade show" role="alert" wire:click.prevent="edit({{ $event->id }})" data-toggle="modal" data-target="#updateEvent">
                        <div>
                            <h4 class="alert-heading {{$event->textColor}}">{{ $event->title }}</h4>
                        </div>
                        <div>
                            <p class="{{$event->textColor}}">{{ $event->description }}</p>
                            <hr>
                            <p class="{{$event->textColor}}" class="mb-0">{{ $event->start }} - {{ $event->end }}</p>
                            <p class="{{$event->textColor}}" class="mb-4">
                                @if ($event->status == 1)
                                    Activo
                                @else
                                    Inactivo
                                @endif
                            </p>
                        </div>
                    </div>
                    <hr>
                @endif
            @endforeach
        </div>
    </div>
    @include('custom.message')
    @include('livewire.profile.myevent.create')
    @include('livewire.profile.myevent.update')
</div>
