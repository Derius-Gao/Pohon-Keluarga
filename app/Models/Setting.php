<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings'; // sesuaikan nama tabelnya
    protected $fillable = ['key', 'value'];

    public $timestamps = false;

    // Ambil nilai setting berdasar key, dengan default jika tidak ada
    public static function getValue($key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    // Simpan/update nilai setting berdasar key
    public static function setValue($key, $value)
    {
        $setting = static::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
        return $setting;
    }
}
