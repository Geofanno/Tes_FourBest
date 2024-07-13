<!DOCTYPE html>
<html>
<head>
    <title>Data Upload PDF</title>
</head>
<body>
    <h1>Data Upload Details</h1>
    <p>No Bukti: {{ $data->no_bukti }}</p>
    <p>Tanggal Bukti: {{ $data->tanggal_bukti }}</p>
    <p>NPWP Pemotong: {{ $data->npwp_pemotong }}</p>
    <p>Nama Pemotong: {{ $data->nama_pemotong }}</p>
    <p>Identitas Penerima: {{ $data->identitas_penerima }}</p>
    <p>Nama Penerima: {{ $data->nama_penerima }}</p>
    <p>Penghasilan Bruto: {{ $data->penghasilan_bruto }}</p>
    <p>PPH: {{ $data->pph }}</p>
    <p>Kode Objek Pajak: {{ $data->kode_objek_pajak }}</p>
    <p>Masa Pajak: {{ $data->masa_pajak }}</p>
    <p>Tahun Pajak: {{ $data->tahun_pajak }}</p>
    <p>Status: {{ $data->status }}</p>
    <p>Rev No: {{ $data->rev_no }}</p>
    <p>Posting: {{ $data->posting }}</p>
    <p>ID Sistem: {{ $data->id_sistem }}</p>
</body>
</html>
