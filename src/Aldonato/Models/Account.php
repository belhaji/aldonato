<?php

namespace Aldonato\Models;


class Account extends \Illuminate\Database\Eloquent\Model
{

    public $timestamps = false;
    protected $fillable = ['login', 'password', 'name', 'category'];


    public function requests()
    {
        return $this->hasMany('Aldonato\Models\Request');
    }
    public function donations()
    {
        return $this->hasMany('Aldonato\Models\Donation');
    }

}








	
