<?php

namespace App\Models;

use App\Traits\FileUploadTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{

    use HasFactory, SoftDeletes, FileUploadTrait;

    public $timestamps = true;

    protected $guarded = ['id'];


    protected $fillable = [
        'type', 'year','is_enabled','file_name','file_path','file_extension' , 'size_in_kb' , 'created_by','edited_by','hedge_fund_report_type','name'
    ];

    protected $hidden = [
        'deleted_at',
        'updated_at',
        'created_at',
    ];

    public function setFilePathAttribute($value)
    {
        $this->saveFile($value, 'file_path', "media/" . date('Y/m'));
    }


    public function getFilePathAttribute()
    {
        if (empty($this->attributes['file_path'])) {
            return config('app.url') . "/images/user.webp";
        } else {
            return $this->getFileUrl($this->attributes['file_path']);
        }
    }
}
