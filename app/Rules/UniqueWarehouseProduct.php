<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\WarehouseProduct;


class UniqueWarehouseProduct implements ValidationRule
{
    protected $warehouse_id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($warehouse_id)
    {
        $this->warehouse_id = $warehouse_id;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        [$warehouseId, $productIds] = [$this->warehouse_id, (array) $value];

        $duplicates = WarehouseProduct::where('warehouse_id', $warehouseId)
            ->whereIn('product_id', $productIds)
            ->count();
    
        if ($duplicates > 0) {
            $fail("The product already exists in the warehouse.");
        }
    }    
}
