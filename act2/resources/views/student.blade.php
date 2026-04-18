@extends('layouts.app')


@section('content')
<main role="main" class="container">
    <<h1 class="mt-5">Student Profile</h1>
    <h2>Name: {{ $name }}</h2>
    <h2>Age: {{ $age }}</h2>
    <h2>Course: {{ $course }}</h2>
</main>
@endsection
