<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityOutput extends Model
{
    use HasFactory;

    protected $table = 'activity_output';

    protected $primaryKey = 'activity_output_id';

    public $fillable = [
        'activity_id',
        'output_type',
        'output_value',
    ];

    public function activity() {
        return $this->belongsTo(Activity::class, 'activity_id');
    }
}
