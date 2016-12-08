<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use DateTime;

class SalesHeader extends Model
{

  protected $table = 'SalesHeader';

 public $primaryKey='IntNo';
 public $timestamps = false;

}
