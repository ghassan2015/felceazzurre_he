<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;

class DashboardController extends Controller
{
    //

    public function index() {
        $data['total']=0;
        $data['breadcrumbs'][0]['link'] = route('admin.index');
        $data['breadcrumbs'][0]['title'] ='الرئيسية';
        $ana= Analytics::fetchVisitorsAndPageViews(Period::days(30));
        foreach ($ana as $val) {
            $data['total']+= $val['visitors'];
        }
        $data['browsers'] =Analytics::fetchTopBrowsers(Period::days(30));
        $data['userTypes'] =Analytics::fetchUserTypes(Period::days(30));

        $data['pageViews'] =Analytics::fetchVisitorsAndPageViews(Period::days(30));
        return view('admin.index',$data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function statistics(Request $request) {
        $analytics = Analytics::fetchTotalVisitorsAndPageViews(Period::days(30));
        $analytics_data = $analytics->map(function ($analytic){
            return ['y' => $analytic['date']->format('Y-m-d'), 'a' => $analytic['visitors']];
        });
        return $analytics_data;
    }
}
