<?php

namespace Aldonato\Models;


class RequestsNews extends \Illuminate\Database\Eloquent\Model
{

    public $timestamps = false;

    public function account()
    {
        return $this->belongsTo('Aldonato\Models\Account');
    }
    public function request()
    {
        return $this->belongsTo('Aldonato\Models\Request');
    }

}








	
