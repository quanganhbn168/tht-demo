<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasImageGallery;
use App\Traits\UploadImageTrait;

class Service extends Model
{
    use HasFactory, HasImageGallery, UploadImageTrait;

    protected $fillable = [
        'service_category_id',
        'name',
        'slug',
        'image',
        'banner',
        'description',
        'content',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class);
    }

}
