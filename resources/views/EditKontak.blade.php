@extends('layout.admin')
@section('title', 'EDIT Kontak')
@section('content-title', 'EDIT Kontak')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{ route('masterkontak.update', $kontak->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="hidden" name="siswa_id" value="{{ $kontak->siswa_id }}">
                            <label for="jenis_kontak">Jenis Kontak</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="jenis_kontak" name="jenis_kontak_id">  
                                        @foreach ($jenis as $item)
                                            <option value="{{ $item->id }}">{{ $item->jenis_kontak }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name='deskripsi'
                                value="{{ $kontak->deskripsi }}">
                        </div>
                        <div class="form-group">
                            {{-- <a href="submit" class="btn btn-success">Simpan</a> --}}
                            <input type="submit" class="btn btn-success" value="Simpan">
                            <a href="{{ route('masterkontak.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
