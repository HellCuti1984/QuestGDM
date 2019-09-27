@extends('template')
@section('index')
    <div class="profile">
        <div class="container">
            <nav>
                <a href="/">Главная страница</a>
                <a href="logout">Выход</a>
            </nav>
            <div class="my-profile">
                <div class="row">
                    <h1>Мой профиль</h1>
                    <div class="col-md-5">
                        <img class="img-responsive"
                             src="@if(Auth::user()->avatar == null){{ URL::asset('image/none.png') }}@else{{ asset('storage/'.Auth::user()->avatar) }}@endif"/>
                        <h2>Сменить аватар</h2>
                        <form action="{{ route('image_upload')  }}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="file" name="image" required>
                            <button class="btn btn-secondary btn-lg btn-block" type="submit">Загрузить</button>
                            @error('image')
                            <div class="alert alert-danger">
                                Аватар должен:
                                <ul>
                                    <li>Иметь формат: jpeg, png, bmp, gif, svg.</li>
                                    <li>Весить не больше 5Мб.</li>
                                </ul>
                            </div>
                            @enderror
                        </form>
                    </div>
                    <div class="col-md-7">
                        <div class="user-info">
                            <div class="info-element">
                                <span>Ваш ID</span>
                                <div>{{ Auth::user()->id }}</div>
                            </div>
                            <div class="info-element">
                                <span>ФИО</span>
                                <div>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }} {{ Auth::user()->patronomic }}</div>
                            </div>
                            <div class="info-element">
                                <span>Дата рождения</span>
                                <div>{{ Auth::user()->age }}</div>
                            </div>
                            <div class="info-element">
                                <span>Место учебы/работы</span>
                                <div>{{ Auth::user()->studywork }}</div>
                            </div>
                            <div class="info-element">
                                <span>E-mail</span>
                                <div>{{ Auth::user()->email }}</div>
                            </div>
                        </div>
                        <div class="my-position">
                            @if($points != null && $all_points != null)
                                <h1>Мои результаты за {{ $id_stage}} этап</h1>
                                <div class="position-info col-md-4">
                                    <div>0</div>
                                    <div>Место</div>
                                </div>
                                <div class="position-info col-md-4">
                                    <div>{{ $points }}</div>
                                    <div>Баллы за этап</div>
                                </div>
                                <div class="position-info col-md-4">
                                    <div>{{$all_points}}</div>
                                    <div>Общие баллы</div>
                                </div>
                            @else
                                <h2>Скоро здесь будут ваши результаты!</h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="profile-quest">
        <div class="container">
            @if(count($data)!=0)
                @foreach($data as $info)
                    <h1>Этап {{$id_stage}} - {{$info->title}}</h1>
                    <div class="row">
                        <div class="stage-info">
                            <div class="stage-description">
                                @if($info->full_description != null)
                                    {{print($info->full_description)}}
                                @else
                                    {{print($info->preview_description)}}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if($user_answer==null)
                            <form class="col-md-6" method="POST" action="{{route('file_upload')}}"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="file" name="file_quest" required>
                                <button class="btn btn-secondary btn-lg btn-block" type="submit">Загрузить свой ответ
                                </button>
                                @error('file_quest')
                                <div class="alert alert-success">
                                    Поддерживаемые расширения: .doc, .dot, .pdf.
                                </div>
                                @enderror
                            </form>
                        @else
                            <div class="alert-success col-md-6 user-file-uploaded">
                                <h3>Спасибо за ваш ответ!</h3>
                            </div>
                        @endif
                        <div class="col-md-6">
                            <a href="{{route('download_file')}}" class="btn btn-lg"
                               type="submit">Скачать Квест-файл</a>
                        </div>
                    </div>
                @endforeach
            @elseif(count($data)==0)
                <div class="no-quest">
                    <div class="col-md-3" style="margin: 0 auto;">
                        <img class="img-responsive" src="{{ URL::asset('image/warning.png') }}"/>
                    </div>
                    <div class="col-md-9">
                        <h2>Совсем скоро здесь появится новое задание!</h2>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script>
        function getTimeRemaining(endtime) {
            var t = Date.parse(endtime) - Date.parse(new Date());
            var seconds = Math.floor((t / 1000) % 60);
            var minutes = Math.floor((t / 1000 / 60) % 60);
            var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
            var days = Math.floor(t / (1000 * 60 * 60 * 24));
            return {
                'total': t,
                'days': days,
                'hours': hours,
                'minutes': minutes,
                'seconds': seconds
            };
        }

        function initializeClock(id, endtime) {
            var clock = document.getElementById(id);
            var daysSpan = clock.querySelector('.days');
            var hoursSpan = clock.querySelector('.hours');
            var minutesSpan = clock.querySelector('.minutes');
            var secondsSpan = clock.querySelector('.seconds');

            function updateClock() {
                var t = getTimeRemaining(endtime);

                daysSpan.innerHTML = t.days;
                hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
                minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
                secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

                if (t.total <= 0) {
                    clearInterval(timeinterval);
                }
            }

            updateClock();
            var timeinterval = setInterval(updateClock, 1000);
        }

        var deadline = new Date(Date.parse(new Date()) + 24 * 7 * 60 * 60 * 1000);
        initializeClock('clockdiv', deadline);
    </script>
@endsection
