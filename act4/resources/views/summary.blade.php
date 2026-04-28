@extends('layouts.master')

@section('content_here')
    <div class="row mt-5 justify-content-center">
        <div class="col-md-6">
            <div class="alert alert-success text-center">
                <h4 class="mb-0">Registration successful! Displaying your submitted data.</h4>
            </div>

            <div class="card shadow-sm mt-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Student Summary</h5>
                    <small>Submitted on: {{ \Carbon\Carbon::now()->format('F j, Y, g:i a') }}</small>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th style="width: 35%;">First Name</th>
                                <td>{{ $data['first_name'] }}</td>
                            </tr>
                            <tr>
                                <th>Middle Initial</th>
                                <td>{{ $data['middle_initial'] ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td>{{ $data['last_name'] }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $data['email'] }}</td>
                            </tr>
                            <tr>
                                <th>Contact Number</th>
                                <td>{{ $data['contact_number'] }}</td>
                            </tr>
                            <tr>
                                <th>College</th>
                                <td>{{ $data['college'] }}</td>
                            </tr>
                            <tr>
                                <th>Program</th>
                                <td>{{ $data['program'] }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="text-center mt-4">
                        <a href="{{ route('register') }}" class="btn btn-outline-primary">Back to Registration</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
