<?php

use Illuminate\Support\Str;

?>

@extends('layouts.gaming')

@section('content')


<div class="container black-container">

  
  <!-- SECTION-CATALOG -->
  <section class="gaming-catalog my-md-5">
    <div class="row">
      <div class="col-md-12 text-center">
        <h3 class="my-2">Каталог прохождений</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          @foreach($paginator as $game)
          <div class="col-md-6">
            <a href="{{ route('gaming.game', $game->id) }}">
              <div class="card bg-dark mb-3">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="{{ asset('storage/' . $game->cover) }}" class="card-img" alt="cover">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Прохождение {{ $game->name }}</h5>
                      <p class="card-text">
                        <?= Str::limit($game->info, 150); ?>
                      </p>
                      
                    </div>
                  </div>
                </div>
              </div> 
            </a>               
          </div>
          @endforeach      
        </div>
      </div>
    </div>
  </section>
  <!-- SECTION-CATALOG end -->

  <!-- SLIDER -->   
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('img/slider/slide_1.jpg') }}" class="d-block w-100" alt="...">
        <div class="carousel-caption mb-md-5">
          <h5>ПРОХОЖДЕНИЯ ВАШИХ ЛЮБИМЫХ ИГР И НЕ ТОЛЬКО...</h5>
          <p>Добро пожаловать на наш сайт! Здесь Вы найдете прохождения на Ваши любимые игры.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('img/slider/slide_4.jpg') }}" class="d-block w-100" alt="...">
        <div class="carousel-caption mb-md-5">
          <h5>ИНТЕРЕСНЫЕ ФАКТЫ О СОЗДАНИИ ВАШИХ ЛЮБИМЫХ ИГР...</h5>
          <p>Как разрабатывались и как выпускались шедевры!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('img/slider/slide_5.jpg') }}" class="d-block w-100" alt="...">
        <div class="carousel-caption mb-md-5">
          <h5>ОПИСАНИЕ ПРОХОЖДЕНИЙ ИГР ОЛДСКУЛ, ТАК И СВЕЖИХ...</h5>
          <p>Мы любим и ценим как игры старой школы, так и новой!</p>
        </div>
      </div>
      <!-- <div class="carousel-item">
        <img src="assets/img/slider/slide_2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        </div>
      </div> -->
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- SLIDER end -->

  <!-- LAST GAMINGS -->
  <section class="last-gaming">
    <div class="row">
      <div class="col-md-12 text-center">
        <h3 class="last-gaming__title">Последние прохождения</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 py-md-4 px-md-5">
        <div class="row justify-content-around">

          @foreach($latestGames as $game)
          <div class="last-gaming__card col-md-3 col-6">
            <a href="{{ route('gaming.game', $game->id) }}">
              <div class="last-gamings__image text-center p-4">
                <img src="{{ asset('storage/' . $game->cover) }}" alt="cover">
              </div>
              <div class="last-gaming__name text-center">
                <p>{{ $game->name }}</p>
              </div>
            </a>
          </div>
          @endforeach

        </div>
      </div>
    </div>
  </section>
  <!-- LAST GAMINGS end -->

  @endsection