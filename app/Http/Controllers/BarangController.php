<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Barang;

class BarangController extends Controller
{

  public function create(Request $request)
  {
    $validation = Validator::make($request->all(), [
      'nama' => 'required',
      'jumlah' => 'required',
      'harga' => 'required',
      
    ]);

    if ($validation->fails()) {
      $error = $validation->errors();
      return [
        'status'=>'error',
        'message'=>$error,
        'result'=>null
      ];
    }

    $result = \App\Barang::create($request->all());
    if ($result) {
      return [
        'status'=>'success',
        'message'=>'Data berhasil ditambahkan',
        'result'=>$result
      ];
    }else {
      return[
        'status'=>'error',
        'message'=>'Data gagal di tambahkan',
        'result'=>null
      ];
    }
  }

public function read(Request $request)
{
  $result = \App\Barang::all();
  return [
    'status'=>'success',
    'message'=>'',
    'result'=>$result
  ];
}

public function update(Request $request, $id)
{
    $validation = Validator::make($request->all(), [
      'nama' => 'required',
      'jumlah' => 'required',
      'harga' => 'required',
      
    ]);

    if ($validation->fails()) {
      $errors = $validation->errors();
      return [
        'status'=>'error',
        'message'=>$errors,
        'result'=>null
      ];
    }

    $barang = \App\Barang::find($id);
    if (empty($barang)) {
      return [
        'status'=>'error',
        'message'=>'Data tidak ditemukan',
        'result'=>null
      ];
    }

    $result= $barang->update($request->all());
    if ($result) {
      return [
        'status'=>'success',
        'message'=>'Data berhasil diubah',
        'result'=>$result
      ];
    }else {
      return [
        'status'=>'error',
        'message'=>'Data gagal diubah',
        'result'=>null
      ];
    }
}

public function delete(Request $request, $id)
{

    $barang = \App\Barang::find($id);
    if (empty($barang)) {
      return [
        'status'=>'error',
        'message'=>'Data tidak ditemukan',
        'result'=>null
      ];
    }

    $result= $barang->delete($id);
    if ($result) {
      return [
        'status'=>'success',
        'message'=>'Data berhasil dihapus',
        'result'=>$result
      ];
    }else {
      return [
        'status'=>'error',
        'message'=>'Data gagal dihapus',
        'result'=>null
      ];
    }
}

public function detail($id)
  {
    $barang = Barang::find($id);

    if(empty($barang)){
      return [
        'status'=>'error',
        'message'=>'Data gagal ditemukan',
        'result'=>null
      ];
    }
      return [
        'status'=>'success',
        'result'=>$barang
      ];

  }

}



?>
