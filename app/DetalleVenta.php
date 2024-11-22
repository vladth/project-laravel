<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    
    use Notifiable, LogsActivity;

    protected $table    = 'detalle_ventas';
    protected $fillable = [
        'idventa',
        'idproducto',
        'cantidad',
        'precio',
        'descuento',
    ];

    protected static $logAttributes = [
        'idventa',
        'idproducto',
        'cantidad',
        'precio',
        'descuento',
    ];

    public function tapActivity(Activity $activity, string $eventName)
     {
        Activity::saving(function (Activity $activity) {
            $activity->properties = $activity->properties->put('ip', request()->ip());
        });
        
     }

    public $timestamps = false;
}
