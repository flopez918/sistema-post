 <!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#!">Sistema Post</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ url('home')}}">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('add')}}">Nuevo Post</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    {{ method_field('POST') }}
                    <input class="btn btn-danger" type="submit" value="Salir">
                </form>
            </ul>
        </div>
    </div>
</nav>