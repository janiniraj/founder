<?php

namespace App\Models\Speech;

use Illuminate\Database\Eloquent\Model;
use App\Models\Speech\Traits\Attribute\Attribute;
use App\Models\Speech\Traits\Relationship\Relationship;

class Speech extends Model
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
    	$this->table = config("access.speech_table");
    }
}
