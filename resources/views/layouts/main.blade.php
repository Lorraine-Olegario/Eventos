<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- css -->
        <link rel="stylesheet" href="/css/style.css">
        <!-- JavaScript -->        
        <script src="/js/script.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>   
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/hdcevents_logo.png" alt="HDC Events">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="/" class="nav-link">Eventos</a></li>
                        <li class="nav-item"><a href="/events/create" class="nav-link">Crair Eventos</a></li>
                        @auth
                            <li class="nav-item"><a href="/dashboard" class="nav-link">Meus Eventos</a></li>
                            <li class="nav-item">
                                <form action="/logout" method="post">
                                    @csrf
                                    <a href="logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                                </form>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item"><a href="/login" class="nav-link">Entrar</a></li>
                            <li class="nav-item"><a href="/register" class="nav-link">Cadastar</a></li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>

        <main>
            <div class="container-fluid">
                <div class="row">
                    @if ( session ( 'msg' ))
                        <p class="msg"> {{ session('msg') }}</p>
                    @endif
                    @yield('content')
                </div>
            </div>            
        </main>
        <footer>
            <p>Todo Direitos Rservado &copy; Lorraine Olegário 2022</p>
        </footer>
    </body>
</html>