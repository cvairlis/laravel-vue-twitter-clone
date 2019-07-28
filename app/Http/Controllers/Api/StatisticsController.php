<?php

namespace App\Http\Controllers\Api;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class StatisticsController extends BaseController
{
    public function index()
    {
        $statistics = Cache::remember('statistics.cache',
            now()->addSeconds(60), function (){
                return DB::select("
                SELECT m.path route, m.total_views total_visits, n.username username_with_the_most_visits FROM
                (SELECT a.path, count(*) total_views FROM page_views a GROUP BY a.path) m,
                (SELECT DISTINCT w.path, w.username FROM
                (SELECT a.path, b.username, count(*) number_of_visit FROM page_views a, users b WHERE a.user_id = b.id
                GROUP BY a.path, b.username) w,
                (SELECT x.path, max(x.number_of_visit) max_visit FROM
                (SELECT a.path, b.username, count(*) number_of_visit FROM page_views a, users b WHERE a.user_id = b.id
                GROUP BY a.path, b.username) x GROUP BY x.path) y WHERE w.path = y.path AND w.number_of_visit = y.max_visit) n
                WHERE m.path = n.path;
                ");
        });

        return $this->sendResponse($statistics, 'Statistics retrieved successfully.');
    }
}
