<?php
declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App
 */
class Product extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'active',
        'name',
        'description',
        'price',
    ];
    
    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
