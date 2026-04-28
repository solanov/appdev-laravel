@extends('layouts.master')

@section('content_here')

    <div class="row mt-5 justify-content-center">
        <div class="col-md-4">
            <h2 class="mb-4">Login</h2>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('login.submit') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="" class="form-label">User Name</label>
                            <input name="name" type="text"  value="{{ old('name') }}" class="form-control">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="" class="form-label">User Email</label>
                            <input name="email" type="text" value="{{ old('email') }}"class="form-control">
                        </div>

                        <div class="mb-2">
                            <label for="" class="form-label">User Password</label>
                            <input name="password" type="password" value="{{ old('password') }}" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>


                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
