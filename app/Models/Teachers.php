<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teachers extends Model
{
    use HasFactory;
    protected $table = 'table_teachers';
    protected $filtable = [
        'photo_teachers',
        'name_teachers',
        'birthday_teachers',
        'gender_teachers',
        'telp_teachers',
        'email_teachers',
        'address_teachers',
        'users_id',
        'created_at',
        'updated_at'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function orders(): HasMany
    {
        return $this->hasMany(Classroom::class);
    }
}
