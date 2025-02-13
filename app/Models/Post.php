<?php

namespace App\Models;

use App\Traits\FileUploadTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use HasFactory, SoftDeletes, FileUploadTrait;

    public $timestamps = true;

    protected $guarded = ['id'];

    protected $fillable = [
        'title', 'category','content','created_by','is_disabled','year','name'
    ];

    protected $hidden = [
        'deleted_at',
        'updated_at',
        'created_at',
    ];

    public function media(){

        return $this->hasMany(PostMedia::class , "post_id" ,"id");

    }

    public function thumbnail(){

        return $this->hasOne(PostMedia::class , "post_id" ,"id")->where('is_thumbnail','=', 1)->latest();

    }
}
