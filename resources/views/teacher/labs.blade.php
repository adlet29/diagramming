@extends('layouts.main')

@section('content')
    <h2>Виртуальные лабаратории</h2>
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th>N</th>
            <th>Предмет</th>
            <th>Наименование</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($list as $k => $value)
            <tr>
                <td>{{ $k + 1 }}</td>
                <td>{{ $subject }}</td>
                <td>{{ $value->name }}</td>
                <td class="text-center">
                    <a href="{{ url("teacher/labs/$value->id") }}" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
