<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\kodeqr;
use App\Models\service;
class aset extends Model
{
    use HasFactory, HasUuids;
    
    

    protected $guarded = [];

    public function service(){
       return $this->hasMany(Service::class);
    }
    
}

// public $incrementing = false;
    // protected $keyType = 'string';

// protected static function boot(){
    //     parent::boot();

    //     static::creating(function($model){
    //         if($model->getKey() == null) {
    //             $model->setAttribute($model->getKeyName(), Str::uuid()->toString());
    //         }
    //     });
    // }