<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Soft UI Dashboard by Creative Tim
  </title>
  <!-- Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ url('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ url('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ url('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <link href="{{ url('assets/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" >
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ url('assets/css/soft-ui-dashboard.css?v=1') }}" rel="stylesheet" />
  <!-- Alpine -->
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body class="g-sidenav-show  bg-gray-100">
 
  @include('admin.layouts.navbars.sidebar')
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.layouts.navbars.navbar')

    <section class="content">
        @yield('content')
      </section>
   
      @include('admin.layouts.footers.footer')

</body>
</html>