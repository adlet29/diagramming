@extends('layouts.main')

@section('content')
    <h2>{{ $name }}</h2>
    <p>{{ $description }}</p>
    @php
        if (!isset($id)) {
            $id = 0;
        }
    @endphp
    <iframe width="1400" height="800" src="{{ url('sink/' . $id) }}" frameborder="0">
    </iframe>
@endsection
