<?php

namespace App\Models\Award;

use Illuminate\Database\Eloquent\Model;
use App\Models\Award\Traits\Attribute\Attribute;
use App\Models\Award\Traits\Relationship\Relationship;

class Award extends Model
{
    use Relationship,
        Attribute;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    protected $fillable = ["name", "image", "year", "created_at", "updated_at"];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    	$this->table = config("access.award_table");
    }
}
