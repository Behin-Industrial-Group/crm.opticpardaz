<?php

namespace BehinProcessMakerAdmin\Controllers;

use App\Http\Controllers\Controller;
use BehinProcessMaker\Controllers\AuthController;
use BehinProcessMaker\Controllers\CurlRequestController;
use BehinProcessMaker\Controllers\DynaFormController;
use BehinProcessMaker\Controllers\GetCaseVarsController;
use BehinProcessMaker\Controllers\GetTaskAsigneeController;
use BehinProcessMaker\Models\PmVars;
use Illuminate\Http\Request;

class CaseDetailsController extends Controller
{
    public function caseDetails(Request $r, DynaFormController $dynaform){
        $processId = $r->processId;
        $taskId = '41561946766acaed59d0c03042779430';
        $dynaFormId = '24904779066ae0e7a8356a4097559819';
        $caseId = $r->caseId;
        $caseinfo = CaseInfoController::get($caseId);
        if(!$caseinfo){
            return response(trans("Case Doesnt Exsit"), 500);
        }
        $r = new Request([
            'processId' => $processId,
            'taskId' => $taskId,
            'caseId' => $caseId,
            'processTitle' => $caseinfo->case->processTitle,
            'caseTitle' => $caseinfo->case->caseTitle
        ]);
        $dynaform->getHtml(
                $processId, 
                $caseId, 
                $dynaFormId, 
                $caseinfo->case->processTitle, 
                $caseinfo->case->caseTitle,
                null, 
                AuthController::getAccessToken()
        );
    }
}