@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="d-flex align-items-center mb-4">
                <a href="{{ route('tasks.index') }}" class="btn btn-light rounded-circle shadow-sm me-3" style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-arrow-left fs-5"></i>
                </a>
                <h3 class="fw-bold mb-0 text-dark"><i class="bi bi-plus-circle-dotted text-primary me-2"></i>New Task</h3>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">

                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="task_name" class="form-label fw-bold text-muted small text-uppercase">Task Name</label>
                            <input type="text" class="form-control form-control-lg bg-light border-0 rounded-3" id="task_name" name="task_name" placeholder="e.g., Redesign landing page" required autofocus>
                        </div>

                        <div class="mb-4">
                            <label for="priority" class="form-label fw-bold text-muted small text-uppercase">Priority Level</label>
                            <select class="form-select form-select-lg bg-light border-0 rounded-3" id="priority" name="priority" required>
                                <option value="" disabled selected>Select priority...</option>
                                <option value="High" class="text-danger fw-medium">High Priority</option>
                                <option value="Medium" class="text-warning fw-medium">Medium Priority</option>
                                <option value="Low" class="text-success fw-medium">Low Priority</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="deadline" class="form-label fw-bold text-muted small text-uppercase">Deadline</label>
                            <input type="date" class="form-control form-control-lg bg-light border-0 rounded-3 text-secondary" id="deadline" name="deadline" required>
                        </div>

                        <div class="d-flex gap-3 pt-2 border-top">
                            <a href="{{ route('tasks.index') }}" class="btn btn-light btn-lg rounded-pill fw-medium flex-grow-1">Cancel</a>
                            <button type="submit" class="btn btn-dark btn-lg rounded-pill fw-medium flex-grow-1 shadow-sm"><i class="bi bi-check2 me-2"></i>Save Task</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
