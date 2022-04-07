@extends('./layouts/main')
@section('title', 'Deshboard')

@section('content')
    <div class="col-md-10 offset-md-1 deshboard-title-container">
        <h1>Meus Eventos</h1>
    </div>
    <div class="col-md-10 offset-md-1 deshboard-title-container">
        @if(count($events) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
            </table>
            <tbody>
                @foreach
                    <tr>
                        <td scropt="row"> {{ $loop->index + 1 }} </td>
                        <td><a href="/event/{{ $event->id }}">{{ $event->title }}</a></td>
                        <td>0</td>
                        <td><a href="#">Editar</a> <a href="#">Deletar</a></td>
                    </tr>
                @endforeach
            </tbody>
        @else
            <p>Você ainda não tem eventos, <a href="/events/create">Criar Eventos</a></p>
        @endif
    </div>
@endsection