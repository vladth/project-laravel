<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    
    use Notifiable, LogsActivity;
    
    protected $table = 'productos';

    protected $fillable = [
    	'idcategoria', 'codigo', 'nombre', 'descripcion', 'precio_venta', 'descuento', 'stock', 'condicion'
    ];

    protected static $logAttributes = [
    	'idcategoria', 'codigo', 'nombre', 'descripcion', 'precio_venta', 'descuento', 'stock', 'condicion'
    ];

    public function tapActivity(Activity $activity, string $eventName)
     {
        Activity::saving(function (Activity $activity) {
            $activity->properties = $activity->properties->put('ip', request()->ip());
        });
        
     }

}
