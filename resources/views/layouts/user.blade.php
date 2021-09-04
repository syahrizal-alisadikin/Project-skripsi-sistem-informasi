<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>{{ $title ?? config('app.name') }} - User</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="{{url('style/main.css')}}" rel="stylesheet" />
  </head>

  <body>
    <nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
    >
      <div class="container">
        <a class="navbar-brand" href="/index.html">
          <div class="card bg-dark" style="width: 2rem; height: 2rem;">
          </div>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('home')}}"
                >Beranda <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Tutorial</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Jadwal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Perbaikan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!--- Content --->
    @yield('content')

    <footer class="mt-5">
      <div class="container">
        <div class="row mb-auto">
          <div class="col-12 text-center">
            <div class="pt-5 pb-5">
              <p><i>2021 Copyright Store Apache Surf</i></p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="{{url('/vendor/jquery/jquery.slim.min.js')}}"></script>
    <script src="{{url('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="{{url('script/navbar-scroll.js')}}"></script>
    @yield('addon-script')
  </body>
</html>
