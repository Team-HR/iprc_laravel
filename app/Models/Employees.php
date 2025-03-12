<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Employees extends Model
{
    use HasFactory;
    

    public function spms_accounts() : HasOne
    {
        return $this->hasOne(SpmsAccounts::class,'employees_id');
    }

}
