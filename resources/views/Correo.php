<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correo extends Model
{
    protected $connection = "mysql2";
    protected $table = "CORREO";
    protected $primaryKey = "numero";
    public $timestamps = false;
    
    public function pedido()
    {
      return $this->belongsTo('App\Pedido','numero');
    }
}
