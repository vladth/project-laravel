<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    
    use Notifiable, LogsActivity;

    protected $table = 'proveedores';

    protected $fillable = [
    	'nombre', 'tipo_documento', 'num_documento', 'expedito', 'direccion', 'telefono', 'email', 'condicion'
    ];

    protected static $logAttributes = [
    	'nombre', 'tipo_documento', 'num_documento', 'expedito', 'direccion', 'telefono', 'email', 'condicion'
    ];

    public function tapActivity(Activity $activity, string $eventName)
     {
        Activity::saving(function (Activity $activity) {
            $activity->properties = $activity->properties->put('ip', request()->ip());
        });
        
     }
}
