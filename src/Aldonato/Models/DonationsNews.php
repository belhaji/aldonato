<?php

namespace Aldonato\Models;


class DonationsNews extends \Illuminate\Database\Eloquent\Model
{

    public $timestamps = false;
    protected $fillable = [ 'account_id','donation_id', 'date'];

    public function account()
    {
        return $this->belongsTo('Aldonato\Models\Account');
    }
    public function donation()
    {
        return $this->belongsTo('Aldonato\Models\Donation');
    }

}








	
