<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;

    # protected $table = 'csigaprojecthandlerdb';
	protected $table = 'project';

    public $timestamps = false;
	protected $primaryKey = 'ID';

    protected $fillable = ['name', 'description', 'status', 'contacts'];

}
