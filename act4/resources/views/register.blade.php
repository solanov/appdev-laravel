@extends('layouts.master')

@section('content_here')
    <div class="row mt-5 justify-content-center mb-5">
        <div class="col-md-6">
            <h2 class="mb-4 text-center">Student Registration</h2>

            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('register.submit') }}" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-5">
                                <label class="form-label">First Name <span class="text-danger">*</span></label>
                                <input name="first_name" type="text" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror">
                                @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">M.I.</label>
                                <input name="middle_initial" type="text" value="{{ old('middle_initial') }}" class="form-control @error('middle_initial') is-invalid @enderror" maxlength="1">
                                @error('middle_initial') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-5">
                                <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                <input name="last_name" type="text" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror">
                                @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address <span class="text-danger">*</span></label>
                            <input name="email" type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contact Number <span class="text-danger">*</span></label>
                            <input name="contact_number" type="text" value="{{ old('contact_number') }}" class="form-control @error('contact_number') is-invalid @enderror" placeholder="09XXXXXXXXX">
                            @error('contact_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">College <span class="text-danger">*</span></label>
                                <input name="college" type="text" value="{{ old('college') }}" class="form-control @error('college') is-invalid @enderror">
                                @error('college') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Program <span class="text-danger">*</span></label>
                                <input name="program" type="text" value="{{ old('program') }}" class="form-control @error('program') is-invalid @enderror">
                                @error('program') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Password <span class="text-danger">*</span></label>
                                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-primary">Submit Registration</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
