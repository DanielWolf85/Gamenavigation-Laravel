
@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        @include('gaming.admin.includes.messages')
        <div class="col-md-12 text-center">
            <h2 class="mt-4 mb-4">Редактирование глав прохождений игр</h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12 text-center">

            <form method="GET" action="#" class="form-inline my-2 my-lg-0">
                <div class="form-group">
                    <!-- <label for="game_id">Фильтровать по игре</label> -->
                    <select name="game_id"
                        id="game_id"
                        class="form-control"
                        placeholder="Выберите игру"
                        required="required"
                    >
                    @foreach ($gameList as $gameOption)

                    <option value="{{ $gameOption->id }}">
                        {{ $gameOption->name_combo_box }}
                    </option>
                    @endforeach
                    </select>
                </div>
                <button class="btn btn-outline-success my-2 my-sm-0 ml-2" type="submit">Фильтр</button>
            </form>

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
                    @foreach($paginator as $chapter)

                    <tr>
                        <th scope="row">{{ $chapter->id }}</th>
                        <td>{{ $chapter->title }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $chapter->image_1) }}" alt="chapter_image">
                        </td>
                        <td>{{ $chapter->created_at ? \Carbon\Carbon::parse($chapter->created_at)->format('d.M H:i') : '' }}</td>
                        <td>
                            <a href="{{ route('gaming.admin.chapters.edit', $chapter->id) }}">
                                <button class="btn btn-primary">Редактировать главу</button>
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