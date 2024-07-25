<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo', 'first_name', 'last_name', 'date_of_birth', 'gender', 'email', 'phone', 'address', 'date_hired', 'position_id', 'department_id', 'status'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
