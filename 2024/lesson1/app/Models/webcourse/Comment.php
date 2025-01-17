<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable=['title','content','report_id', 'creator_id'];


    public function user()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
