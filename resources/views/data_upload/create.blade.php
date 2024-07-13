@extends('layouts.app')

@section('content')
    <h2>Create Data Upload</h2>

    <form method="POST" action="{{ route('data_upload.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="no_bukti">No Bukti</label>
            <input type="text" class="form-control" id="no_bukti" name="no_bukti" required>
        </div>
        <div class="form-group">
            <label for="tanggal_bukti">Tanggal Bukti</label>
            <input type="date" class="form-control" id="tanggal_bukti" name="tanggal_bukti" required>
        </div>
        <div class="form-group">
            <label for="npwp_pemotong">NPWP Pemotong</label>
            <input type="text" class="form-control" id="npwp_pemotong" name="npwp_pemotong" value="{{ Auth::user()->npwp }}" readonly>
        </div>
        <div class="form-group">
            <label for="nama_pemotong">Nama Pemotong</label>
            <input type="text" class="form-control" id="nama_pemotong" name="nama_pemotong" value="{{ Auth::user()->name }}" readonly>
        </div>
        <div class="form-group">
            <label for="nama_penerima">Nama Penerima</label>
            <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" required>
        </div>
        <div class="form-group">
            <label for="identitas_penerima">Identitas Penerima</label>
            <input type="text" class="form-control" id="identitas_penerima" name="identitas_penerima" required>
        </div>
        <div class="form-group">
            <label for="penghasilan_bruto">Penghasilan Bruto</label>
            <input type="number" class="form-control" id="penghasilan_bruto" name="penghasilan_bruto" required>
        </div>
        <div class="form-group">
            <label for="pph">PPH</label>
            <input type="number" class="form-control" id="pph" name="pph" required>
        </div>
        <div class="form-group">
            <label for="kode_objek_pajak">Kode Objek Pajak</label>
            <input type="text" class="form-control" id="kode_objek_pajak" name="kode_objek_pajak" required>
        </div>
        <div class="form-group">
            <label for="masa_pajak">Masa Pajak</label>
            <input type="text" class="form-control" id="masa_pajak" name="masa_pajak" required>
        </div>
        <div class="form-group">
            <label for="tahun_pajak">Tahun Pajak</label>
            <input type="text" class="form-control" id="tahun_pajak" name="tahun_pajak" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name="status" required>
        </div>
        <div class="form-group">
            <label for="rev_no">Rev No</label>
            <input type="text" class="form-control" id="rev_no" name="rev_no" required>
        </div>
        <div class="form-group">
            <label for="posting">Posting</label>
            <input type="text" class="form-control" id="posting" name="posting" required>
        </div>
        <div class="form-group">
            <label for="id_sistem">ID Sistem</label>
            <input type="text" class="form-control" id="id_sistem" name="id_sistem" required>
        </div>
        <div class="form-group">
            <label for="file">File</label>
            <input type="file" class="form-control" id="file" name="file" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script>
        $(function() {
            $('#nama_penerima').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('api.perusahaan.search') }}",
                        data: {
                            term: request.term
                        },
                        dataType: "json",
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $('#nama_penerima').val(ui.item.value);
                    $('#identitas_penerima').val(ui.item.identitas);
                    return false;
                }
            });
        });
    </script>
@endsection
