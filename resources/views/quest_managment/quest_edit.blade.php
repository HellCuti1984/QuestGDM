@extends('template')
@section('index')

    <nav>
        <div class="container">
            <a style="float: left;">{{ Auth::user()->name }}</a>
            <a href="/">Главная страница</a>
            <a href="/home">Кабинет</a>
        </div>
    </nav>

    <div class="make-quest">
        <form method="POST" action="{{route('update_quest')}}" enctype="multipart/form-data" class="container">
            @foreach($quests as $quest)
                <h1>Редактирование {{$quest->id}} этапа</h1>
                @csrf
                <div class="col-md-5">
                    <input name="id" style="display: none;" value="{{$quest->id}}"/>
                    <img class="img-responsive" src='{{asset('storage/'.$quest->icon)}}'/>
                    <div class="form-input">
                        <label>Иконка этапа</label>
                        <input type="file" name="icon" class="form-control"/>
                        @error('icon')
                        <div class="alert alert-danger">
                            Иконка должна:
                            <ul>
                                <li>Иметь формат: jpeg, png, bmp, gif, svg.</li>
                                <li>Весить не больше 5Мб.</li>
                            </ul>
                        </div>
                        @enderror
                    </div>
                    <div class="form-input">
                        <label>Квест-файл</label>
                        <input type="file" class="form-control" name="quest_file"/>
                        @error('quest_file')
                        <div class="alert alert-danger">
                            Квест-файл должен:
                            <ul>
                                <li>Иметь формат: doc, pdf, bmp, gif, svg.</li>
                                <li>Весить не больше 50Мб.</li>
                            </ul>
                        </div>
                        @enderror
                    </div>
                    <div class="form-input">
                        <label>Название этапа</label>
                        <input type="text" class="form-control" name="title" required value="{{$quest->title}}"/>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                    <strong>Неправильно введено название (см. пояснение)</strong>
                </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="make-quest-info">
                        <h1>Пояснение</h1>
                        <ul>
                            <li><strong>Иконка</strong> - используется на главной странице сайта;</li>
                            <li><strong>Квест-файл</strong> - задание для участников (документы docx, pdf, картинки);
                            </li>
                            <li><strong>Название</strong> - название этапа. Заполнение: Цифры, символы,
                                строчные/прописные
                                буквы;
                            </li>
                            <li><strong>Анонс</strong> - используется на главной странице сайта, а так же, если нет
                                полного
                                описания. Заполнение: любое;
                            </li>
                            <li><strong>Полное описание</strong> - полное описание квеста используется на странице
                                пользователя. Заполнение: любое;
                            </li>
                            <li><strong>Дата начала</strong> - указывается дата начала этапа;</li>
                            <li><strong>Дата конца</strong> - указывается дата конца этапа;</li>
                            <li><strong>Создать</strong> - сохранение этапа;</li>
                            <li><strong>Отмена</strong> - отмена действий.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-input">
                        <label>Анонс</label>
                        <textarea id="preview" class="form-control"
                                  name="preview_description">{{$quest->preview_description}}</textarea>

                        @error('preview_description')
                        <span class="invalid-feedback" role="alert">
                    <strong>Неправильно введен анонс (см. пояснение)</strong>
                </span>
                        @enderror
                    </div>

                    <div class="form-input">
                        <label>Полное описание</label>
                        <textarea id="full" class="form-control"
                                  name="full_description">{{$quest->full_description}}</textarea>

                        @error('full_description')
                        <span class="invalid-feedback" role="alert">
                    <strong>Неправильно введено описание (см. пояснение)</strong>
                </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <div class="form-input">
                            <label>Дата начала</label>
                            <input type="date" class="form-control" name="start_date" max="2020-01-01" min="2019-09-01"
                                   required value="{{$quest->start_date}}"/>

                            @error('start_date')
                            <span class="invalid-feedback" role="alert">
                    <strong>Неправильно введена дата (см. пояснение)</strong>
                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-input">
                            <label>Дата конца</label>
                            <input type="date" class="form-control" name="end_date" max="2020-01-01" min="2019-09-01"
                                   required value="{{$quest->end_date}}"/>

                            @error('end_date')
                            <span class="invalid-feedback" role="alert">
                    <strong>Неправильно введена дата (см. пояснение)</strong>
                </span>
                            @enderror
                        </div>
                    </div>
                    @endforeach
                    <div style="margin-left: 40px;">
                        <button type="submit" class="btn-success btn-lg">Создать</button>
                        <a href="/home" class="btn-danger btn-lg">Отмена</a>
                    </div>
                </div>
        </form>
    </div>


    <script>
        ClassicEditor
            .create(document.querySelector('#preview'), {
                language: 'ru'
            })
            .catch(error => {
                console.error(error);
            })

        ClassicEditor
            .create(document.querySelector('#full'), {
                language: 'ru'
            })
            .catch(error => {
                console.error(error);
            })
    </script>
@endsection
