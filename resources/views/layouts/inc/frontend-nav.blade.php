<div class="global-navbar bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-2 d-none d-sm-none d-md-inline img-mr">
                <img src="{{asset('assets/image/logo.jpg')}}" class="w-100" alt="logo">
            </div>
            <div class="col-md-9 my-auto">
                <div class="border text-center p-2">
                adverties here
                </div>
            </div>
        </div>

    </div>
    </div>

    <div class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-blue">
            <div class="container">
            
                <a href="" class="navbar-brand d-inline d-sm-inline d-md-none">
                    @php
                        $settings=App\Models\Settings::find(1);
                    @endphp
                    <img src="{{asset('uploads/settings/'.$settings->logo)}}" style="width:140px" alt="logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link"  href="{{url('/')}}">Home</a>
                    </li>
                    
                    
                    @php
                        $categories=App\Models\Category::where('navbar_status','0')->where('status','0')->get();
                    @endphp
                    @foreach($categories as $items)
                        <li class="nav-item">
                        <a class="nav-link" href="{{url('tutorial/'.$items->slug)}}">{{$items->name}}</a>
                        </li>
                    @endforeach
                    @if(Auth::check())
                    <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                            </a>
                        <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </li>
                    @endif
                    
                </ul>
            
                </div>
            </div>
        </nav>
    </div>
