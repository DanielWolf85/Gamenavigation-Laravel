@extends('layouts.gaming')

@section('content')

<div>

  <!-- TITLE -->
  <div class="title text-center">
    <div class="row">
      <div class="col-12">
        <h1>Информация о {{ $game->name }}</h1>
    </div>
</div>
</div>
<!-- TITLE end -->

<div class="container">
    <div class="row">

      <!-- CONTENT -->
      <section class="col-md-9 content order-md-1">

        <div class="tab-content">

          <!-- INFO -->
          <div class="tab-pane fade show active">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-4 content__game-cover">
                  <img src="{{ asset('storage/' . $game->cover) }}" alt="cover">
              </div>
              <div class="col-md-8 content__game-info">

                  <div class="paragraph-info">
                    <strong>Разработчик:</strong><br />               
                    <p>{{ $game->creator }}</p>

                    <strong>Издатель:</strong>                  
                    <p>{{ $game->label }}</p>

                    <strong>Платформы:</strong>                   
                    <p>{{ $game->platforms }}</p>

                    <strong>Релиз:</strong>
                    <p>{{ $game->realise }}</p>

                    <strong>Жанр:</strong>
                    <p>{{ $game->genre }}</p>

                    <strong>Модель игры:</strong>
                    <p>{{ $game->model }}</p>

                    <strong>Рейтинг:</strong>
                    <p>{{ $game->age_limit }}</p>    
                </div>

            </div>
        </div>
    </div>
    <div class="content__about mt-5">
      <h3 class="text-center">Об игре:</h3>
      <div class="paragraph">
        <p>{!! $game->info !!}</p>
    </div>
</div>
<div class="content__system mt-5">
  <h3 class="text-center">Системные требования</h3>
  <div class="paragraph-info">
    <div class="table-responsive">
      <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">Характеристика</th>
            <th scope="col">Минимальные требования</th>
            <th scope="col">Рекомендуемые требования</th>

        </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">Процессор</th>
        <td>{{ $game->processor_min }}</td>
        <td>{{ $game->processor_max }}</td>                     
    </tr>
    <tr>
        <th scope="row">Оперативная память</th>
        <td>{{ $game->ram_min }}</td>
        <td>{{ $game->ram_max }}</td>                       
    </tr>
    <tr>
        <th scope="row">Видеокарта</th>
        <td>{{ $game->video_card_min }}</td>
        <td>{{ $game->video_card_max }}</td>
    </tr>
    <tr>
        <th scope="row">Место на диске</th>
        <td>{{ $game->hdd_space_min }}</td>
        <td>{{ $game->hdd_space_max }}</td>           
    </tr>
    <tr>
        <th scope="row">Операционная система</th>
        <td>{{ $game->os_min }}</td>
        <td>{{ $game->os_max }}</td>                     
    </tr>
</tbody>
</table>
</div>
</div>
</div>
<div class="content__facts mt-5">
  <h3 class="text-center">Интересные факты о {{ $game->name }}</h3>
  <div class="paragraph">
    <p>{!! $game->facts !!}</p>
</div>
</div>
</div>
<!-- INFO end -->
</div>
</section>
<!-- CONTENT end -->


<!-- SIDEBAR -->

<section class="col-md-3 sidebar order-md-2">
  <!-- content-navigation -->
    <div class="nav flex-column">
        <a class="nav-link" href="{{ route('gaming.game', $game->id) }}">
            Информация
        </a>
        <br />
        <h5>Главы</h5>
        <br />


        @foreach($chapters as $chapter)

        <a class="nav-link" href="{{ route('gaming.game.chapter', [$game->id, $chapter->id]) }}">
            {{ $chapter->title }}
        </a> 

        @endforeach

    </div>
<!-- content-navigation end -->
</section>


<!-- SIDEBAR end -->

</div>
</div>
</div>

@endsection