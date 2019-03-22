<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

Class Pegawai extends Model
{

  public $table = 't_pegawai';

  protected $fillable = ['nip','nama','jk','ttl','alamat'];

}
