@extends('layouts.app')

@section('title', 'Data Upload')

@section('content')
    <h2>Data Upload</h2>
    
    <a href="{{ route('data_upload.create') }}" class="btn btn-primary mb-3">Create Data Upload</a>
    
    @if ($uploads->isEmpty())
        <p>No data uploads found.</p>
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
                        <th>File</th>
                        
                        <th>Actions</th>

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
                            <td>
                                <a href="{{ route('data_upload.download', $upload->id) }}" class="btn btn-info btn-sm">Download</a>
                            </td>
                           
                            <td>
                                <a href="{{ route('data_upload.edit', $upload->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('data_upload.destroy', $upload->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
