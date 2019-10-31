<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Competency;

class DisplayController extends Controller
{
    public function __construct(){}

    public function index(Request $request) {
    	$employees = Employee::get();

    	$data = array(
    		'employees' => $employees,

    	);
    	return view('display.index', $data);
    }

    public function show(Request $request, $id) {
    	$employee = Employee::findOrFail($id);
    	$competencies = Competency::orderBy('id', 'asc')->get();
    	$pluckCompetencies = $competencies->pluck('name');
    	$scores = $this->getScore($employee->id);
    	$data = array(
    		'employee' => $employee,
    		'competencies' => $pluckCompetencies->all(),
    		'scores' => $scores,
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
}
