@extends('layoutadmin.main')

@section('content')

<h2>Update Mahasiswa</h2>

{{-- Form akan mengirimkan data dengan metode POST ke route /mahasiswa/update/{nim_mahasiswa} --}}
<form method="POST" action="/mahasiswa/update/{{ $dataMhs->nim_mahasiswa }}">
    {{ csrf_field() }}

    {{-- Input hidden untuk mengirimkan NIM yang lama (Primary Key) --}}
    <input type="hidden" name="nim" value="{{ $dataMhs->nim_mahasiswa }}">

    <div class="mb-3">
        <label class="form-label">NIM</label>
        {{-- NIM ditampilkan, tapi dinonaktifkan (disabled) karena merupakan Primary Key --}}
        <input type="text" class="form-control" value="{{ $dataMhs->nim_mahasiswa }}" disabled>
    </div>

    <div class="mb-3">
        <label class="form-label">NAMA</label>
        {{-- Nilai lama diisi sebagai default (value) --}}
        <input type="text" name="nama" class="form-control"
            value="{{ $dataMhs->nama_mahasiswa }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">ANGKATAN</label>
        <input type="year" name="angkatan" class="form-control"
            value="{{ $dataMhs->angkatan_mahasiswa }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">PRODI</label>
        <select name="prodi" class="form-control" required>
            {{-- Opsi default diisi dengan PRODI mahasiswa saat ini --}}
            <option value="{{ $dataMhs->kd_prodi }}">{{ $dataMhs->nama_prodi }}</option>
            
            @foreach ($dataProdi as $item)
                {{-- Hanya tampilkan PRODI yang BUKAN PRODI mahasiswa saat ini --}}
                @if ($item->kd_prodi != $dataMhs->kd_prodi)
                    <option value="{{ $item->kd_prodi}}">{{ $item->nama_prodi }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <a href="/mahasiswa" class="btn btn-secondary">KEMBALI</a>
    <button type="submit" class="btn btn-primary">UPDATE</button>
</form>

@endsection