<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    
    use Notifiable, LogsActivity;

    protected $table    = 'detalle_compras';
    protected $fillable = [
        'idcompra',
        'idproducto',
        'cantidad',
        'precio',

    ];

    protected static $logAttributes = [
        'idcompra',
        'idproducto',
        'cantidad',
        'precio',

    ];


    public function tapActivity(Activity $activity, string $eventName)
     {
        Activity::saving(function (Activity $activity) {
            $activity->properties = $activity->properties->put('ip', request()->ip());
        });
        
     }

    public $timestamps = false;
}
