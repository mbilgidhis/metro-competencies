<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Competency;
use App\DetailEmployee;

class DisplayController extends Controller
{
    public function __construct(){}

    public function index(Request $request) {
    	$employees = Employee::get();
        // return $employees;
        $competencies = Competency::orderBy('id', 'asc')->get();
        $pluckCompetencies = $competencies->pluck('name');
        $scores = $this->allScore();
    	$data = array(
    		'employees' => $employees,
            'competencies' => $pluckCompetencies->all(),
            'scores' => $scores,
    	);
    	return view('display.index', $data);
    }

    public function show(Request $request, $id) {
    	$employee = Employee::findOrFail($id);
    	$competencies = Competency::orderBy('id', 'asc')->get();
        $details = Competency::with(['details' => function($query) use($id){
                                $query->with(['detailsemployee' => function($query) use($id){
                                    $query->where('employee_id', $id);
                                }]);
                            }])
                            ->get();
    	$pluckCompetencies = $competencies->pluck('name');
    	$scores = $this->getScore($employee->id);
    	$data = array(
    		'employee' => $employee,
    		'competencies' => $pluckCompetencies->all(),
    		'scores' => $scores,
            'details' => $details,
    	);
    	return view('display.show', $data);
    }

    protected function getScore($employee) {
    	$competencies = Competency::with(['detailsemployee' => function($query) use($employee){
    							$query->where('employee_id', $employee);
    							$query->with('detail');
    						}])
    						->orderBy('id', 'asc')
    						->get();

    	$scores = [];

    	foreach ($competencies as $competency) {
    		$score = 0;
    		foreach($competency->detailsemployee as $det) {
    			//pastikan jumlahnya total nya 5
    			$score = $score + ( ( $det->score/5) * $det->detail->weight );
    		}
    		array_push($scores, $score);
    	}

    	// die();
    	return $scores;
    }

    public function front(Request $request) {
        $competencies = Competency::orderBy('id', 'asc')->get();
        $pluckCompetencies = $competencies->pluck('name');
        $scores = $this->allScore();

        $data = array(
            // 'employee' => $employee,
            'competencies' => $pluckCompetencies->all(),
            'scores' => $scores,
        );
        return view('display.front', $data);
    }

    protected function allScore() {
        $competencies = Competency::with(['details' => function($query){
                                $query->with('detailsemployee');
                            }])
                            ->orderBy('id', 'asc')
                            ->get();

        $scores = [];

        foreach ($competencies as $competency) {
            $score = 0;
            foreach ($competency->details as $details) {
                $countEmployee = $details->detailsemployee->count();
                $sumScore = 0;
                foreach ($details->detailsemployee as $detail) {
                    $sumScore = $sumScore + $detail->score;
                }
                $avgScore = $sumScore/$countEmployee;
                $score = $score + ( ($avgScore/5) * $details->weight );
            }
            array_push($scores, $score);
        }


        return $scores;
    }
}
