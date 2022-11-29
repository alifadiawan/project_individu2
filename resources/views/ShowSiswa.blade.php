@extends('layout.admin')
@section('title', 'ShowSiswa')
@section('content-title', 'Show siswa')
@section('content')

    <div class="row">
        <div class="col-lg-4">
            {{-- Kartu Satu --}}
            <div class="card shadow-mb-4">
                <div class="card-header bg-info">
                    <h6 class="m-0 font-weight-bold text-white"><i class="fas fa quote-left"></i>Nama siswa</h6>
                </div>
                <div class="card-body ">
                    <div class="text-center">
                        <img src="{{ asset('/template/img/' . $siswa->foto) }}" width="250"
                            class="rounded-circle mt-1 mx-auto img-thumbnail" alt="">

                        <h6>{{ $siswa->nisn }}</h6>
                        <h6>{{ $siswa->nama }}</h6>
                        <h6>{{ $siswa->jk }}</h6>
                        <h6>{{ $siswa->alamat }}</h6>

                    </div>
                </div>
            </div>

            {{-- Kartu dua --}}

            <div class="card shadow-mb-4">
                <div class="card-header bg-info">
                    <h6 class="m-0 font-weight-bold text-white"><i class="fas fa quote-left"></i>Kontak</h6>
                </div>
                <div class="card-body text-center">
                    @foreach ($kontaks as $kontak)
                        <li>{{ $kontak->jenis_kontak }} : {{ $kontak->pivot->deskripsi }}</li>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            {{-- kartu Tiga --}}
            <div class="card shadow-mb-4">
                <div class="card-header bg-info">
                    <h6 class="m-0 font-weight-bold text-white"><i class="fas fa quote-left"></i>About Siswa</h6>
                </div>
                <div class="card-body text-center">
                    {{-- <p>{{$siswa->about}}</p> --}}
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a mattis nunc. Vivamus placerat fermentum
                        ante,
                        nec malesuada diam viverra sed. Curabitur vehicula efficitur libero eget tempus. Integer viverra
                        egestas viverra.
                        Quisque placerat feugiat massa, nec laoreet justo vehicula rutrum. Integer lacus leo, volutpat et
                        tristique eget,
                        mollis quis nisl. Proin aliquam pulvinar sem, vitae pulvinar quam. Curabitur ultricies, risus ac
                        laoreet vestibulum,
                        sem velit rhoncus ligula, in venenatis dolor tellus eu nulla. Aliquam rhoncus ac massa eget maximus.
                        Class aptent taciti
                        sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam eget nunc
                        consectetur, elementum eros non,
                        fringilla orci. Mauris eget maximus odio, ultrices euismod nibh.</p>
                </div>
            </div>

            {{-- kartu empat --}}
            <div class="card shadow-mb-4">
                <div class="card-header bg-info">
                    <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-tasks"></i> Project Siswa</h6>
                </div>
                <div class="card-body text-center">
                    @foreach ($kontaks as $kontak)
                        <li>{{ $kontak->jenis_kontak }} : {{ $kontak->pivot->deskripsi }}</li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>



@endsection
