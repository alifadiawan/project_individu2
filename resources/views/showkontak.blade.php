
@if ($kontak-> isEmpty())
<h6>Siswa belum memiliki Kontak </h6>
@else
@foreach ($kontak as $item)
    <div class="card">
        <div class="card-header">
            <strong>{{ $item->jenis_kontak_id}}</strong>
        </div>

        <div class="card-body">
            <strong>Tipe Sosmed</strong>
            <p>{{ $item->jenis_kontak}}</p>
            <strong>Deskripsi Project</strong>
            <p>{{ $item->pivot->deskripsi}}</p>
        </div>

        <div class="card-footer">
            <a href="{{ route('masterkontak.edit' , $item -> id) }}" class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></a>
            <a href="{{ route('masterkontak.hapus' , $item -> id) }}" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
        </div>
    </div>
@endforeach
@endif

