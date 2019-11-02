<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Competency;
use App\Detail;
use App\Employee;
use App\DetailEmployee;

class DetailController extends Controller
{
    public function __constuct(){}

    public function index(Request $request) {
    	$details = Detail::all();
    	$data = array(
    		'details' => $details
    	);
    	return view('detail.index', $data);
    }

    public function add(Request $request) {
    	$competencies = Competency::get();
    	$data = array(
    		'competencies' => $competencies
    	);
    	return view('detail.add', $data);
    }

    public function save(Request $request) {
    	$request->validate([
    	    'name' => 'max:50|required|string',
    	    'competency' => 'integer|required',
    	    'weight' => 'integer|required'
    	]);

        $competency = Competency::with('details')->findOrFail($request->competency);

        if( $competency->details->sum('weight') + $request->weight > 100 ) 
            return redirect(route('detail.add'))->withErrors(['Weight is over 100'])->withInput($request->all());

    	$detail = new Detail;
    	$detail->name = $request->name;
    	$detail->competency_id = $request->competency;
    	$detail->weight = $request->weight;
    	if ( $detail->save() ) {
            $employees = Employee::get();
            foreach ($employees as $employee) {
                $detailEmp = new DetailEmployee;
                $detailEmp->employee_id = $employee->id;
                $detailEmp->competency_id = $detail->competency_id;
                $detailEmp->detail_id = $detail->id;
                $detailEmp->score = 0;
                $detailEmp->save();
            }
            return redirect(route('detail.index'));
        }
    }

    public function edit(Request $request, $id) {
    	$detail = Detail::findOrFail($id);
    	$competencies = Competency::get();
    	$data = array(
    		'detail' => $detail,
    		'competencies' => $competencies
    	);
    	return view('detail.edit', $data);
    }

    public function update(Request $request) {
    	$request->validate([
    		'id' => 'required|integer',
    		'name' => 'max:50|required|string',
    		'competency' => 'integer|required',
    		'weight' => 'integer|required'
    	]);

        $competency = Competency::with(['details' => function($query) use($request){
                                $query->where('id', '!=', $request->id);
                        }])
                        ->findOrFail($request->competency);

        if( $competency->details->sum('weight') + $request->weight > 100 ) 
            return redirect(route('detail.edit', ['id' => $request->id]))->withErrors(['Weight is over 100']);

    	$detail = Detail::findOrFail($request->id);
    	$detail->name = $request->name;
    	$detail->competency_id = $request->competency;
    	$detail->weight = $request->weight;

    	if( $detail->save() )
    		return redirect(route('detail.index'));
    }

    public function delete(Request $request){
        $request->validate([
            'id' => 'required|integer'
        ]);
        $detail = Detail::findOrFail($request->id);
        if( $detail->delete() ) 
            return redirect(route('detail.index'));
    }
}
