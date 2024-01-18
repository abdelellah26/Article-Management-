<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table="admins";
    protected $primarykey='id';
    protected $fillable=[
        "id_user",
    ];
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
