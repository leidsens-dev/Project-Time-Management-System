<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projectuser extends Model {
	protected $fillable = ['project_id','user_id'];
	protected $hidden = ['id','created_at', 'updated_at'];
	protected $table = 'project_user';

}