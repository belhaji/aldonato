<?php
/**
 * Created by PhpStorm.
 * User: adil
 * Date: 4/5/17
 * Time: 02:36
 */

namespace Aldonato\Models;


class Request extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
    protected $fillable = ['account_id', 'description', 'date', 'amount', 'limit_date', 'picture', 'status'];
    protected $currentAmount = 0;

    public function account()
    {
        return $this->belongsTo('Aldonato\Models\Account');
    }

    public function donations()
    {
        return $this->hasMany('Aldonato\Models\Donation');
    }
}