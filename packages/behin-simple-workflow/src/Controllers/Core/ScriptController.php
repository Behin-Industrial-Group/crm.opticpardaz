<?php

namespace Behin\SimpleWorkflow\Controllers\Core;

use App\Http\Controllers\Controller;
use Behin\SimpleWorkflow\Models\Core\Form;
use Behin\SimpleWorkflow\Models\Core\Process;
use Behin\SimpleWorkflow\Models\Core\Script;
use Illuminate\Http\Request;

class ScriptController extends Controller
{
    public function index()
    {
        $scripts = Script::all();
        return view('SimpleWorkflowView::Core.Script.index', compact('scripts'));
    }

    public function create()
    {
        return view('SimpleWorkflowView::Core.Script.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'executive_file' => 'nullable|string',
            'content' => 'nullable|json',
        ]);

        Script::create($request->only('name', 'executive_file', 'content'));

        return redirect()->route('simpleWorkflow.scripts.index')->with('success', 'Script created successfully.');
    }

    public function edit(Script $script)
    {
        return view('SimpleWorkflowView::Core.Script.edit', compact('script'));
    }

    public function update(Request $request, Script $script)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'executive_file' => 'nullable|string',
            'content' => 'nullable|json',
        ]);

        $script->update($request->only('name', 'executive_file', 'content'));

        return redirect()->route('simpleWorkflow.scripts.index')->with('success', 'Script updated successfully.');
    }

    public static function getAll() {
        return Script::get();
    }
    public static function getById($id) {
        return Script::find($id);
    }

    public static function runScript($id, $caseId)
    {
        $script = self::getById($id);
        $case = CaseController::getById($caseId);
        $executiveFile = "\\Behin\SimpleWorkflow\Controllers\Scripts\\$script->executive_file";
        $script = new $executiveFile($case);
        $script->execute();
    }
}