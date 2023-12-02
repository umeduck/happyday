<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CountDayController extends Controller
{
    public static function changeToDate( $date ){
      $nowDate = date('Y-m-d');
      $nowYear = date('Y');
      $nextYear = $nowYear + 1;
      $cutDate = substr($date, 4, 10);
      $nowYearDate = $nowYear . substr($cutDate, 0);

      $time1 = strtotime($nowDate);
      $time2 = strtotime($nowYearDate);

      if ($time1 < $time2) {
        // 今年
        return $nowYearDate;
      } else if ($time1 > $time2) {
        // 来年
        $nextYearDate = $nextYear . substr($cutDate, 0);
        return $nextYearDate;
      } else {
        // 同じ日付
        return $date;
      }
    }

    public static function dayCount( $targetDate ){
      $today = Carbon::today();
      $nextDate = self::changeToDate( $targetDate );
      $count = $today->diffInDays( $nextDate );
      return $count;
    }
}

