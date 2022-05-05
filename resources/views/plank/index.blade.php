@extends('layouts.main')

@section('content')
    <h2>Виртуальная сцена</h2>
{{--    <p></p>--}}
    @include('plank.main', ['graph' => $graph])
@endsection
