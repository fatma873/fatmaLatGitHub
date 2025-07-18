<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category; // Sesuaikan dengan nama file dan class Category.php

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'description',
        'price',
        'stock',
        'category_id', // perhatikan ini
    ];

    /**
     * Relasi ke model Category (bukan Categories)
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
