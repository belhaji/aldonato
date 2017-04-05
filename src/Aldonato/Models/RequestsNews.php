<?php

namespace Aldonato\Models;


class RequestsNews extends \Illuminate\Database\Eloquent\Model
{

    public $timestamps = false;

    protected $fillable = ['request_id', 'account_id', 'date'];

    public function account()
    {
        return $this->belongsTo('Aldonato\Models\Account');
    }
    public function request()
    {
        return $this->belongsTo('Aldonato\Models\Request');
    }

}








	
