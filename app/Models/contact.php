<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;

    # protected $table = 'csigaprojecthandlerdb';
    protected $table = 'contact';

    public $timestamps = false;
	protected $primaryKey = 'ID';

    protected $fillable = ['name', 'email'];
}
