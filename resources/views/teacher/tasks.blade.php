@extends('layouts.main')

@section('content')
    <h2>Регистрация задание</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModel">Создать</button>

    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#active" role="tab" aria-controls="home" aria-selected="true">Открытые</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#inactive" role="tab" aria-controls="profile" aria-selected="false">На проверке</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="active" role="tabpanel" aria-labelledby="home-tab">
                <table class="table table-striped table-dark">
                    <thead>
                    <tr>
                        <th>N</th>
                        <th>ФИО Студента</th>
                        <th>Лаба</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $k => $value)
                        @if($value->status == 'open')
                            <tr>
                                <td>{{ $k+1 }}</td>
                                <td>{{ $value->student_fio }}</td>
                                <td>{{ $value->laba_name }}</td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="inactive" role="tabpanel" aria-labelledby="profile-tab">
                <table class="table table-striped table-dark">
                    <thead>
                    <tr>
                        <th>N</th>
                        <th>ФИО Студента</th>
                        <th>Лаба</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $k => $value)
                        @if($value->status == 'done')
                            <tr>
                                <td>{{ $k+1 }}</td>
                                <td>{{ $value->student_fio }}</td>
                                <td>{{ $value->laba_name }}</td>
                                <td class="text-center">
                                    <a href="{{ url('teacher/task/'. $value->id . '/check/' . $value->parent_id ) }}" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="createModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Создать задачу</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('teacher/task/create') }}" >
                        @csrf

                        <div class="form-group">
                            <select name="laba_id" class="custom-select" required="required">
                                <option value="" selected>Выбрать лабараторию</option>
                                @foreach($labas as $laba)
                                    <option value="{{ $laba->id }}">{{ $laba->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="student_id" class="custom-select" required="required">
                                <option value="" selected>Кому дать лабараторию</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-date">
                            <label class="form-date-label" for="exampleCheck1">Дедлайн</label>
                            <input type="date" class="form-date-input" id="exampleCheck1" name="date" required="required">
                        </div>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
