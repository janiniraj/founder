<?php

namespace App\Models\Quote;

use Illuminate\Database\Eloquent\Model;
use App\Models\Quote\Traits\Attribute\Attribute;
use App\Models\Quote\Traits\Relationship\Relationship;

class Quote extends Model
{
    use Relationship,
        Attribute;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    protected $fillable = ["name", "content", "position", "image", "created_at", "updated_at"];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    	$this->table = config("access.quote_table");
    }
}
