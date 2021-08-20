<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employees;

class Companies extends Model
{
    use HasFactory;

    protected $table = 'companies';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'logo',
        'website'
    ];

    /**
     * One-to-One relations with Employees
     *
     * @return \Illuminate\Database\Eloquent\Relations\OnetoOne
     */
    public function employees()
    {
        return $this->hasMany(Employees::class, 'company_id', 'id');
    }
}
