<nav class="navbar-light navbar-sticky header-static border-bottom navbar-dashboard">
      <!-- Logo Nav START -->
      <nav class="navbar navbar-expand-xl">
            <div class="container">
                  <!-- Logo START -->
                  <a class="navbar-brand me-3" href="{{route('manuals.index')}}">
                        <img class="navbar-brand-item light-mode-item" src="{{asset('storage/images/logo.png')}}" alt="logo">
                  </a>
                  <!-- Logo END -->
                  @auth
                  <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="text-body h6 d-none d-sm-inline-block">منو</span>
                        <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav navbar-nav-scroll mx-auto">
                              @if ($role === 'author'|| $role==='admin')
                              <li class="nav-item"><a class="nav-link" href="{{route('brand.index')}}">مدیریت برند</a></li>
                              <li class="nav-item"><a class="nav-link" href="{{route('class.index')}}">مدیریت کلاس </a></li>
                              <li class="nav-item"><a class="nav-link" href="{{route('motormodel.index')}}">مدیریت مدل </a></li>
                              <li class="nav-item"><a class="nav-link" href="{{route('manuals.index')}}">مدیریت راهنما </a></li>
                              <li class="nav-item"><a class="nav-link" href="{{route('user.index')}}"><i class="bi bi-people me-1 fs-5"></i>مدیریت کاربران</a></li>
                              @endif
                              <a href="{{route('profile.edit')}}" class="nav-link">
                                    <li class="nav-item d-flex"><i class="bi bi-person fa-fw me-2"></i>پروفایل</li>
                              </a>
                        </ul>
                  </div>
                  @endauth

                  <div class="nav flex-nowrap align-items-center">
                        <div class="nav-item">
                              @auth
                              <form method="post" action="{{route('logout')}}">
                                    @csrf
                                    <li class="nav-item bg-light"><button type="submit" class="bg-danger border-0 text-white"><i class="fas fa-sign-out-alt"></i> خروج</button></li>
                              </form>
                              @endauth
                              @guest
                              <a href="{{route('login')}}" class="btn btn-success btn-sm">ورود</a>
                              <a href="{{route('register')}}" class="btn btn-outline-primary btn-sm">ثبت نام</a>
                              @endguest
                        </div>
                  </div>
            </div>
      </nav>
      <!-- Logo Nav END -->
</nav>

<div class="container">
      
      @if(session('success'))
      <div class="alert alert-success" role="alert">
            {{ session('success') }}
      </div>
      @endif

      @if(session('error'))
      <div class="alert alert-danger" role="alert">
            {{ session('error') }}
      </div>
      @endif
</div>