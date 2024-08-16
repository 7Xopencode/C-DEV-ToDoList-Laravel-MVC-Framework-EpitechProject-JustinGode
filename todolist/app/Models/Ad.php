<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ad extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'user_id',
        'categorie_id',
        'location_id',
        'image',
    ];

    protected $primaryKey = 'id';


    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }

  /*   public function condition(): BelongsTo
    {
        return $this->belongsTo(Condition::class);
    } */

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }


    public function photo(): HasMany
    {
        return $this->hasMany(Photo::class);
    }
}
