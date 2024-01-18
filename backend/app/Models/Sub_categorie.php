<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_categorie extends Model
{
    use HasFactory;
    protected $table="sub_categories";
    protected $primarykey='id';
    protected $fillable=[
        "name",
        "id_category"
    ];
    public function category(){
        return $this->belongsTo(Categorie::class, 'id_category');
    }
}
