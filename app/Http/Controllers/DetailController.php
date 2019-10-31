<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Competency;
use App\Detail;

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

    	$detail = new Detail;
    	$detail->name = $request->name;
    	$detail->competency_id = $request->competency;
    	$detail->weight = $request->weight;
    	if ( $detail->save() )
    		return redirect(route('detail.index'));
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
