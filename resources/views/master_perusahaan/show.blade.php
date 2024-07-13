@extends('layouts.app')

@section('title', 'View Master Perusahaan')

@section('content')
    <h2>View Master Perusahaan</h2>
    <p><strong>Name:</strong> {{ $masterPerusahaan->nama_perusahaan }}</p>
    <p><strong>NPWP:</strong> {{ $masterPerusahaan->npwp }}</p>
    <a href="{{ route('master_perusahaan.index') }}" class="btn btn-secondary">Back</a>
@endsection
