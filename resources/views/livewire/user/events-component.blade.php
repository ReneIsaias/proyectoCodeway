<div>
    @foreach ($events as $event)
        @if (($fecha == $event->start) || ($fecha == $event->end))
            <div class="alert {{$event->color}} alert-dismissible fade show" role="alert">
                <div>
                    <h4 class="alert-heading {{$event->textColor}}">{{ $event->title }}</h4>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div>
                    <p class="{{$event->textColor}}">{{ $event->description }}</p>
                    <hr>
                    <div class="row">
                        <div class="col-10">
                            <p class="{{$event->textColor}}" class="mb-0">{{ $event->start }} - {{ $event->end }}</p>
                        </div>
                        <div class="col-2">
                            <p class="{{$event->textColor}}" class="mb-0">
                                @isset($event->users[0]->name)
                                    {{ $event->users[0]->name }}
                                @endisset
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>
