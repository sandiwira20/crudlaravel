@extends('layoutadmin.main')

@section('content')

    <h2>Perbarui Program Studi</h2>

    <form method="POST" action="/prodi/{{ $dataProdi->kd_prodi }}/update">
        {{ csrf_field() }}

        <div class="mb-3">
            <label class="form-label">Kode Prodi (Baru)</label>
            <input type="text" name="kd_prodi" class="form-control" value="{{ $dataProdi->kd_prodi }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Prodi</label>
            <input type="text" name="nama_prodi" class="form-control" value="{{ $dataProdi->nama_prodi }}" required>
        </div>

        <a href="/prodi" class="btn btn-secondary">KEMBALI</a>
        <button type="submit" class="btn btn-primary">UPDATE</button>
    </form>

@endsection