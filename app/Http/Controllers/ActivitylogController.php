<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\Activitylog\Models\Activity;

class ActivitylogController extends Controller
{
    //
    public function index()
    {
        $logItems = Activity::with('causer')
            ->orderBy('id', 'desc')
            ->paginate(6000000000000000000);
        $cont = 0 ;
        return view('log.index',['logItems'=> $logItems,'cont'=>$cont]);

    }  

    public function show($id)
    {
        $logItems = DB::table('activity_log')
            ->where('activity_log.id', '=', $id)
            ->get();

        return view('log.show',['logItems'=> $logItems]);
    } 
}
