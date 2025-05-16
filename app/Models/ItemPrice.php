<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemPrice extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'item_no',
        'customer_name',
        'customer_code',
        'item_description',
        'min_order_qty',
        'unit_price',
        'currency',
        'rev_no'
    ];
    // protected $fillable = [
    //     'posting_date',
    //     'delv_date',
    //     'order_no',
    //     'reference_po',
    //     'po_qty',
    //     'delv_qty'
    // ];
}
