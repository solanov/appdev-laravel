@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="d-flex align-items-center mb-4">
                <a href="{{ route('tasks.index') }}" class="btn btn-light rounded-circle shadow-sm me-3" style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-arrow-left fs-5"></i>
                </a>
                <h3 class="fw-bold mb-0 text-dark"><i class="bi bi-pencil-square text-success me-2"></i>Edit Task</h3>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">

                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="task_name" class="form-label fw-bold text-muted small text-uppercase">Task Name</label>
                            <input type="text" class="form-control form-control-lg bg-light border-0 rounded-3" id="task_name" name="task_name" value="{{ $task->task_name }}" required>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <label for="priority" class="form-label fw-bold text-muted small text-uppercase">Priority</label>
                                <select class="form-select form-select-lg bg-light border-0 rounded-3" id="priority" name="priority" required>
                                    <option value="High" class="text-danger fw-medium" {{ $task->priority == 'High' ? 'selected' : '' }}>High</option>
                                    <option value="Medium" class="text-warning fw-medium" {{ $task->priority == 'Medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="Low" class="text-success fw-medium" {{ $task->priority == 'Low' ? 'selected' : '' }}>Low</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="status" class="form-label fw-bold text-muted small text-uppercase">Status</label>
                                <select class="form-select form-select-lg bg-light border-0 rounded-3 fw-medium text-dark" id="status" name="status" required>
                                    <option value="to-do" {{ $task->status == 'to-do' ? 'selected' : '' }}>To Do</option>
                                    <option value="in-progress" {{ $task->status == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="submitted" {{ $task->status == 'submitted' ? 'selected' : '' }}>Submitted</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="deadline" class="form-label fw-bold text-muted small text-uppercase">Deadline</label>
                            <input type="date" class="form-control form-control-lg bg-light border-0 rounded-3 text-secondary" id="deadline" name="deadline" value="{{ $task->deadline }}" required>
                        </div>

                        <div class="d-flex gap-3 pt-2 border-top">
                            <a href="{{ route('tasks.index') }}" class="btn btn-light btn-lg rounded-pill fw-medium flex-grow-1">Cancel</a>
                            <button type="submit" class="btn btn-success btn-lg rounded-pill fw-bold flex-grow-1 shadow-sm"><i class="bi bi-arrow-repeat me-2"></i>Update Task</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
