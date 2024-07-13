<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataUploadsTable extends Migration
{
    public function up()
    {
        Schema::create('data_uploads', function (Blueprint $table) {
            $table->id();
            $table->string('no_bukti');
            $table->date('tanggal_bukti');
            $table->string('npwp_pemotong');
            $table->string('nama_pemotong');
            $table->string('identitas_penerima');
            $table->string('nama_penerima');
            $table->decimal('penghasilan_bruto', 15, 2);
            $table->decimal('pph', 15, 2);
            $table->string('kode_objek_pajak');
            $table->string('masa_pajak');
            $table->year('tahun_pajak');
            $table->string('status');
            $table->integer('rev_no');
            $table->string('posting');
            $table->string('id_sistem');
            $table->string('file_path')->nullable(); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_uploads');
    }
}
