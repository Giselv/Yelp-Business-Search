<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        "business_id",
        "name",
        "address",
        "city",
        "state",
        "postal_code",
        "stars",
        "review_count",
        "is_open",
        "categories"
    ];
     
    protected $table = 'business';
                    
}
