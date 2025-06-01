<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'email',
        'password',
        'foto',
        'jenis_kelamin',
        'id_marga',
        'id_ayah',
        'id_ibu',
        'level',
    ];
    // Relasi ke marga
    public function marga()
    {
        return $this->belongsTo(Marga::class, 'id_marga', 'id_marga');
    }

    // Relasi ke ayah & ibu
    public function ayah()
    {
        return $this->belongsTo(User::class, 'id_ayah', 'id_user');
    }
    public function ibu()
    {
        return $this->belongsTo(User::class, 'id_ibu', 'id_user');
    }

    // Relasi ke anak (dari sisi ayah/ibu)
    public function anakAyah()
    {
        return $this->hasMany(User::class, 'id_ayah', 'id_user');
    }
    public function anakIbu()
    {
        return $this->hasMany(User::class, 'id_ibu', 'id_user');
    }

    // Relasi ke pasangan (ambil dari tabel pasangan)
    public function pasanganRow()
    {
        if ($this->jenis_kelamin === 'laki-laki') {
            return $this->hasOne(Pasangan::class, 'id_suami', 'id_user');
        } else {
            return $this->hasOne(Pasangan::class, 'id_istri', 'id_user');
        }
    }

    // Ambil pasangan User (User model, bukan Pasangan model)
    public function pasangan()
    {
        $row = $this->pasanganRow()->first();
        if (!$row) return null;
        if ($this->jenis_kelamin === 'laki-laki') {
            return User::find($row->id_istri);
        } else {
            return User::find($row->id_suami);
        }
    }

    // Gabungan anak dari ayah dan ibu (untuk pohon keluarga)
public function anak()
{
    return $this->anakAyah->merge($this->anakIbu)->unique('id_user');
}
}