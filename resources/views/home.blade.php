@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h2>Welcome, {{ Auth::user()->name }}</h2>
    <p>You are logged in as User</p> <!-- Menghapus referensi ke roles -->

    <h3>Master Perusahaan</h3>
    @if ($perusahaans && $perusahaans->isEmpty())
        <p>No companies found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>NPWP</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($perusahaans as $perusahaan)
                    <tr>
                        <td>{{ $perusahaan->nama_perusahaan }}</td>
                        <td>{{ $perusahaan->npwp }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h3>Data Upload</h3>
    @if ($uploads && $uploads->isEmpty())
        <p>No uploads found.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No Bukti</th>
                        <th>Tanggal Bukti</th>
                        <th>NPWP Pemotong</th>
                        <th>Nama Pemotong</th>
                        <th>Identitas Penerima</th>
                        <th>Nama Penerima</th>
                        <th>Penghasilan Bruto</th>
                        <th>PPH</th>
                        <th>Kode Objek Pajak</th>
                        <th>Masa Pajak</th>
                        <th>Tahun Pajak</th>
                        <th>Status</th>
                        <th>Rev No</th>
                        <th>Posting</th>
                        <th>ID Sistem</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($uploads as $upload)
                        <tr>
                            <td>{{ $upload->no_bukti }}</td>
                            <td>{{ $upload->tanggal_bukti }}</td>
                            <td>{{ $upload->npwp_pemotong }}</td>
                            <td>{{ $upload->nama_pemotong }}</td>
                            <td>{{ $upload->identitas_penerima }}</td>
                            <td>{{ $upload->nama_penerima }}</td>
                            <td>{{ $upload->penghasilan_bruto }}</td>
                            <td>{{ $upload->pph }}</td>
                            <td>{{ $upload->kode_objek_pajak }}</td>
                            <td>{{ $upload->masa_pajak }}</td>
                            <td>{{ $upload->tahun_pajak }}</td>
                            <td>{{ $upload->status }}</td>
                            <td>{{ $upload->rev_no }}</td>
                            <td>{{ $upload->posting }}</td>
                            <td>{{ $upload->id_sistem }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
@endsection
