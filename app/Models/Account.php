<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table = 'accounts';
    protected $guarded = [];

    public function currency_data(){
        return $this->belongsTo(Currency::class,'currency');
    }

    public function transactions(){
        return $this->hasMany(Transaction::class,'account_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function getBalanceAttribute(){
        $sum = 0;
        if (isset($this->transactions) && count($this->transactions) > 0)
            $sum = $this->transactions()->sum('amount');
        return $sum;
    }
}
