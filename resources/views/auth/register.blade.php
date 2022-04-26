@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Регистрация') }}</div>

                <div class="card-body">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#active" role="tab" aria-controls="home" aria-selected="true">Для преподавателей</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#inactive" role="tab" aria-controls="profile" aria-selected="false">Для студентов</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="active" role="tabpanel" aria-labelledby="home-tab">
                            <br>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <input type="hidden" name="role" value="teacher">
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ФИО') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Факультет') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control" id="department" name="department" size="1" required="required">
                                            <option value="">Пожалуйста выберите Факультет</option>
                                            <option value="1">ФИЗИКО-ТЕХНИЧЕСКИЙ ФАКУЛЬТЕТ</option>
                                            <option value="2">ФАКУЛЬТЕТ ХИМИИ И ХИМИЧЕСКОЙ ТЕХНОЛОГИИ</option>
                                            <option value="3">ФАКУЛЬТЕТ БИОЛОГИИ И БИОТЕХНОЛОГИИ</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Дисциплина') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control" id="subject" name="subject" size="1" required="required">
                                            <option value="">Пожалуйста выберите Дисциплину</option>
                                            <option value="1">Физика</option>
                                            <option value="2">Химия</option>
                                            <option value="3">Биология</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Пароль') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Подтвердить пароль') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Создать') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="inactive" role="tabpanel" aria-labelledby="profile-tab">
                            <br>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <input type="hidden" name="role" value="student">
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ФИО') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Факультет') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control" id="department" name="department" size="1" required="required">
                                            <option value="">Пожалуйста выберите Факультет</option>
                                            <option value="1">ФИЗИКО-ТЕХНИЧЕСКИЙ ФАКУЛЬТЕТ</option>
                                            <option value="2">ФАКУЛЬТЕТ ХИМИИ И ХИМИЧЕСКОЙ ТЕХНОЛОГИИ</option>
                                            <option value="3">ФАКУЛЬТЕТ БИОЛОГИИ И БИОТЕХНОЛОГИИ</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Курс') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control" id="kurs" name="kurs" size="1" required="required">
                                            <option value="">Пожалуйста выберите Курс</option>
                                            <option value="1">1 Курс</option>
                                            <option value="2">2 Курс</option>
                                            <option value="3">3 Курс</option>
                                            <option value="4">4 Курс</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Группы') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control" id="group" name="group" size="1" required="required">
                                            <option value="">Пожалуйста выберите Группу</option>
                                            <option value="1">AUK-1</option>
                                            <option value="2">AUK-2</option>
                                            <option value="3">AUK-3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Пароль') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Подтвердить пароль') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Создать') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
