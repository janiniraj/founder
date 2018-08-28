<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;
use App\Models\News\Traits\Attribute\Attribute;
use App\Models\News\Traits\Relationship\Relationship;

class News extends Model
{
    use Relationship,
        Attribute;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    protected $fillable = ["name", "slug", "content", "excerpt", "image", "created_at", "updated_at"];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    	$this->table = config("access.news_table");
    }
}
