<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Example.
 *
 * @package namespace App\Models;
 * @property string $name
 * @property Date $created_at
 * @property Date $updated_at
 */
class Example extends Model implements Transformable
{
    use SoftDeletes;
    use TransformableTrait;

    protected $table = 'examples';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name'];
}
