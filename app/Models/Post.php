<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Comments;
class Post extends Model
{
    use HasFactory;

    protected $table='posts';

    protected $filable =[
        'category_id',
        'name',
        'slug',
        'description',
        'yt_iframe',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'status',
        'create_by'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
    public function comment()
    {
        return $this->hasMany(Comments::class,'post_id','id');
    }
}
