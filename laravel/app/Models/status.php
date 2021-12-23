<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    use HasFactory;

    # protected $table = 'csigaprojecthandlerdb';
    protected $table = 'status';

    public $timestamps = false;
	protected $primaryKey = 'ID';

    protected $fillable = ['description'];
}
