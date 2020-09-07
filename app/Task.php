<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //allowing mass assignment
    protected $fillable = ['title','completed'];
    //title is the title of the task to be stored in a Database
    //completed , this field will indicate whether a task is completed or // NOTE:

}
