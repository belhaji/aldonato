<?php
/**
 * Created by PhpStorm.
 * User: adil
 * Date: 4/5/17
 * Time: 02:36
 */

namespace Aldonato\Models;


class Donation extends \Illuminate\Database\Eloquent\Model
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