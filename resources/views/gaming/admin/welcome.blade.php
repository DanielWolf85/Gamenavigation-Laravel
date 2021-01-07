@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 my-5 text-center">
            <h1>Добро пожаловать в админку!</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <a href="{{ url('admin/gaming/games') }}">
                <button class="btn btn-success">Перейти к редактированию игр</button>
            </a>
            <a href="{{ url('admin/gaming/chapters') }}">
                <button class="btn btn-success">Перейти к редактированию глав</button>
            </a>
        </div>
    </div>
</div>

@endsection