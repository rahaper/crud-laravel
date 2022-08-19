<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundMaster extends Model
{
    use HasFactory;
    
    protected $table = 'fund_master';
    public const CREATED_AT = 'createdDateTime';
    public const UPDATED_AT = 'updatedDateTime';

    protected $primaryKey = 'fundCode';

}
