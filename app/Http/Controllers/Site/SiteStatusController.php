<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteStatusController extends Controller
{
    public function changeSiteStatus()
    {
        if (auth()->user()->role === "admin") {
            if (DB::table('settings')->count() <= 0) {
                DB::table('settings')->insert([
                    'site_status' => 1
                ]);

            } else {
                $val = DB::table('settings')->first();
                if ($val->site_status === 1) {
                    DB::table('settings')->limit(1)->update([
                        'site_status' => 0
                    ]);
                } else if($val->site_status === 0) {
                    DB::table('settings')->limit(1)->update([
                        'site_status' => 1
                    ]);
                }
            }
        } else {
            return redirect()->back();
        }
    }
}
