@extends('layoutadmin.main')

@section('content')

    <h2>Form Tambah Program Studi</h2>

    <form method="POST" action="/prodi/store">
        {{ csrf_field() }}

        <div class="mb-3">
            <label class="form-label">Kode Prodi</label>
            <input type="text" name="kd_prodi" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Prodi</label>
            <input type="text" name="nama_prodi" class="form-control" required>
        </div>

        <a href="/prodi" class="btn btn-secondary">KEMBALI</a>
        <button type="submit" class="btn btn-primary">SIMPAN</button>
    </form>

@endsection