<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Students extends Model
{
    use HasFactory;
    protected $table = 'table_students';
    protected $filtable = [
        'photo_students',
        'name_students',
        'birthday_students',
        'gender_students',
        'telp_students',
        'email_students',
        'address_students',
        'users_id',
        'created_at',
        'updated_at'
    ];
    public function post(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
