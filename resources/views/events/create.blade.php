@extends('./layouts/main')
@section('title', 'EVENTO')

@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie o seu Evento</h1>
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf <!--@csrf driretiva para enviar form obrigatorio -->
            <div class="form-group">
                <label for="image"> Imagem Evento </label>
                <input type="file" class="form-control-file" id="image" name="image" required>
            </div>
            <div class="form-group">
                <label for="title"> Evento </label>
                <input type="text" class="form-control" id="title" name="title" placeholder=" Nome do Evento" required>
            </div>
            <div class="form-group">
                <label for="date"> Data Evento </label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="city"> Cidade </label>
                <input type="text" class="form-control" id="city" name="city" placeholder=" Local do Evento" required>
            </div>
            <div class="form-group">
                <label for="private"> O evento é privado </label>
                <select name="private" id="private" class="form-control" required>
                    <option value="0"> Não </option>
                    <option value="1"> Sim </option>
                </select>
            </div>
            <div class="form-group">
                <label for="description"> Descrição </label>
                <textarea name="description" id="description" cols="30" rows="8" class="form-control" placeholder=" Descrição Evento..." required></textarea>
            </div>
            <div class="form-group">
                <label for="description"> Adicione Infraistrutura: </label>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" value="Cadeiras"> Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" value="Palco"> Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" value="Open Food"> Open Food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="itens[]" value="Brinds"> Brinds
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value=" Criar Evento">
        </form>
    </div>
@endsection