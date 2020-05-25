<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengantarRakyat extends Model
{
    protected $table = 'pengantar_rakyats';
    protected $primaryKey = 'id';
    protected $fillable = [
    'nik', 'nama', 'nomor_pengantar', 'keperluan', 'lain_lain'];
}
