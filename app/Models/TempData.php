<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempData extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'phase',
        'priority',
        'status',
        'assigned',
        'user_id',
        'reassigned_by',
        'assigned_date',
        'reassigned_date',
        'due_date',
        'created_by',
        'modified_by',
        'deleted_by',
        'has_documents',
        'has_images',


    ];

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
