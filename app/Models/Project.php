<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'phase',
        'priority',
        'status',
        'assigned',
        'assigned_to',
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

    public function getall()
    {
        return $this->all();
    }
    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
