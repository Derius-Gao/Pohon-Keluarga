<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marga extends Model
{
    use HasFactory;

    protected $table = 'marga';
    protected $primaryKey = 'id_marga';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_marga',
        'created_by',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'id_marga', 'id_marga');
    }
}