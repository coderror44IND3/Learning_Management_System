<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Organization extends Model
{
    use HasFactory;
    protected $table = 'table_organization';
    protected $filtable = [
        'university_organization',
        'major_organization',
        'year_organization',
        'date_organization',
        'table_students_id',
        'created_at',
        'updated_at'
    ];
    public function post(): BelongsTo
    {
        return $this->belongsTo(Students::class);
    }
}
