<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table = 'media';
    protected $fillable = [
        'media_name',
    ];
    public function leads()
    {
        return $this->belongsTo(Leads::class, 'id')->select('id', 'media_id');
    }
}
