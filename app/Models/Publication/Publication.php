<?php

namespace App\Models\Publication;

use Illuminate\Database\Eloquent\Model;
use App\Models\Publication\Traits\Attribute\Attribute;
use App\Models\Publication\Traits\Relationship\Relationship;

class Publication extends Model
{
    use Relationship,
        Attribute;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    protected $fillable = ["name", "year", "content", "url", "image", "created_at", "updated_at"];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    	$this->table = config("access.publication_table");
    }
}
