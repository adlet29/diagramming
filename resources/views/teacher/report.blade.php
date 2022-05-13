@extends('layouts.main')

@section('content')
    <h2>Отчет</h2>

    <div class="card-body">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>N</th>
                <th>ФИО Студента</th>
                <th>Лаба</th>
                <th>Оценка</th>
            </tr>
            </thead>
            <tbody>
            @foreach($report as $k => $value)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td>{{ $value['student_fio'] }}</td>
                        <td>{{ $value['laba_name'] }}</td>
                        <td>{{ $value['point'] }}</td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@endsection
