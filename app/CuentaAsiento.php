<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Database\Eloquent\Model;

class CuentaAsiento extends Model
{
    
    use Notifiable, LogsActivity;

    protected $table    = 'cuenta_asientos';
    protected $fillable = [
        'idasiento', 'idcuenta', 'debe', 'haber',
    ];

    protected static $logAttributes = [
        'idasiento', 'idcuenta', 'debe', 'haber',
    ];

    public function tapActivity(Activity $activity, string $eventName)
     {
        Activity::saving(function (Activity $activity) {
            $activity->properties = $activity->properties->put('ip', request()->ip());
        });
        
     }

    public $timestamps = true;
}
