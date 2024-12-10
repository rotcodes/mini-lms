<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'courseTitle'
            ]
        ];
    }

    // Define fillable attributes for mass assignment
    protected $fillable = [
        'courseTitle',
        'category_id',
        'instructor_id',
        'label_id',
        'price',
        'courseDuration',
        'overview',
        'desc',
        'image'
    ];

    // Define the relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Define the relationship with Instructor
    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }
}
