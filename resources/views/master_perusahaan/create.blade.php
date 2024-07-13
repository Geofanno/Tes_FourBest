@extends('layouts.app')

@section('title', 'Create Master Perusahaan')

@section('content')
    <h2>Create Master Perusahaan</h2>
    <form method="POST" action="{{ route('master_perusahaan.store') }}">
        @csrf
        <div class="form-group">
            <label for="nama_perusahaan">Nama Perusahaan</label>
            <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="npwp">NPWP</label>
            <input type="text" name="npwp" id="npwp" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
