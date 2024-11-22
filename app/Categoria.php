<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    
    use Notifiable, LogsActivity;

    protected $table = 'categorias';

    protected $fillable = ['nombre', 'descripcion', 'condicion'];

	protected static $logAttributes = ['nombre', 'descripcion', 'condicion'];

	public function tapActivity(Activity $activity, string $eventName)
     {
        Activity::saving(function (Activity $activity) {
            $activity->properties = $activity->properties->put('ip', request()->ip());
        });
        
     }

}
