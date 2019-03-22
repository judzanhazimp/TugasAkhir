<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

Class Barang extends Model
{

  public $table = 't_barang';

  protected $fillable = ['nama','jumlah','harga'];

}
