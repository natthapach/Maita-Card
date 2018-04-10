<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function user(){
        return $this->belongsTo("App\User", "user_id");
    }

    public function branch(){
        return $this->belongsTo("App\Branch", "branch_id");
    }
}
