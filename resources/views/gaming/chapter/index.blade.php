@extends('layouts.gaming')

@section('content')

<div>

  <!-- TITLE -->
  <div class="title text-center">
    <div class="row">
      <div class="col-12">
        <h1>Прохождение {{ $game->name }}</h1>
    </div>
</div>
</div>
<!-- TITLE end -->


<div class="container">
    <div class="row">

      <!-- SIDEBAR -->

      <section class="col-md-3 sidebar order-md-2">
          <!-- content-navigation -->
          <div class="nav flex-column">
            <a class="nav-link" href="{{ route('gaming.game', $chapter->game_id) }}">
                Информация
            </a>
            <br />
            <h5>Главы</h5>
            <br />

            @foreach($chapters as $act)

            <a class="nav-link" href="{{ route('gaming.game.chapter', [$act->game_id, $act->id]) }}">
                {{ $act->title }}
            </a> 

            @endforeach

        </div>
        <!-- content-navigation end -->
    </section>

    <!-- SIDEBAR end -->


    <!-- CONTENT -->     
    <section class="col-md-9 content order-md-1">

        <div class="tab-content" id="v-pills-tabContent">

          <!-- CHAPTER -->
            <div>
                <h2 class="text-center">{{ $chapter->title }}</h2>

                @if($chapter->image_1)
                <div class="row">
                    <div class="col-md-8 offset-md-2 text-center chapter-image">
                        <img src="{{ asset('storage/' . $chapter->image_1) }}" alt="chapter_image">
                    </div>
                </div>
                @endif

                @if($chapter->content_1)
                <div class="paragraph">
                    <p>{!! $chapter->content_1 !!}</p>
                </div>
                @endif

                @if($chapter->image_2)
                <div class="row">
                    <div class="col-md-8 offset-md-2 text-center chapter-image">
                        <img src="{{ asset('storage/' . $chapter->image_2) }}" alt="chapter_image">
                    </div>
                </div>
                @endif

                @if($chapter->content_2)
                <div class="paragraph">
                    <p>{!! $chapter->content_2 !!}</p>
                </div>
                @endif

                @if($chapter->image_3)
                <div class="row">                  
                    <div class="col-md-8 offset-md-2 text-center chapter-image">
                        <img src="{{ asset('storage/' . $chapter->image_3) }}" alt="chapter_image">
                    </div>
                </div>
                @endif

                @if($chapter->content_3)
                <div class="paragraph">
                    <p>{!! $chapter->content_3 !!}</p>
                </div>
                @endif

                @if($chapter->image_4)
                <div class="row">
                    <div class="col-md-8 offset-md-2 text-center chapter-image">
                        <img src="{{ asset('storage/' . $chapter->image_4) }}" alt="chapter_image">
                    </div>
                </div>
                @endif

                @if($chapter->content_4)
                <div class="paragraph">
                    <p>{!! $chapter->content_4 !!}</p>
                </div>
                @endif

            </div>

        <!-- CHAPTER end -->

        </div>
    </section>

    <!-- CONTENT end -->


</div>
</div>

</div>

@endsection