<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'penduduks';
    protected $primaryKey = 'id';
    protected $fillable = [
    'nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'status', 'kewarganegaraan', 'alamat', 'pendidikan_terakhir', 'pekerjaan', 'rt', 'rw'];
}
