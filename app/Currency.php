<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
     protected  $fillable =['ccy', 'base_ccy', 'rate'];
}
