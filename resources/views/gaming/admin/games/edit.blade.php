@extends('layouts.admin')

@section('content')

<div class="container">
    
    

    <!-- Если игра существует, то мы ее обновляем -->
    @if ($item->exists)
    <form action="{{ route('gaming.admin.games.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        
    <!-- Иначе сохраняем как новую --> 
    @else
    <form action="{{ route('gaming.admin.games.store') }}" method="POST" enctype="multipart/form-data">
            
    @endif

    @csrf
    
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-3">
              <div class="card-header">
                  @if ($item->is_published)
                    <p style="color: green">Игра опубликована</p>
                  @else
                    <p style="color: red">Игра в черновиках</p>
                  @endif
              </div>

              <!-- Инфоблок -->
              @include('gaming.admin.includes.messages')

              <div class="card-body">
                <div class="tab-pane active" id="maindata" role="tabpanel">
                    <div class="form-group">

                        <label for="name" class="form-label text-dark">Название</label>

                        <input type="text" 
                            value="{{ old('name', $item->name) }}"
                            id="name"
                            name="name"
                            class="form-control"
                            minlength="3"
                            required="required" 
                        >

                        <!-- <label for="cover">Изображение</label> -->
                        @if ($item->cover)
                        <img class="form-edit-game-image img-thubnail my-3" src="{{ old('cover', asset('storage/' . $item->cover)) }}" alt="cover">
                        @endif

                        <div class="my-3">
                            <label for="cover" class="form-label text-dark">Загрузить новое изображение</label>

                            <input class="form-control"
                                type="file" 
                                id="cover" 
                                name="cover"
                                
                            >
                            <!-- Отображение ошибок для изображения -->
                            <div>{{ $errors->first('cover') }}</div>
                        </div>

                        <div class="my-3">
                            <label for="info" class="form-label text-dark">
                                Добавить информацию об игре
                            </label>

                            <textarea 
                                class="form-control"
                                id="info"
                                name="info"
                                rows="10"
                                cols="5" 
                            >{{ old('info', $item->info) }}</textarea>

                        </div>


                        <div class="my-3">
                            <label for="creator" class="form-label text-dark">
                                Добавить разрабочика игры
                            </label>

                            <input type="text"
                                class="form-control"
                                value="{{ old('creator', $item->creator) }}"
                                id="creator"
                                name="creator" 
                            >
                        </div>

                        <div class="my-3">
                            <label for="label" class="form-label text-dark">
                                Укажите издателя игры
                            </label>

                            <input type="text"
                                class="form-control"
                                value="{{ old('label', $item->label) }}"
                                id="label"
                                name="label" 
                            >
                        </div>

                        <div class="my-3">
                            <label for="platforms" class="form-label text-dark">
                                На каких платформах доступна игра
                            </label>

                            <input type="text"
                                class="form-control"
                                value="{{ old('platforms', $item->platforms) }}"
                                id="platforms"
                                name="platforms" 
                            >
                        </div>


                        <div class="my-3">
                            <label for="realise" class="form-label text-dark">
                                Когда игра была издана
                            </label>

                            <input type="text"
                                class="form-control"
                                value="{{ old('realise', $item->realise) }}"
                                id="realise"
                                name="realise" 
                            >
                        </div>

                        <div class="my-3">
                            <label for="genre" class="form-label text-dark">
                                Укажите жанр игры
                            </label>

                            <input type="text"
                                class="form-control"
                                value="{{ old('genre', $item->genre) }}"
                                id="genre"
                                name="genre" 
                            >
                        </div>

                        <div class="my-3">
                            <label for="model" class="form-label text-dark">
                                Укажите модель игры (одиночная, мультиплеер)
                            </label>

                            <input type="text"
                                class="form-control"
                                value="{{ old('model', $item->model) }}"
                                id="model"
                                name="model" 
                            >
                        </div>

                        <div class="my-3">
                            <label for="age_limit" class="form-label text-dark">
                                Возрастное ограничение
                            </label>

                            <input type="text"
                                class="form-control"
                                value="{{ old('age_limit', $item->age_limit) }}"
                                id="age_limit"
                                name="age_limit" 
                            >
                        </div>

                        <div class="my-3">
                            <label for="processor_min" class="form-label text-dark">
                                Введите минимальное значение для процессора этой игры
                            </label>

                            <input type="text"
                                class="form-control"
                                value="{{ old('processor_min', $item->processor_min) }}"
                                id="processor_min"
                                name="processor_min" 
                            >
                        </div>

                        <div class="my-3">
                            <label for="processor_max" class="form-label text-dark">
                                Введите оптимальное значение процессора для этой игры
                            </label>

                            <input type="text"
                                class="form-control"
                                value="{{ old('processor_max', $item->processor_max) }}"
                                id="processor_max"
                                name="processor_max" 
                            >
                        </div>

                        <div class="my-3">
                            <label for="ram_min" class="form-label text-dark">
                                Введите минимальную опративную память для этой игры
                            </label>

                            <input type="text"
                                class="form-control"
                                value="{{ old('ram_min', $item->ram_min) }}"
                                id="ram_min"
                                name="ram_min" 
                            >
                        </div>

                        <div class="my-3">
                            <label for="ram_max" class="form-label text-dark">
                                Введите оптимальную оперативную память для этой игры
                            </label>

                            <input type="text"
                                class="form-control"
                                value="{{ old('ram_max', $item->ram_max) }}"
                                id="ram_max"
                                name="ram_max" 
                            >
                        </div>

                        <div class="my-3">
                            <label for="video_card_min" class="form-label text-dark">
                                Введите минимальную видеокарту для этой игры
                            </label>

                            <input type="text"
                                class="form-control"
                                value="{{ old('video_card_min', $item->video_card_min) }}"
                                id="video_card_min"
                                name="video_card_min" 
                            >
                        </div>

                        <div class="my-3">
                            <label for="video_card_max" class="form-label text-dark">
                                Введите оптимальную видеокарту для этой игры
                            </label>

                            <input type="text"
                                class="form-control"
                                value="{{ old('video_card_max', $item->video_card_max) }}"
                                id="video_card_max"
                                name="video_card_max" 
                            >
                        </div>

                        <div class="my-3">
                            <label for="hdd_space_min" class="form-label text-dark">
                                Введите минимальное место на диске для игры
                            </label>

                            <input type="text"
                                class="form-control"
                                value="{{ old('hdd_space_min', $item->hdd_space_min) }}"
                                id="hdd_space_min"
                                name="hdd_space_min" 
                            >
                        </div>

                        <div class="my-3">
                            <label for="hdd_space_max" class="form-label text-dark">
                                Введите рекомендуемое место на диске для игры
                            </label>

                            <input type="text"
                                class="form-control"
                                value="{{ old('hdd_space_max', $item->hdd_space_max) }}"
                                id="hdd_space_max"
                                name="hdd_space_max" 
                            >
                        </div>

                        <div class="my-3">
                            <label for="os_min" class="form-label text-dark">
                                Введите минимальную систему для этой игры
                            </label>

                            <input type="text"
                                class="form-control"
                                value="{{ old('os_min', $item->os_min) }}"
                                id="os_min"
                                name="os_min" 
                            >
                        </div>

                        <div class="my-3">
                            <label for="os_max" class="form-label text-dark">
                                Введите оптимальную систему для этой игры
                            </label>

                            <input type="text"
                                class="form-control"
                                value="{{ old('os_max', $item->os_max) }}"
                                id="os_max"
                                name="os_max" 
                            >
                        </div>



                        <div class="my-3">
                            <label for="facts" class="form-label text-dark">
                                Добавьте интересные факты об игре и ее разработке
                            </label>

                            <textarea 
                                class="form-control"
                                id="facts"
                                name="facts"
                                rows="10"
                                cols="5" 
                            >{{ old('facts', $item->facts) }}</textarea>

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
    <form method="POST" action="{{ route('gaming.admin.games.destroy', $item->id) }}">
        @method('DELETE')
        @csrf
        
           
    <div class="card card-block bg-dark mt-3">
        <div class="card-body ml-auto">
            <button type="submit" class="btn btn-danger">
                Удалить иру
            </button>
        </div>
    </div>
           
    </form>
    @endif
    
</div>

@endsection