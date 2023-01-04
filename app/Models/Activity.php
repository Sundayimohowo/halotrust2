<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activity';

    protected $primaryKey = 'activity_id';

    public $fillable = [
        'activity_date',
        'task_code',
        'activity_type',
        'team_code',
        'contract_code',
    ];

    public $casts = [
        'activity_date' => 'date',
    ];

    public function outputs() {
        return $this->hasMany(ActivityOutput::class, 'activity_id');
    }

}
