<?php

namespace Behin\SimpleWorkflow\Controllers\Core;

use App\Http\Controllers\Controller;
use Behin\SimpleWorkflow\Models\Core\Condition;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    public function index()
    {
        $conditions = Condition::all();
        return view('SimpleWorkflowView::Core.Condition.index', compact('conditions'));
    }

    public function create()
    {
        return view('SimpleWorkflowView::Core.Condition.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'executive_file' => 'nullable|string',
            'content' => 'nullable|json',
        ]);

        Condition::create($request->only('name', 'executive_file', 'content'));

        return redirect()->route('simpleWorkflow.conditions.index')->with('success', 'Condition created successfully.');
    }

    public function edit(Condition $condition)
    {
        return view('SimpleWorkflowView::Core.Condition.edit', compact('condition'));
    }

    public function update(Request $request, Condition $Condition)
    {
        $ar = [];
        $index = 0;
        foreach($request->fieldName as $fieldName){
            if($fieldName){
                $ar[] = [
                    'fieldName' => $fieldName,
                    'operation' => $request->operation[$index],
                    'value' => $request->value[$index],
                    'task' => $request->task[$index],
                ];
            }

            $index++;
        }
        $Condition->content = json_encode($ar);
        $Condition->save();
        return redirect()->back();
    }

    public static function getAll() {
        return Condition::get();
    }
    public static function getById($id) {
        return Condition::find($id);
    }

    public static function runCondition($id, $caseId)
    {
        $Condition = self::getById($id);
        $conditions = json_decode($Condition->content);
        $case = CaseController::getById($caseId);
        $variables = collect($case->variables());
        foreach($conditions as $condition){
            $value = mb_convert_encoding($condition->value, 'UTF-8');
            // print($value);
            $c = (bool)$variables->where('key', $condition->fieldName)->where('value', $condition->operation, $value)->first();
            // print($c);
            if(!$c){
                // print($value);
                return false;
            }
        }
        return true;

    }
}