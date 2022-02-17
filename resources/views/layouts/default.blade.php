<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>SISFO Perpustakaan </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/css/soft-design-system.css') }}" rel="stylesheet" />
</head>

<body class="presentation-page">
  <!-- Navbar -->
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <nav class="navbar navbar-expand-lg  blur blur-rounded top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid px-0">
            <a class="navbar-brand font-weight-bolder ms-sm-3" href="https://demos.creative-tim.com/soft-ui-design-system/index.html" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
              SISFO Perpustakaan
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
              <ul class="navbar-nav navbar-nav-hover ms-lg-12 ps-lg-5 w-100">
                <li class="nav-item ms-lg-auto">
                  <a href="{{ route('login') }}" class="btn btn-sm  bg-gradient-primary  btn-round mb-0 me-2 mt-2 mt-md-0">Login</a>
                </li>
                <li class="nav-item my-auto ms-3 ms-lg-0">
                  <a href="{{ route('register') }}" class="btn btn-sm  bg-outline-danger  btn-round mb-0 me-1 mt-2 mt-md-0">REGISTER</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>

  @yield('content')

  
  <!-- -------   END PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->
  <footer class="footer pt-2 mt-2">
    <hr class="horizontal dark mb-2">
    <div class="container">
      <div class=" row">
        <div class="col-12">
          <div class="text-center">
            <h6 class="text-gradient text-primary font-weight-bolder">SISFO Perpustkaan</h6>
            <p class="my-2 text-sm">
              All rights reserved. Copyright © <script>
                document.write(new Date().getFullYear())
              </script> SISFO Perpustkaan by <a href="https://www.creative-tim.com" target="_blank">Rams</a>.
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="{{ asset('assets/js/soft-design-system.min.js')}}" type="text/javascript"></script>
</body>

</html>