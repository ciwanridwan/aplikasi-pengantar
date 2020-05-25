<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengantar extends Model
{
    protected $table = 'pengantars';
    protected $primaryKey = 'id';
    protected $fillable = [
    'nik', 'nama', 'nomor_pengantar', 'tanggal_berlaku', 'tanggal_pengantar', 'keperluan', 'lain_lain'];
}
