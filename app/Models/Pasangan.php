<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Tambahkan ini

class Pasangan extends Model
{
    use HasFactory;

    // Pastikan nama tabelnya benar.
    protected $table = 'pasangan';

    // Primary key untuk tabel 'pasangan' adalah 'id_pasangan'
    protected $primaryKey = 'id_pasangan';
    public $incrementing = true; // Jika id_pasangan auto-increment
    protected $keyType = 'int';

    // Kolom-kolom yang bisa diisi (fillable)
    protected $fillable = [
        'id_suami',
        'id_istri',
        'tanggal_menikah',
        'status',
        'created_by',
    ];

    // Relasi ke User (Suami)
    public function suami(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_suami', 'id_user');
    }

    // Relasi ke User (Istri)
    public function istri(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_istri', 'id_user');
    }
}