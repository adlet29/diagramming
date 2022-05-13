@extends('layouts.main')

@section('content')
    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#createModel">Назначить баллы</button>
    <hr>
    <h2>{{ $name }}</h2>
    <p>{{ $description }}</p>
    @php
        if (!isset($id)) {
            $id = 0;
        }
    @endphp
    <iframe width="1400" height="800" src="{{ url('sink/' . $id) }}" frameborder="0">
    </iframe>


    <div class="modal fade" id="createModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Назначить баллы</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('teacher/task/point') }}" >
                        @csrf

                        <input type="hidden" id="task_id" name="task_id" value="{{ $task_id }}">
                        <div class="form-group">
                            <select name="point" class="custom-select" size="13" required="required">
                                <option value="" selected>Выберите оценку</option>
                                <option value="10">10%</option>
                                <option value="20">20%</option>
                                <option value="30">30%</option>
                                <option value="40">40%</option>
                                <option value="50">50%</option>
                                <option value="60">60%</option>
                                <option value="70">70%</option>
                                <option value="80">80%</option>
                                <option value="85">85%</option>
                                <option value="90">90%</option>
                                <option value="95">95%</option>
                                <option value="100">100%</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
