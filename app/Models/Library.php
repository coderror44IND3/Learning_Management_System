<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Library extends Model
{
    use HasFactory;

    protected $table = 'table_course';
    protected $filtable = [
        'course_univesity',
        'date_univesity',
        'deksripsi_univesity',
        'created_at',
        'updated_at'
    ];
    public function orders(): HasMany
    {
        return $this->hasMany(Classroom::class);
    }
}
