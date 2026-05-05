<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();

        if ($request->search) {
            $query->where('task_name', 'like', '%' . $request->search . '%');
        }
        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->has('sort_by')) {
            session([
                'task_sort_by' => $request->sort_by,
                'task_sort_dir' => $request->sort_dir
            ]);
        }

        $sortBy = session('task_sort_by', 'deadline');
        $sortDir = session('task_sort_dir', 'asc');

        $allowedColumns = ['task_name', 'priority', 'deadline'];

        if (in_array($sortBy, $allowedColumns)) {
            $query->orderBy($sortBy, $sortDir);
        }

        $tasks = $query->get();

        return view('tasks.index', compact('tasks', 'sortBy', 'sortDir'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request){
        $task = new Task();

        $task->task_name = $request->task_name;
        $task->priority = $request->priority;
        $task->deadline = $request->deadline;

        $task->save();

        return redirect()->route('tasks.index');
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id){
        $task = Task::find($id);

        $task->task_name = $request->task_name;
        $task->priority = $request->priority;
        $task->deadline = $request->deadline;
        $task->status = $request->status;

        $task->save();

        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        Task::find($id)->delete();

        return redirect()->back();
    }

    public function trash(Request $request)
    {
        $query = Task::onlyTrashed();

        if ($request->search) {
            $query->where('task_name', 'like', '%' . $request->search . '%');
        }

        $sortBy = $request->sort_by;
        $sortDir = $request->sort_dir ?? 'desc';

        $allowedColumns = ['task_name', 'priority', 'deadline'];

        if ($sortBy && in_array($sortBy, $allowedColumns)) {
            $query->orderBy($sortBy, $sortDir);
        } else {
            $query->orderBy('deleted_at', $sortDir);
        }

        $trashedTasks = $query->get();

        return view('tasks.trash', compact('trashedTasks'));
    }

    public function restore($id){
        Task::withTrashed()->where('id', $id)->restore();

        return redirect()->back();
    }

    public function forceDelete($id)
    {
        Task::withTrashed()->where('id', $id)->forceDelete();

        return redirect()->back();
    }

    // INLINE STATUS UPDATE (AJAX)
    public function updateStatus(Request $request, $id){
        $task = Task::find($id);

        if (!$task){
            return response()->json(['success' => false, 'message' => 'Task not found.']);
        }

        $task->status = $request->status;
        $task->save();

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully',
            'new_status' => $task->status
        ]);
    }
}
