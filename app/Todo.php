<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable=['title', 'description', 'reference', 'priority', 'category'];
    
    public function relation()
    {
        return $this->hasOne('App\Category');
    }
}