<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'travel_packages_id', 'user_id', 'additional_visa', 'transactions_total', 'transaction_status',
    ];

    protected $hidden = [

    ];

    public function details() {
        return $this -> hasMany(TransactionDetail::class, 'transactions_id', 'id');
    }

    public function travel_package() {
        return $this -> belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
    }

    public function user() {
        return $this -> belongsTo(User::class, 'user_id', 'id');
    }
}
