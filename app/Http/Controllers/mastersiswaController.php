<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\siswa;
use App\Models\project;
use App\Models\kontak;

class mastersiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = siswa::all();
        return view ('mastersiswa' , compact('data'));
    }

    // public function __construct()
    // {
    //     $this->middleware(['auth', 'admin']);
    //     $this->middleware(['auth', 'walas'])->only('index');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('TambahSiswa');
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
            'required' => ':attribute harus diisi ',
            'min' => ':attribute minimal :min karakter ya ',
            'max' => 'attribute makasimal :max karakter ',
            'numeric' => ':attribute harus diisi angka ',
            'mimes' => 'file :attribute harus bertipe JPG, JPEG, PNG, BMP'
        ];

        $this->validate($request,[
            'nama'=> 'required|min:3|max:30',
            'nisn'=> 'required|numeric',
            'alamat'=> 'required',
            'jk'=> 'required',
            'foto'=> 'required|mimes:jpg,bmp,png,jpeg',
            'about'=> 'required|min:10'
        ], $message );


        //
        

        //ambil parameter
        $file = $request->file('foto');
        
        //rename
        $nama_file = time() . '_' . $file->getClientOriginalName();
        
        //proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload, $nama_file);

        Siswa::create([
            'nama'=> $request-> nama,
            'nisn'=> $request-> nisn,
            'alamat'=> $request-> alamat,
            'jk'=> $request-> jk,
            'foto'=> $nama_file,
            'about'=> $request-> about
        ]); 

        Session::flash('success', 'data berhasil ditambah !!!');
        return redirect('/mastersiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa=siswa::find($id);
        $kontaks = $siswa->kontak()->get();
        // return $kontak;
        return view ('ShowSiswa',compact('siswa', 'kontaks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa=Siswa::find($id);
        return view ('EditSiswa', compact('siswa'));
    }

    /** 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestbnn
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $message = [
            'required' => ':attribute harus diisi ',
            'min' => ':attribute minimal :min karakter',
            'max' => 'attribute makasimal :max karakter ',
            'numeric' => ':attribute harus diisi angka ',
            'mimes' => 'file :attribute harus bertipe JPG, JPEG, BMP, PNG'
        ];

        $this->validate($request, [
            'nama' => 'required|min:3|max:30',
            'nisn' => 'required|numeric',
            'alamat' => 'required',
            'jk' => 'required',
            'foto'=> 'mimes:jpg,bmp,png,jpeg',
            'about' => 'required|min:10'
        ], $message);

        if ($request->foto != '') {
            $siswa = Siswa::find($id);
            file::delete('./template/img/' . $siswa->foto);

            //ambil informasi file yang diupload
            $file = $request->file('foto');

            //rename
            $nama_file = time() . "_" . $file->getClientOriginalName();
            // proses upload
            $tujuan_upload = './template/img';
            $file->move($tujuan_upload, $nama_file);

            $siswa->nama = $request->nama;
            $siswa->jk = $request->jk;
            $siswa->nisn = $request->nisn;
            $siswa->alamat = $request->alamat;
            $siswa->about = $request->about;
            $siswa->foto = $nama_file;
            $siswa->save();
            return redirect('mastersiswa');

            
        } else {
            $siswa=siswa::find($id);
            $siswa->nama = $request->nama;
            $siswa->jk = $request->jk;
            $siswa->nisn = $request->nisn;
            $siswa->alamat = $request->alamat;
            $siswa->about = $request->about;
            $siswa->save();
            return redirect('mastersiswa');

        };
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
        $siswa=siswa::find($id)->delete();
        Session::flash('success', 'data berhasil dihapus !!!');
        return redirect('/mastersiswa');
    }
}
