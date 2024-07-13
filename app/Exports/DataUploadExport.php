<?php

namespace App\Exports;

use App\Models\DataUpload;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataUploadExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return DataUpload::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'No Bukti',
            'Tanggal Bukti',
            'NPWP Pemotong',
            'Nama Pemotong',
            'Identitas Penerima',
            'Nama Penerima',
            'Penghasilan Bruto',
            'PPH',
            'Kode Objek Pajak',
            'Masa Pajak',
            'Tahun Pajak',
            'Status',
            'Rev No',
            'Posting',
            'ID Sistem',
            'File Path',
            'Created At',
            'Updated At'
        ];
    }
}
