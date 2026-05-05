@extends('layouts.app')

@section('content')
<style>
    /* Modern UI custom tweaks */
    .task-card { transition: all 0.2s ease-in-out; border-radius: 12px; }
    .task-card:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important; }
    .task-card { z-index: 1; position: relative; }
    .task-card:hover, .task-card:focus-within { z-index: 10; }
    .nav-pills .nav-link { border-radius: 50px; padding: 8px 20px; font-weight: 500; color: #495057; margin-right: 5px; }
    .nav-pills .nav-link.active { background-color: #212529; color: white; box-shadow: 0 4px 10px rgba(33,37,41,0.2); }
    .status-dot { height: 10px; width: 10px; border-radius: 50%; display: inline-block; margin-right: 6px; }
</style>

<div class="container-fluid py-2">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <h3 class="fw-bold mb-0 text-dark"><i class="bi bi-check2-square text-primary me-2"></i>My Tasks</h3>

        <ul class="nav nav-pills overflow-auto flex-nowrap pb-2 pb-md-0">
            <li class="nav-item"><a class="nav-link {{ !request('status') ? 'active' : '' }}" href="{{ route('tasks.index') }}">All</a></li>
            <li class="nav-item"><a class="nav-link {{ request('status') == 'to-do' ? 'active' : '' }}" href="{{ route('tasks.index', ['status' => 'to-do']) }}">To Do</a></li>
            <li class="nav-item"><a class="nav-link {{ request('status') == 'in-progress' ? 'active' : '' }}" href="{{ route('tasks.index', ['status' => 'in-progress']) }}">In Progress</a></li>
            <li class="nav-item"><a class="nav-link {{ request('status') == 'completed' ? 'active' : '' }}" href="{{ route('tasks.index', ['status' => 'completed']) }}">Completed</a></li>
            <li class="nav-item"><a class="nav-link {{ request('status') == 'submitted' ? 'active' : '' }}" href="{{ route('tasks.index', ['status' => 'submitted']) }}">Submitted</a></li>
            <li class="nav-item ms-md-3"><a class="nav-link text-danger border border-danger bg-white" href="{{ route('tasks.trash') }}"><i class="bi bi-trash3 me-1"></i>Trash</a></li>
        </ul>
    </div>

    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-3">
            <div class="d-flex flex-column flex-lg-row justify-content-between gap-3">

                <form action="{{ route('tasks.index') }}" method="GET" class="d-flex flex-grow-1 gap-2 align-items-center">
                    @if(request('status')) <input type="hidden" name="status" value="{{ request('status') }}"> @endif

                    <div class="position-relative flex-grow-1" style="max-width: 350px;">
                        <i class="bi bi-search position-absolute text-muted" style="top: 50%; left: 15px; transform: translateY(-50%);"></i>
                        <input type="text" name="search" class="form-control bg-light border-0 ps-5 rounded-pill" placeholder="Search tasks..." value="{{ request('search') }}">
                        @if(request('search'))
                            <a href="{{ route('tasks.index', request()->except('search')) }}" class="position-absolute text-muted text-decoration-none fs-5" style="top: 50%; right: 15px; transform: translateY(-50%);">&times;</a>
                        @endif
                    </div>

                    <select name="sort_by" class="form-select bg-light border-0 w-auto rounded-pill" onchange="this.form.submit()">
                        <option value="deadline" {{ request('sort_by', 'deadline') == 'deadline' ? 'selected' : '' }}>Sort by Deadline</option>
                        <option value="task_name" {{ request('sort_by') == 'task_name' ? 'selected' : '' }}>Sort by Name</option>
                        <option value="priority" {{ request('sort_by') == 'priority' ? 'selected' : '' }}>Sort by Priority</option>
                    </select>

                    <select name="sort_dir" class="form-select bg-light border-0 w-auto rounded-pill" onchange="this.form.submit()">
                        <option value="asc" {{ request('sort_dir', 'asc') == 'asc' ? 'selected' : '' }}>Ascending</option>
                        <option value="desc" {{ request('sort_dir') == 'desc' ? 'selected' : '' }}>Descending</option>
                    </select>
                </form>

                <div>
                    <a href="{{ route('tasks.create') }}" class="btn btn-dark rounded-pill px-4 shadow-sm"><i class="bi bi-plus-lg me-2"></i>New Task</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @forelse($tasks as $task)

        @php
            // Clean, modern left-border color accents
            $borderColor = '#6c757d'; // Default gray
            $statusDot = 'bg-secondary';

            if ($task->status == 'completed') {
                $borderColor = '#198754'; $statusDot = 'bg-success';
            } elseif (in_array($task->status, ['to-do', 'in-progress'])) {
                $daysLeft = \Carbon\Carbon::now()->startOfDay()->diffInDays(\Carbon\Carbon::parse($task->deadline)->startOfDay(), false);
                if ($daysLeft < 0) { $borderColor = '#dc3545'; $statusDot = 'bg-danger'; } // Overdue
                elseif ($daysLeft <= 2) { $borderColor = '#ffc107'; $statusDot = 'bg-warning'; } // Soon
                else { $borderColor = '#0d6efd'; $statusDot = 'bg-primary'; } // On track
            }
        @endphp

        <div class="col-12 mb-3">
            <div class="card task-card border-0 shadow-sm" style="border-left: 5px solid {{ $borderColor }} !important;">
                <div class="card-body p-3 p-md-4">
                    <div class="d-flex justify-content-between align-items-center gap-3">

                        <div class="flex-grow-1">
                            <h5 class="fw-bold mb-2 text-dark">{{ $task->task_name }}</h5>
                            <div class="d-flex flex-wrap align-items-center gap-3 text-muted small">
                                <span><i class="bi bi-calendar-event me-1"></i> {{ \Carbon\Carbon::parse($task->deadline)->format('M d, Y') }}</span>

                                <span class="text-capitalize"><span class="status-dot {{ $statusDot }}"></span>{{ str_replace('-', ' ', $task->status) }}</span>

                                @if($task->priority == 'High') <span class="badge bg-danger-subtle text-danger rounded-pill px-3">High Priority</span>
                                @elseif($task->priority == 'Medium') <span class="badge bg-warning-subtle text-dark rounded-pill px-3">Medium Priority</span>
                                @else <span class="badge bg-success-subtle text-success rounded-pill px-3">Low Priority</span>
                                @endif
                            </div>
                        </div>

                        <div class="dropdown">
                            <button class="btn btn-light rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;" type="button" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 text-sm">
                                <li><a class="dropdown-item py-2" href="{{ route('tasks.edit', $task->id) }}"><i class="bi bi-pencil me-2 text-muted"></i>Edit</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="m-0">
                                     @csrf
                                     @method('DELETE')
                                        <button type="submit" class="dropdown-item py-2 text-danger" onclick="return confirm('Move this task to the trash?')">
                                            <i class="bi bi-trash me-2"></i>Delete
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
                <i class="bi bi-inbox fs-1 mb-3 text-secondary opacity-50"></i>
                <h5 class="fw-bold text-dark">You're all caught up!</h5>
                <p>No tasks found matching your current filters.</p>
                <a href="{{ route('tasks.create') }}" class="btn btn-outline-dark rounded-pill mt-2">Create a Task</a>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
