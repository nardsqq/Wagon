<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobOrder;

class JobOrderController extends Controller
{
    public function getChecklist($id){
        $jobOrder = JobOrder::findOrFail($id);
        $steps = collect(\DB::select("SELECT intCheckID, intStepStatus, intServAreaID, intSCL_ServArea_ID, strServAreaName, strServStepDesc  
                    FROM tblprogresschecklist 
                        JOIN tblservicechecklist on intServCLID = intCL_ServCL_ID
                        JOIN tblServiceStep on intServStepID = intSCL_ServStep_ID
                        JOIN tblServiceArea on intServAreaID = intSCL_ServArea_ID
                    WHERE intCL_JO_ID = $id    
                    GROUP BY intServAreaID, intServStepID"))
                ->groupBy('strServAreaName')->toArray();
            
        return response()->json([
            'jobOrder' => $jobOrder,
            'steps' => $steps
        ]);
    }

    public function updateChecklist(Request $request, $id){
        $jobOrder = JobOrder::findOrFail($id);
        if($request->has('step')){
            foreach($jobOrder->checklist as $step){
                $new_status = array_key_exists($step->intCheckID, $request->step) ? 1 : 0;
                if($step->intStepStatus != $new_status){
                    $step->update([
                        'intStepStatus' => $new_status
                    ]);
                }
            }
            if(count($jobOrder->checklist) == $jobOrder->checklist()->where('intStepStatus', 1)->count()){
                // Completed All Steps
            }
        }
        return response()->json([
            'checklist' => $jobOrder->checklist
        ]);
    }
}
