<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;
    public $fillable = [
        'user_id',
        'price',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
