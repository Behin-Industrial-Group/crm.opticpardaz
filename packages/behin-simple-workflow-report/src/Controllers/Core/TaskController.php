<?php

namespace Behin\SimpleWorkflow\Controllers\Core;

use App\Http\Controllers\Controller;
use Behin\SimpleWorkflow\Models\Core\Process;
use Behin\SimpleWorkflow\Models\Core\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index($process_id)
    {
        $process = ProcessController::getById($process_id);
        $forms = FormController::getAll();
        $scripts = ScriptController::getAll();
        $conditions = ConditionController::getAll();
        return view('SimpleWorkflowView::Core.Task.create')->with([
            'process' => $process,
            'forms' => $forms,
            'scripts'=> $scripts,
            'conditions'=> $conditions,
        ]);
    }

    public function create(Request $request)
    {
        $task = Task::create($request->all());
        if (!$request->parent_id) {
            $task->parent_id = $task->id;
            $task->save();
        }
        return redirect(route('simpleWorkflow.task.index', ['process_id'=> $task->process_id]));
    }

    public function edit(Task $task)
    {
        return view('SimpleWorkflowView::Core.Task.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->only('name', 'executive_element_id', 'parent_id', 'next_element_id', 'assignment_type', 'case_name'));
        // self::getById($request->id)->update($request->all());
        return redirect()->back();
    }

    public static function getById($id){
        return Task::find($id);
    }

    public static function getAll(){
        return Task::get();
    }

    public static function getProcessTasks($process_id)
    {
        return Task::where('process_id', $process_id)->get();
    }

    public static function getProcessStartTasks($process_id)
    {
        return Task::where('process_id', $process_id)->whereColumn('id', 'parent_id')->get();
    }

}