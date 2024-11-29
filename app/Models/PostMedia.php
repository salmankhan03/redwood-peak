<?php

namespace App\Models;

use App\Traits\FileUploadTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostMedia extends Model
{

    use HasFactory, SoftDeletes, FileUploadTrait;

    public $timestamps = true;

    protected $guarded = ['id'];

    protected $fillable = [
        'post_id', 'name','size_in_kb','path','extension','created_by'
    ];

    protected $hidden = [
        'deleted_at',
        'updated_at',
        'created_at',
    ];

    public function setPathAttribute($value)
    {
        $this->saveFile($value, 'path', "post_media/" . date('Y/m'));
    }

    public function getPathAttribute()
    {
        if (empty($this->attributes['path'])) {
            return config('app.url') . "/images/user.webp";
        } else {
            return $this->getFileUrl($this->attributes['path']);
        }
    }
}
