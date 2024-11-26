<?php

namespace App\Models;

use App\Traits\FileUploadTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminPanelUser extends Model
{

    use HasFactory;

    public $timestamps = true;

    protected $guarded = ['id'];

    protected $fillable = [
        'name', 'username','email','role','role_id','password','status','send_user_notification'
    ];

    protected $hidden = [
        'deleted_at',
        'updated_at',
        'created_at',
    ];

    
}
