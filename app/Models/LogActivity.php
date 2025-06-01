<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    protected $table = 'activity_log';
    protected $primaryKey = 'id_activity';
    public $timestamps = false; // karena pakai kolom timestamp manual
    protected $fillable = [
        'id_user',
        'username',
        'aksi',
        'timestamp',
        'ip_address',
    ];

    // Relasi ke user (opsional, kalau mau)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
