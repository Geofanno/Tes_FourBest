@extends('layouts.app')

@section('title', 'Master Perusahaan')

@section('content')
    <h2>Master Perusahaan</h2>
    <a href="{{ route('master_perusahaan.create') }}" class="btn btn-primary mb-3">Create</a>
    @if ($perusahaans->isEmpty())
        <p>No companies found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>NPWP</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($perusahaans as $perusahaan)
                    <tr>
                        <td>{{ $perusahaan->nama_perusahaan }}</td>
                        <td>{{ $perusahaan->npwp }}</td>
                        <td>
                            <a href="{{ route('master_perusahaan.show', $perusahaan->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('master_perusahaan.edit', $perusahaan->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('master_perusahaan.destroy', $perusahaan->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
