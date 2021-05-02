<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDelete;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    protected $table = "tb_member";
    protected $primaryKey = "id_member";
    protected $guarded = [
        'id_member',
        'status'
    ];

}
