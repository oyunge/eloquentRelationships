<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tags(){
        //the second parameter on the relationship we 
        //pass the name of the intermediate table that's the pivot table
        //the third and the fourth parameter are the foriegn key(post_id, tag_id)
        //the naming convention of the pivot table laravel expects two models in alphabetical order
        // return $this->belongsToMany(Tag::class, 'post_tag', 'post_id' ,'tag_id');
        return $this->belongsToMany(Tag::class);

    }
}
