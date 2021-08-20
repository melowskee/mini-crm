<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Companies;

class Employees extends Model
{
    use HasFactory;

    protected $table = 'employees';
    public $timestamps = true;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'company_id'
    ];

    /**
     * One-to-One relations with Companies
     *
     * @return \Illuminate\Database\Eloquent\Relations\OnetoOne
     */
    public function company()
    {
        return $this->belongsTo(Companies::class, 'company_id', 'id');
    }
}
