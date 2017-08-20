<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = 'tblProduct';
  protected $fillable = ['strProdName', 'strProdHandle', 'strProdSKU', 'txtProdDesc'];
  protected $primaryKey = 'intProdID';
  public $timestamps = false;
}
