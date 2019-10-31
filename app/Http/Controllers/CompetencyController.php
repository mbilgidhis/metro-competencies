<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Competency;

class CompetencyController extends Controller
{
    public function __construct() {}

    public function index(Request $request) {
    	$competencies = Competency::get();
    	$data = array(
    		'competencies' => $competencies
    	);
    	return view('competency.index', $data);
    }

    public function add(Request $request) {
    	return view('competency.add');
    }

    public function save(Request $request) {
    	$request->validate([
    	    'name' => 'max:50|required|string',
    	    'description' => 'max:100|nullable'
    	]);

    	$competency = new Competency;
    	$competency->name = $request->name;
    	$competency->description = $request->description;
    	if ( $competency->save() )
    		return redirect(route('competency.index'));
    }

    public function edit(Request $request, $id) {
    	$competency = Competency::findOrFail($id);
    	$data = array(
    		'competency' => $competency,
    	);
    	return view('competency.edit', $data);
    }

    public function update(Request $request) {
    	$request->validate([
    		'id' => 'required|integer',
    		'name' => 'max:50|required|string',
    		'description' => 'max:100|nullable'
    	]);
    	$competency = Competency::findOrFail($request->id);
    	$competency->name = $request->name;
    	$competency->description = $request->description;

    	if( $competency->save() )
    		return redirect(route('competency.index'));
    }

    public function delete(Request $request){
        $request->validate([
            'id' => 'required|integer'
        ]);
        $competency = Competency::findOrFail($request->id);
        if( $competency->delete() ) 
            return redirect(route('competency.index'));
    }
}
