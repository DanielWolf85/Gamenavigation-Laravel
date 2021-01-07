
@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        @include('gaming.admin.includes.messages')
        <div class="col-md-12 text-center">
            <h2 class="mt-4 mb-4">Редактирование игр</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <a href="{{ route('gaming.admin.games.create') }}">
                <button class="btn btn-success">Добавить новую игру</button>
            </a>
            <a href="{{ route('gaming.admin.chapters.create') }}">
                <button class="btn btn-success">Добавить новую главу</button>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-dark table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Изображение</th>
                        <th scope="col">Добавлено</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paginator as $game)

                    <tr>
                        <th scope="row">{{ $game->id }}</th>
                        <td>{{ $game->name }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $game->cover) }}" alt="game-cover">
                        </td>
                        <td>{{ $game->created_at ? \Carbon\Carbon::parse($game->created_at)->format('d.M H:i') : '' }}</td>
                        <td>
                            <a href="{{ route('gaming.admin.games.edit', $game->id) }}">
                                <button class="btn btn-primary">Редактировать</button>
                            </a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>

@endsection