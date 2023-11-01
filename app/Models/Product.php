<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Media;
use App\Models\ClothingDescription;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Declaring mass assignable fields
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "name", "price", "description",
        "category_id", "supplier_id",
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array<string>
     */
    protected $with = [
        "category", "media", "description",
    ];

    /**
     * Get the Category that belongs to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get all of the images for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function media(): HasMany
    {
        return $this->hasMany(Media::class, 'id');
    }

    /**
     * Get the description for the Product
     *
     *  @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function description(): HasOne
    {
        return $this->hasOne(ClothingDescription::class);
    }

    /**
     * Get all of the reviews for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
