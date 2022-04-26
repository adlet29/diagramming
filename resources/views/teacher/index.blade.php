@extends('layouts.main')

@section('content')
    <h2>Мои Студенты</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ФИО</th>
            <th>Курс</th>
            <th>Группа</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->kurs }}</td>
                <td>{{ $student->group }}</td>
                <td>{{ $student->email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
