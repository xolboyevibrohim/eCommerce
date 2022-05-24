<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'adress1',
        'adress2',
        'status',
        'message',
        'total_price',
        'tracking_no',
    ];
    public function orderitems(){
        return $this->hasMany(OrderItem::class);
    }
}
