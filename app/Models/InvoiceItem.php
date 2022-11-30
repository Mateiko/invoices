<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'quantity',
        'price',
        'discount',
        'total_price',
        'description',
        'unit_of_measure_id',
        'invoice_id'
    ];

    public function unitOfMeasure()
    {
        return $this->belongsTo(UnitOfMeasure::class, 'unit_of_measure_id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
