<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dividend extends Model
{
	protected $fillable = ['record_date', 'pay_date', 'ex_date', 'declaration_date', 'amount'];
}
