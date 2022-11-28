@extends('layout.admin')
@section('title','Tambah Kontak')
@section('content-title','Tambah Kontak')
@section('content')
    
<div class="card shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card-body">
 
        <form action="{{route ('masterkontak.update' , $kontak->id )}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="jk">Jenis Kontak</label>
                <select type="text" class="form-control" id="jeniskontak" name="jeniskontak" value="">
                    @foreach ($jenis as $item)
                        <option value="{{ $item->id }}">{{ $item->jenis_kontak}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Deskripsi kontak</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" value=""></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success">
                <a href="{{ route('masterkontak.index') }}" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection