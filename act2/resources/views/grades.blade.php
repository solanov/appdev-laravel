@extends('layouts.app')


@section('content')
<main role="main" class="container">
    <h1 class="mt-5">Student List</h1>
    @foreach ($students as $student)
    <h2>- {{ $student['name'] }} - {{ $student['grade'] }}
        @if ($student['grade'] >= 75)
             (Passed)
        @else
            (Failed)
        @endif
    </h2>
    @endforeach
</main>
@endsection
