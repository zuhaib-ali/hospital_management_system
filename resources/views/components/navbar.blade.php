<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#" ><h2>HMS <i class='fas fa-hospital'></i></h2></a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
            </ul>
            
            @if(Auth::check())
                <a href="#">Logout</a>
            @else
                <a href="{{ route('login') }}"><i class='fas fa-sign-in-alt'> Login</i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{ route('signUp') }}"><i class='fas fa-user-plus'> Sign up</i></a>&nbsp;&nbsp;
            @endif
        </div>
    </div>
</nav>
