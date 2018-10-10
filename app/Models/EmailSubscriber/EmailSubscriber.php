<?php

namespace App\Models\EmailSubscriber;

use Illuminate\Database\Eloquent\Model;
use App\Models\EmailSubscriber\Traits\Attribute\Attribute;
use App\Models\EmailSubscriber\Traits\Relationship\Relationship;

class EmailSubscriber extends Model
{
    use Relationship,
        Attribute;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    protected $fillable = ["email", "created_at", "updated_at"];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    	$this->table = config("access.email_subscriber_table");
    }
}
