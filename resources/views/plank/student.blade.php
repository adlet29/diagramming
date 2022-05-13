@extends('layouts.main')

@section('content')
    <h2>{{ $name }}</h2>
    <p>{{ $description }}</p>
    @php
        if (!isset($task_id)) {
            $task_id = 0;
        }
    @endphp
    @include('plank.main_v2', ['graph' => $graph, 'task_id' => $task_id]);
@endsection
