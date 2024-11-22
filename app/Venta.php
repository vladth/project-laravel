<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;

class Venta extends Model
{
	use Notifiable, LogsActivity;
    
    protected $table    = 'ventas';
    protected $fillable = [
        'idcliente', 'idusuario', 'codigo_control', 'tipo_identificacion', 'num_venta', 'fecha_venta', 'impuesto', 'total', 'venta_qr', 'estado',
    ];

    protected $dates = [
        'fecha_venta',
    ];

    protected static $logAttributes = [
        'idcliente', 'idusuario', 'codigo_control', 'tipo_identificacion', 'num_venta', 'fecha_venta', 'impuesto', 'total', 'venta_qr', 'estado',
    ];
    
    public function tapActivity(Activity $activity, string $eventName)
     {
        Activity::saving(function (Activity $activity) {
            $activity->properties = $activity->properties->put('ip', request()->ip());
        });
        
     }
}
