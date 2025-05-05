<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleAccess extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'module_id', 'have_access'];


    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function module()
    {
        return $this->belongsTo(Module::class, 'id', 'module_id');
    }
}
