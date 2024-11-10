<?php

namespace App\Http\Controllers;

use App\Models\DataCustomer as ModelsDataCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataCustomer extends Controller 
{
    function index(){
        $data = ModelsDataCustomer::all();
        return view('data_customer.index',['data'=> $data]);
    }
    function tambah()
    {
        return view('data_customer.tambah');
    }
    function edit($id)
    {
        $data = ModelsDataCustomer::find($id);
        return view('data_customer.edit',['data'=>$data]);
    }
    function hapus(Request $request)
    {
        ModelsDataCustomer::where('id',$request->id)->delete();

        Session::flash('success','Berhasil Hapus Data');

        return redirect('/datacustomer');
    }
    // new
    function create(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'posisi' => 'required|',
            'perusahaan' => 'required|max:8',
            'email' => 'required|email',
            'telp' => 'required',
        ], [
            'nama.required' => 'Nama Wajib Di isi',
            'nama.min' => 'Bidang nama minimal harus 3 karakter.',
            'posisi.required' => 'Posisi Wajib Di isi',
            'perusahaan.required' => 'Perusahaan Wajib Di isi',
            'email.required' => 'Email Wajib Di isi',
            'email.email' => 'Format Email Invalid',
            'telp.required' => 'Telp Wajib Di isi',
            'telp.max' => 'Telp max 14 Digit',
            
        ]);

        ModelsDataCustomer::insert([
            'nama' => $request->nama,
            'posisi' => $request->posisi,
            'perusahaan' => $request->perusahaan,
            'email' => $request->email,
            'telp' => $request->telp,
        ]);

        Session::flash('success', 'Data berhasil ditambahkan');

        return redirect('/datacustomer')->with('success', 'Berhasil Menambahkan Data');
    }
    function change(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'posisi' => 'required|',
            'perusahaan' => 'required|max:8',
            'email' => 'required|email',
            'telp' => 'required',
        ], [
            'nama.required' => 'Nama Wajib Di isi',
            'nama.min' => 'Bidang nama minimal harus 3 karakter.',
            'posisi.required' => 'Posisi Wajib Di isi',
            'perusahaan.required' => 'Perusahaan Wajib Di isi',
            'email.required' => 'Email Wajib Di isi',
            'email.email' => 'Format Email Invalid',
            'telp.required' => 'Telp Wajib Di isi',
            'telp.max' => 'Telp max 14 Digit',
        ]);

        $datacustomer = ModelsDataCustomer::find($request->id);

        $datacustomer->nama = $request->nama;
        $datacustomer->posisi = $request->posisi;
        $datacustomer->perusahaan = $request->perusahaan;
        $datacustomer->email = $request->email;
        $datacustomer->telp = $request->telp;
        $datacustomer->save();

        Session::flash('success', 'Berhasil Mengubah Data');

        return redirect('/datacustomer');
    }
}


?>