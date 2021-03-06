<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    
    protected $fillable = [
        "name",
        "description",
        "cost_price",
        "selling_price",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "created_at",
        "updated_at",
    
    ];
    
    
    
    protected $appends = ['resource_url', 'remaining_stock'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/products/'.$this->getKey());
    }

    public function inventories() {
        return $this->hasMany(Inventory::class, 'product_id');
    }

    public function getRemainingStockAttribute() {
        $in = $this->inventories->sum('inventory_quantity');
        return $in;
    }
}
