@extends('layouts.main')

@section('content')
    <h2>{{ $laba->name }}</h2>
    <p>{{ $laba->description }}</p>
    <iframe width="900" height="500" src="{{ $laba->link }}" frameborder="0">
    </iframe>
@endsection
