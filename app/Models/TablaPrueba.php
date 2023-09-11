<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class TablaPrueba extends Model
{
    protected $table = 'tablaprueba';
    public $timestamps = false;

    public $fillable = ['id','name','status','species','type','gender','image'];

    // public function valor_nombre(){
    //   return $this->belongsTo('App\models\ValoresNombre','valor_agregado_id','id');
    // }

}
