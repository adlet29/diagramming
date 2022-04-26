@extends('layouts.main')

@section('content')
    <h2>Виртуальные лабаратории</h2>
{{--    <p></p>--}}
    <iframe width="1400" height="800" src="{{ url('sink/sink') }}" frameborder="0">
    </iframe>
@endsection
