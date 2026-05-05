@extends('layouts.app')

@section('content')
<style>
    .task-card { transition: all 0.2s ease-in-out; border-radius: 12px; }
    .task-card:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important; }
    .nav-pills .nav-link { border-radius: 50px; padding: 8px 20px; font-weight: 500; color: #495057; margin-right: 5px; }
</style>

<div class="container-fluid py-2">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <h3 class="fw-bold mb-0 text-danger"><i class="bi bi-trash3 text-danger me-2"></i>Trash Bin</h3>
        <a href="{{ route('tasks.index') }}" class="btn btn-light rounded-pill fw-bold shadow-sm"><i class="bi bi-arrow-left me-2"></i>Back to Active</a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-3">
            <form action="{{ route('tasks.trash') }}" method="GET" class="d-flex flex-column flex-md-row gap-2 align-items-center">

                <div class="position-relative flex-grow-1 w-100" style="max-width: 400px;">
                    <i class="bi bi-search position-absolute text-muted" style="top: 50%; left: 15px; transform: translateY(-50%);"></i>
                    <input type="text" name="search" class="form-control bg-light border-0 ps-5 rounded-pill" placeholder="Search deleted tasks..." value="{{ request('search') }}">
                    @if(request('search'))
                        <a href="{{ route('tasks.trash', request()->except('search')) }}" class="position-absolute text-muted text-decoration-none fs-5" style="top: 50%; right: 15px; transform: translateY(-50%);">&times;</a>
                    @endif
                </div>

                <select name="sort_by" class="form-select bg-light border-0 w-auto rounded-pill" onchange="this.form.submit()">
                    <option value="">Sort by Deleted Date</option>
                    <option value="task_name" {{ request('sort_by') == 'task_name' ? 'selected' : '' }}>Name</option>
                </select>
            </form>
        </div>
    </div>

    <div class="row">
        @forelse($trashedTasks as $task)
        <div class="col-12 mb-3">
            <div class="card task-card border-0 shadow-sm bg-light" style="border-left: 5px solid #adb5bd !important;">
                <div class="card-body p-3 p-md-4 opacity-75">
                    <div class="d-flex justify-content-between align-items-center gap-3">

                        <div class="flex-grow-1">
                            <h5 class="fw-bold mb-2 text-muted text-decoration-line-through">{{ $task->task_name }}</h5>
                            <div class="d-flex flex-wrap align-items-center gap-3 text-muted small">
                                <span><i class="bi bi-clock-history me-1"></i> Deleted: {{ \Carbon\Carbon::parse($task->deleted_at)->format('M d, Y') }}</span>
                                <span class="badge bg-secondary-subtle text-secondary rounded-pill px-3">{{ $task->priority }} Priority</span>
                            </div>
                        </div>

                        <div class="dropdown">
                            <button class="btn btn-white bg-white border shadow-sm rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;" type="button" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 text-sm">
                                <li>
                                    <form action="{{ route('tasks.restore', $task->id) }}" method="POST" class="m-0">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="dropdown-item py-2 text-success fw-bold" onclick="return confirm('Restore this task to active status?')">
                                            <i class="bi bi-arrow-counterclockwise me-2"></i>Restore
                                        </button>
                                    </form>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('tasks.forceDelete', $task->id) }}" method="POST" class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item py-2 text-danger fw-bold" onclick="return confirm('PERMANENTLY delete this task? This cannot be undone.')">
                                            <i class="bi bi-x-octagon me-2"></i>Permanently Delete
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <div class="p-5 bg-white rounded-4 shadow-sm text-muted">
                <i class="bi bi-trash fs-1 mb-3 text-secondary opacity-25"></i>
                <h5 class="fw-bold text-dark">Trash is empty</h5>
                <p>No deleted items hanging around.</p>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
