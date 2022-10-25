<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Models\siswa;
use App\Models\project;
use App\Models\kontak;
use App\Models\jenis_kontak;

class masterkontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=siswa::Paginate(5);
        return view ('masterkontak', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
    }

    public function tambah($id)
    {
        $siswa = siswa::find($id);
        $jenis_kontak = jenis_kontak::all();
        return view('TambahKontak', compact('siswa', 'jenis_kontak'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute harus diisi gaess',
            'min' => ':attribute minimal :min karakter ya coy',
            'max' => 'attribute makasimal :max karakter gaess',
            'numeric' => ':attribute kudu diisi angka cak!!',
            'mimes' => 'file :attribute harus bertipe :mimes'
        ];
        $validateData = $request->validate([
            
        ], $message);

        kontak::create([
            'siswa_id' => $request->sosmed,
            'jenis_kontak_id' => $request->jenis_kontak,
            'deskripsi' => $request->deskripsi,
        ]);
        Session::flash('benar', 'Selamat!!! Data Berhasil Ditambahkan');
        return redirect('/masterkontak');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kontak=siswa::find($id)->kontak()->get();
        return view('showkontak', compact('kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kontak = kontak::find($id);
        $siswa = siswa::find($id);
        return view('EditKontak', compact('kontak', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama_project' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required'
        ], $message);

        $kontak = kontak::find($id);
        $kontak->jenis_kontak = $request->jenis_kontak;
        $kontak->deskripsi = $request->deskripsi;
        $kontak->save();
        kontak::find($id)->update($validateData);
        Session::flash('update', 'Selamat!!! Project Anda Berhasil Diupdate');
        return redirect('/masterkontak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function hapus($id)
    {
        $kontak=kontak::find($id)->delete();
        Session::flash('success', 'data berhasil dihapus !!!');
        return redirect('/masterkontak');
    }
}
