<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = "order_id";
    protected $guarded = [];
    public $timestamps = false;

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function ebook()
    {
        return $this->belongsTo(Ebook::class, 'ebook_id');
    }
}
