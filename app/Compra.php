<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    
    use Notifiable, LogsActivity;

    protected $table = 'compras';

    protected $fillable = [
        'idproveedor','idusuario','tipo_identificacion','num_compra','fecha_compra','impuesto','total','estado',
    ];

    protected static $logAttributes = [
        'idproveedor','idusuario','tipo_identificacion','num_compra','fecha_compra','impuesto','total','estado',
    ];

    public function tapActivity(Activity $activity, string $eventName)
     {
        Activity::saving(function (Activity $activity) {
            $activity->properties = $activity->properties->put('ip', request()->ip());
        });
        
     }

    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor');
    }

}
