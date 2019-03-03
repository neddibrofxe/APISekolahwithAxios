<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{   
    public function index(){
        return \App\Kelas::all();
    }

    public function read(Request $request){
        $result = \App\Kelas::all();
        return[
            'status' => 'success',
            'message' => '',
            'result' => $result
        ];
    }

    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'nama_kelas' => 'required|max:10',
            'jurusan' => 'required|max:20',
        ]);

        if ($validation->fails())
        {
            $errors = $validation->errors();
            return [
                'status' => 'error',
                'message' => $errors,
                'result' => null
            ];
        }

        $result = \App\Kelas::create($request->all());
        if ($result){
            return [
            'status' => 'success',
            'message' => 'Data berhasil ditambahkan',
            'result' => $result];
        } else{
            return[
            'status' => 'error',
            'message' => 'Data gagal ditambahkan',
            'result' => null];
        }
    }

    public function update(Request $request){
        $validation = Validator::make($request->all(), [
            'nama_kelas' => 'required|max:10',
            'jurusan' => 'required|max:20',
        ]);

        if ($validation->fails())
        {
            $errors = $validation->errors();
            return [
                'status' => 'error',
                'message' => $errors,
                'result' => null
            ];
        }

        $siswa = \App\Kelas::find($id);
        if (empty($siswa)){
            return [
            'status' => 'error',
            'message' => 'Data tidak ditemukan',
            'result' => null];
        }
        $result = $siswa->update($request->all());
        if ($result){
            return [
            'status' => 'success',
            'message' => 'Data berhasil diubah',
            'result' => $result];
        } else{
            return[
            'status' => 'error',
            'message' => 'Data gagal diubah',
            'result' => null];
        }   
    }

    public function delete(Request $request){
        $siswa = \App\Kelas::find($id);
        if (empty($siswa)){
            return [
            'status' => 'error',
            'message' => 'Data tidak ditemukan',
            'result' => null];
        }
        $result = $siswa->delete($id);
        if ($result){
            return [
            'status' => 'success',
            'message' => 'Data berhasil dihapus',
            'result' => $result];
        } else{
            return[
            'status' => 'error',
            'message' => 'Data gagal dihapus',
            'result' => null];
        }   
    }
    
}
