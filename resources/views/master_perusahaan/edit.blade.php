@extends('layouts.app')

@section('title', 'Edit Master Perusahaan')

@section('content')
    <h2>Edit Master Perusahaan</h2>
    <form method="POST" action="{{ route('master_perusahaan.update', $masterPerusahaan->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_perusahaan">Nama Perusahaan</label>
            <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" value="{{ $masterPerusahaan->nama_perusahaan }}" required>
        </div>
        <div class="form-group">
            <label for="npwp">NPWP</label>
            <input type="text" name="npwp" id="npwp" class="form-control" value="{{ $masterPerusahaan->npwp }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
