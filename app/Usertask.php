<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usertask extends Model {
	protected $fillable = ['project_id','user_id','client_id','task_id','start_time','end_time','description','date'];
	protected $hidden = ['created_at', 'updated_at'];
	protected $table = 'user_tasks';

}