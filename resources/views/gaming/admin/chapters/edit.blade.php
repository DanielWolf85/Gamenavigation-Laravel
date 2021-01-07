@extends('layouts.admin')

@section('content')

<div class="container">
    
    

    <!-- Если глава существует, то мы ее обновляем -->
    @if ($item->exists)
    <form action="{{ route('gaming.admin.chapters.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        
    <!-- Иначе сохраняем как новую --> 
    @else
    <form action="{{ route('gaming.admin.chapters.store') }}" method="POST" enctype="multipart/form-data">
            
    @endif

    @csrf
    
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-3">
                <div class="card-header">
                    @if ($item->is_published)
                        <p style="color: green">Глава опубликована</p>
                    @else
                        <p style="color: red">Глава в черновиках</p>
                    @endif
                </div>

              <!-- Инфоблок -->
              @include('gaming.admin.includes.messages')

              <div class="card-body">
                <div class="tab-pane active" id="maindata" role="tabpanel">
                    <div class="form-group">

                        <label for="title" class="form-label text-dark">Введите название главы</label>

                        <input type="text" 
                            value="{{ old('title', $item->title) }}"
                            id="title"
                            name="title"
                            class="form-control"
                            minlength="3"
                            required="required" 
                        >

                        <!-- <label for="game_id" class="form-label text-dark">Введите id игры</label>

                        <input type="text"
                            value="{{ old('game_id', $item->game_id) }}"
                            id="game_id"
                            name="game_id"
                            class="form-control"
                            required="required" 
                        > -->

                        <div class="form-group">
                            <label for="game_id">Прохождения для игры</label>
                            <select name="game_id"
                                id="game_id"
                                class="form-control"
                                placeholder="Выберите категорию"
                                required="required"
                            >
                            @foreach ($gameList as $gameOption)
                            <option value="{{ $gameOption->id }}" 
                                @if($gameOption->id == $item->game_id) selected @endif>
                                {{ $gameOption->name_combo_box }}
                            </option>
                            @endforeach
                            </select>
                        </div>

                        <label for="image_1" class="form-label text-dark">Первое изображение</label><br />

                        @if ($item->image_1)
                        <img class="form-edit-game-image img-thubnail my-3" src="{{ old('image_1', asset('storage/' . $item->image_1)) }}" alt="chapter_image">
                        @endif

                        <div class="my-3">
                            <label for="image_1" class="form-label text-dark">Загрузить новое изображение</label>

                            <input class="form-control"
                                type="file" 
                                id="image_1" 
                                name="image_1"
                                value="{{ old('image_1', $item->image_1) }}"
                            >
                            <!-- Отображение ошибок для изображения -->
                            <div>{{ $errors->first('image_1') }}</div>
                        </div>

                        


                        <div class="my-3">
                            <label for="content_1" class="form-label text-dark">
                                Введите первую часть прохождения
                            </label>

                            <textarea 
                                class="form-control"
                                id="content_1"
                                name="content_1"
                                rows="10"
                                cols="5" 
                            >{{ old('content_1', $item->content_1) }}</textarea>

                        </div>


                        <label for="image_2" class="form-label text-dark">Второе изображение</label><br />
                        @if ($item->image_2)
                        <img class="form-edit-game-image img-thubnail my-3" src="{{ old('image_2', asset('storage/' . $item->image_2)) }}" alt="chapter_image">
                        @endif

                        <div class="my-3">
                            <label for="image_2" class="form-label text-dark">Загрузить новое изображение</label>

                            <input class="form-control"
                                type="file" 
                                id="image_2" 
                                name="image_2"
                                
                            >
                            <!-- Отображение ошибок для изображения -->
                            <div>{{ $errors->first('image_2') }}</div>
                        </div>

                        


                        <div class="my-3">
                            <label for="content_2" class="form-label text-dark">
                                Введите вторую часть прохождения
                            </label>

                            <textarea 
                                class="form-control"
                                id="content_2"
                                name="content_2"
                                rows="10"
                                cols="5" 
                            >{{ old('content_2', $item->content_2) }}</textarea>

                        </div>


                        <label for="image_3" class="form-label text-dark">Третье изображение</label><br />

                        @if ($item->image_3)
                        <img class="form-edit-game-image img-thubnail my-3" src="{{ old('image_3', asset('storage/' . $item->image_3)) }}" alt="chapter_image">
                        @endif

                        <div class="my-3">
                            <label for="image_3" class="form-label text-dark">Загрузить новое изображение</label>

                            <input class="form-control"
                                type="file" 
                                id="image_3" 
                                name="image_3"
                                
                            >
                            <!-- Отображение ошибок для изображения -->
                            <div>{{ $errors->first('image_3') }}</div>
                        </div>

                        


                        <div class="my-3">
                            <label for="content_3" class="form-label text-dark">
                                Введите третью часть прохождения
                            </label>

                            <textarea 
                                class="form-control"
                                id="content_3"
                                name="content_3"
                                rows="10"
                                cols="5" 
                            >{{ old('content_3', $item->content_3) }}</textarea>

                        </div>


                        <label for="image_4" class="form-label text-dark">Четвертое изображение</label><br />
                        
                        @if ($item->image_4)
                        <img class="form-edit-game-image img-thubnail my-3" src="{{ old('image_4', asset('storage/' . $item->image_4)) }}" alt="chapter_image">
                        @endif

                        <div class="my-3">
                            <label for="image_4" class="form-label text-dark">Загрузить новое изображение</label>

                            <input class="form-control"
                                type="file" 
                                id="image_4" 
                                name="image_4"
                                
                            >
                            <!-- Отображение ошибок для изображения -->
                            <div>{{ $errors->first('image_4') }}</div>
                        </div>

                        


                        <div class="my-3">
                            <label for="content_4" class="form-label text-dark">
                                Введите четвертую часть прохождения
                            </label>

                            <textarea 
                                class="form-control"
                                id="content_4"
                                name="content_4"
                                rows="10"
                                cols="5" 
                            >{{ old('content_4', $item->content_4) }}</textarea>

                        </div>

                        
                        <div class="form-check">
                            <input type="hidden"
                                name="is_published"
                                value="0"
                            >
                            <!-- здесь если не указать value="0", то published_at
                            отправляться не будет, если не будет отмечен
                            -->
                            <input type="checkbox"
                                name="is_published"
                                class="form-check-input"
                                value="1"
                                @if ($item->is_published)
                                    checked="checked"
                                @endif 
                            >
                            <label for="is_published" class="form-check-label text-dark">
                                Опубликовано
                            </label>
                        </div>

                        <input type="submit" 
                            class="submit btn btn-primary my-5" 
                            value="Сохранить"
                        />
                    </div>
                </div>
            </div>
        </div>
       
    </div>

    </form>

    <!-- Удаление -->

    @if($item->exists)
    <form method="POST" action="{{ route('gaming.admin.chapters.destroy', $item->id) }}">
        @method('DELETE')
        @csrf
           
    <div class="card card-block bg-dark mt-3">
        <div class="card-body ml-auto">
            <button type="submit" class="btn btn-danger">
                Удалить главу
            </button>
        </div>
    </div>
           
    </form>
    @endif
     
</div>

@endsection