<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name'=> $row['name'],
            'sku'=> $row['sku'],
            'new_price'=> $row['new_price'],
            'old_price'=> $row['old_price'],
            'quantity'=> $row['quantity'],
            'size'=> $row['size'],
            'add_by'=> $row['add_by'],
            'image'=> $row['image'],
            'details'=> $row['details'],
            'measurement'=> $row['measurement'],
            'whole_sell_persentage'=> $row['whole_sell_persentage'],
            'whole_sell_quantity'=> $row['whole_sell_quantity'],
            'colors'=> $row['colors'],
            'shipping_time'=> $row['shipping_time'],
            'category_id'=> $row['category_id'],
            'sub_category_id'=> $row['sub_category_id'],
            'child_category_id'=> $row['child_category_id'],
            'status'=> $row['status'],
            'brand_id'=> $row['brand_id'],
        ]);
    }
}
