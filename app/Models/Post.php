<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $primaryKey = 'post_id';

    /**
     * @var mixed
     */
    private $title;
    /**
     * @var mixed|string
     */
    private $short_title;
    /**
     * @var mixed
     */
    private $description;
    /**
     * @var mixed
     */
    private $author_id;
    /**
     * @var mixed|string
     */
    private $img;

    /**
     * Get username.
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'author_id', 'id');
    }
}
