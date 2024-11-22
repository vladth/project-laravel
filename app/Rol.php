<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;

class Rol extends Model
{
	use Notifiable, LogsActivity;
    
    protected $table    = 'roles';
    protected $fillable = ['nombre', 'descripcion', 'condicion'];
    protected static $logAttributes = ['nombre', 'descripcion', 'condicion'];
    public $timestamps  = false;

    public function users()
    {

        return $this->hasMany('App\User');
    }

    public function tapActivity(Activity $activity, string $eventName)
     {
        Activity::saving(function (Activity $activity) {
            $activity->properties = $activity->properties->put('ip', request()->ip());
        });
        
     }
}
