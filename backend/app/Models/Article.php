<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table="articles";
    protected $primarykey='id';
    protected $fillable=[
        "id_category",
        "id_sub_category",
        "Article_Name",
        "titre",
        "contenu",
        "active"
    ];
}
