<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'vp_comment';
    protected $primaryKey = 'cmt_id';
    protected $guarded = [];
}
