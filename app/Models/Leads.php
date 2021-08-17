<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;
    protected $table = 'leads';
    protected $fillable = [
        'leads_id',
        'leads_name',
        'leads_email',
        'leads_phone',
        'source_id',
        'media_id',
        'status_id'
    ];
    public function source()
    {
        return $this->belongsTo(Source::class)->select('id','source_name');
    }
    public function media()
    {
        return $this->belongsTo(Media::class)->select('id','media_name');
    }
    public function status()
    {
        return $this->belongsTo(Status::class)->select('id','status_name');
    }
}

