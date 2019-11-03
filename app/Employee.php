<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Competency;

class Employee extends Model
{
	protected $appends = ['cummulative', 'average'];

    public function scores() {
    	return $this->hasMany('App\DetailEmployee');
    }

    public function getAverageAttribute() {
    	$competencies = Competency::with(['detailsemployee' => function($query){
    							$query->where('employee_id', $this->id);
    							$query->with('detail');
    						}])
    						->orderBy('id', 'asc')
    						->get();

    	$scores = 0;

    	foreach ($competencies as $competency) {
    		$score = 0;
    		foreach($competency->detailsemployee as $det) {
    			//pastikan jumlahnya total nya 5
    			$score = $score + ( ( $det->score/5) * $det->detail->weight );
    		}
    		$scores = $scores + $score;
    	}
    	return round($scores/$competencies->count(),2);
    }

    public function getCummulativeAttribute() {
        $competencies = Competency::with(['detailsemployee' => function($query){
                                $query->where('employee_id', $this->id);
                                $query->with('detail');
                            }])
                            ->orderBy('id', 'asc')
                            ->get();

        $scores = array();

        foreach ($competencies as $competency) {
            $score = 0;
            foreach ($competency->detailsemployee as $det) {
                $score = $score + ( ( $det->score/5) * $det->detail->weight );
            }
            // $avg = round($score/$competency->detailsemployee->count(), 2);
            array_push($scores, [$competency->name => $score]);
        }

        return $scores;
    }
}
