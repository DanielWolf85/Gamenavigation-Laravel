<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Gamenavigation') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700&amp;subset=cyrillic">

  <!-- Font awesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <!-- Normalize Css -->
  <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

  <!-- HEADER -->
  <header class="main-header">
    <nav class="navbar navbar-expand-lg">
      <div class="logo">
        <img src="{{ asset('img/logo.png') }}" alt="logo">
      </div>
      <a class="navbar-brand ml-3" href="{{ route('site.index') }}">GAMENAVIGATION.RU</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('site.index') }}">Главная <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('gaming.catalog') }}">Прохождения </a>
          </li>
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li> -->

        </ul>
        <form method="GET" action="{{ route('site.search') }}" class="form-inline my-2 my-lg-0">

          <input class="form-control mr-sm-2"
            id="search"
            name="search" 
            type="search" placeholder="Search"
            aria-label="Search"
          >

          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
  </header>
  <!-- HEADER end -->
  
  
  @yield('content')
  
  
  <!-- FOOTER -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12 justify-content-center">
          <ul class="nav">
            <li class="nav-item">
              <span class="nav-link">&copy;2022 Сайт разработан Вовк Даниилом Петровичем</span>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link">Политика конфиденциальности</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Terms of Use</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link">Карта сайта</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- FOOTER end -->

</body>
</html>

