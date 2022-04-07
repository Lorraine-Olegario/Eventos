@extends('./layouts/main')
@section('title', 'Deshboard')

@section('content')
    <div class="col-md-10 offset-md-1 deshboard-title-container">
        <h1>Meus Eventos dashboard</h1>
    </div>
    <!-- <div class="col-md-10 offset-md-1 deshboard-title-container">
        @if(count($events) > 0)
        @else
            <p>Você ainda não tem eventos, <a href="/events/create">Criar Eventos</a></p>
        @endif
    </div> -->
@endsection