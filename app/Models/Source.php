<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;
    protected $table = 'sources';
    protected $fillable = [
        'source_name',
    ];
    public function leads()
    {
        return $this->belongsTo(Leads::class, 'id')->select('id', 'source_id');
    }
}
