<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = "tb_member";
    protected $primaryKey = "id_member";
    protected $guarded = ['id_member'];
}
