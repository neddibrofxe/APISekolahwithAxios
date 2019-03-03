<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{   
    public function index(){
        return \App\Siswa::all();
    }

    public function detail($id){
        $siswa = \App\Siswa::find($id);

        if(empty($siswa)){
            return[
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
                'result' => null
            ];    
        }
        return[
            'status' => 'success',
            'result' => $siswa
        ];
    }

    public function read(Request $request){
        $result = \App\Siswa::all();
        return[
            'status' => 'success',
            'message' => '',
            'result' => $result
        ];
    }

    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'nis' => 'required|max:20|unique:t_siswa',
            'nama_lengkap' => 'required|string',
            'jenis_kelamin' => 'required|max:1',
            'alamat' => 'required|string',
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

        $result = \App\Siswa::create($request->all());
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

    public function update(Request $request, $id){
        $validation = Validator::make($request->all(), [
            'nis' => 'required|max:20|unique:t_siswa',
            'nama_lengkap' => 'required|string',
            'jenis_kelamin' => 'required|max:1',
            'alamat' => 'required|string',
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

        $siswa = \App\Siswa::find($id);
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

    public function delete(Request $request, $id){
        $siswa = \App\Siswa::find($id);
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
