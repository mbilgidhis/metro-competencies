<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Competency;
use App\Detail;
use App\DetailEmployee;

use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function __construct() {}

    public function index(Request $request) {
    	$employees = Employee::get();
    	$data = array(
    		'employees' => $employees
    	);
    	return view('employee.index', $data);
    }

    public function add(Request $request) {
        $competencies = Competency::with('details')->get();
        $data = array(
            'competencies' => $competencies
        );
    	return view('employee.add', $data);
    }

    public function save(Request $request) {
     	$request->validate([
    	    'name' => 'max:50|required|string',
    	]);

    	$employee = new Employee;
    	$employee->name = $request->name;

    	if ( $employee->save() ) {
            $details = Detail::get();

            foreach ($details as $detail) {
                $detailEmp = new DetailEmployee;
                $detailEmp->employee_id = $employee->id;
                $detailEmp->competency_id = $detail->competency_id;
                $detailEmp->detail_id = $detail->id;
                $detailEmp->score = 0;
                $detailEmp->save();
            }

            return redirect(route('employee.edit', ['id' => $employee->id]));
        }
    }

    public function edit(Request $request, $id) {
    	$employee = Employee::with('scores')->findOrFail($id);
        $competencies = Competency::with('details')->get();
    	$data = array(
    		'employee' => $employee,
            'competencies' => $competencies
    	);
    	return view('employee.edit', $data);
    }

    public function update(Request $request) {
    	$request->validate([
    		'id' => 'required|integer',
    		'name' => 'max:50|required|string'
    	]);
    	$employee = Employee::findOrFail($request->id);
    	$employee->name = $request->name;

        foreach ($request->except(['_token', 'name', 'id']) as $key => $value) {
            $exp = explode('-', $key);
            $detail_id = $exp[2];
            $detail = DetailEmployee::where('employee_id', $employee->id)
                                        ->where('detail_id', $detail_id)
                                        ->update(['score' => $value]);
        }
    	if( $employee->update() )
    		return redirect(route('employee.edit', ['id' => $employee->id]));
    }
}
