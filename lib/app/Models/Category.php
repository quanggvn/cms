<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'vp_categoies';
    protected $primaryKey = 'cate_id';
    protected $guarded = [];
}
