<nav class='col-sm-3 sidebar py-3'>
    <div>
        <center>
            <img src="{{ asset('profile_image.jpg') }}" alt="proifle" width='180' height='180' style='border-radius:50%'><br>
            <p>
                @if(Session::has('user'))
                    {{ Session::get('user.name')}}
                @endif
            
            </p>
        </center>
        
    </div>
    <ul class="nav d-block">
        <li class="nav-item"><a href="" class="nav-link"><i class="fas fa-users"></i> &nbsp; Link</a></li>
        <li class="nav-item"><a href="" class="nav-link"><i class="fas fa-users"></i> &nbsp; Link</a></li>
        <li class="nav-item"><a href="" class="nav-link"><i class="fas fa-users"></i> &nbsp; Link</a></li>
        <li class="nav-item"><a href="" class="nav-link"><i class="fas fa-users"></i> &nbsp; Link</a></li>
        <li class="nav-item"><a href="" class="nav-link"><i class="fas fa-users"></i> &nbsp; Link</a></li>
        <li class="nav-item"><a href="" class="nav-link"><i class="fas fa-users"></i> &nbsp; Link</a></li>
        <li class="nav-item"><a href="" class="nav-link"><i class="fas fa-users"></i> &nbsp; Link</a></li>
        <li class="nav-item"><a href="" class="nav-link"><i class="fas fa-users"></i> &nbsp; Link</a></li>
        <li class="nav-item"><a href="" class="nav-link"><i class="fas fa-users"></i> &nbsp; Link</a></li>
    </ul>
</nav>