@extends('layoutadmin.main')

@section('content')

    {{-- Tambahkan id="example1" untuk mengaktifkan DataTables --}}
    <table class="table table-bordered table-striped" id="example1">
        <thead>
            <tr>
                <th>KODE PRODI</th>
                <th>NAMA PRODI</th>
                {{-- Pindahkan Tombol Tambah Data ke kolom header aksi --}}
                <th style="width: 150px;">
                    <a href="/prodi/create" class="btn btn-success btn-sm">Tambah Data</a>
                </th>
            </tr>
        </thead>
        <tbody>
            {{-- Hapus baris <tr> untuk tombol Tambah Data yang sebelumnya ada di
        <tbody> --}}

            @foreach ($dataProdi as $item)
                <tr>
                    <td>{{ $item->kd_prodi }}</td>
                    <td>{{ $item->nama_prodi }}</td>
                    <td>
                        {{-- Pastikan action menggunakan pola /prodi/edit/{id} --}}
                        <a href="/prodi/{{ $item->kd_prodi }}/edit" class="btn btn-sm btn-warning">Edit</a>

                        {{-- Pastikan action menggunakan pola /prodi/destroy/{id} --}}
                        <a href="/prodi/destroy/{{ $item->kd_prodi }}" class="btn btn-sm btn-danger"
                            onclick="return confirm('Yakin hapus prodi {{ $item->nama_prodi }}?');">
                            Hapus
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection