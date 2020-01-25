<header>
    <nav class="navbar navbar-expand-lg  navbar-fixed">
        <a class="navbar-brand ml-2" href="#"><img src="./images/logo_raw.png" alt="logo" height="50px"
                                                   width="50px"> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><img src="{{asset('app/images/icons/ham.png')}}" alt="ham" height="20px"
                                                       width=40px"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                @auth
                    <li class="nav-item">
                        <a href="{{ url('/home') }}" class="nav-link">Dashboard</a>
                    </li>
                @else
                    <li class="nav-item mx-2">
                        <a href="{{ route('login') }}" class="nav-link btn btn-sm btn-outline-info">Login</a>
                    </li>

                    @if (Route::has('register'))
                        <li class="nav-item mx-2">
                            <a href="{{ route('register') }}" class="nav-link btn btn-sm btn-outline-primary">Register</a>
                        </li>
                    @endif
                @endauth
            </ul>

        </div>
    </nav>
</header>


<div class="hero mb-3">
    <form class="header-form " action="/search" method="GET">
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="inputState">Job Category</label>
                <select id="inputState" class="form-control" name="category_id">
                    <option selected>Choose...</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-5">
                <label for="inputCity">Job Title</label>
                <input type="text" class="form-control" id="inputCity" name="query">
            </div>

        </div>
        <button type="submit" class="btn btn-sm buttons">Search</button>
    </form>
</div>
