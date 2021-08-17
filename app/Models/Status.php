<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'statuses';
    protected $fillable = [
        'status_name',
    ];
    public function leads()
    {
        return $this->belongsTo(Leads::class, 'id')->select('id', 'status_id');
    }

}
