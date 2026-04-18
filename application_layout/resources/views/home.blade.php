@extends('layouts.master')


@section('content_here')
<main role="main" class="container">
    <h1 class="mt-5 text-danger">Home</h1>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum pariatur ratione quaerat vero a, ullam reiciendis earum distinctio nihil exercitationem quidem neque odit aliquid quasi esse, repudiandae, adipisci non placeat.

    {{-- Using foreach loop --}}

    {{-- <div class="row mt-5">
        @foreach ($blogs as $blog)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h2>{{ $blog['title'] }}</h2>
                    <p>{{ $blog['body'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>--}}

    {{-- Using for loop --}}
    {{-- <div class="row mt-5">
        @for ($i = 0; $i < count($blogs); $i++)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h2>{{ $blogs[$i]['title'] }}</h2>
                    <p>{{ $blogs[$i]['body'] }}</p>
                </div>
            </div>
        </div>
        @endfor
    </div> --}}

    {{-- Conditional Rendering --}}
    <div class="row mt-5">
        @foreach ($blogs as $blog)
        @if ($blog['active']==1)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h2>{{ $blog['title'] }}</h2>
                    <p>{{ $blog['body'] }}</p>
                </div>
            </div>
        </div>
        @else
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h2>{{ $blog['title'] }}</h2>
                    <p>{{ $blog['body'] }}</p>
                    <div class="btn-sm btn-warning">Locked</div>
                </div>
            </div>
        </div>
        @endif

        @endforeach

        {{-- Useful blade directives --}}
        @php
            echo "This is a sample echo";
            $data = true;
            $i=2;
            $x='';
        @endphp

        @isset($data)
            {{-- <div class="alert alert-success">Success</div> --}}
        @endisset

        @switch($i)
            @case(1)
                {{-- <div class="alert alert-danger">Danger</div> --}}
                @break
            @case(2)
                <{{-- div class="alert alert-success">Success</div> --}}
                @break
            @default
                {{-- <div class="alert alert-warning">Warning</div> --}}
        @endswitch

        @empty($x)
            <div class="alert alert-success">Success</div>
        @endempty

    </div>
</main>
@endsection
