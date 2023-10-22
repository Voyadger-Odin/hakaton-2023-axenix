<?php

namespace App\Http\Controllers;

use App\Models\Forklift;
use App\Models\ForkliftLog;
use DateInterval;
use DateTime;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function warehouses()
    {
        $warehouses = Forklift::select('warehouse')
            ->groupBy('warehouse')
            ->orderBy('warehouse')
            ->get();
        return response(json_encode($warehouses), 200)
            ->header('Content-Type', 'text/json');
    }

    public function stock()
    {
        return response(getStockJson(), 200)
            ->header('Content-Type', 'text/json');
    }

    public function forklifts($stock_id=null)
    {
        $forklifts = Forklift::select();

        if ($stock_id !== null){
            $forklifts = $forklifts->where('warehouse', '=', $stock_id)->limit(20);
        }
        return response(json_encode($forklifts->get()), 200)
            ->header('Content-Type', 'text/json');
    }

    public function get_analytics_forklift($forklift_id)
    {
        $date_from = request('date-from');
        $date_to = request('date-to');

        $logs = ForkliftLog::select()
        ->where([
            ['forklift_id', '=', $forklift_id],
            ['created_at', '>=', $date_from],
            ['created_at', '<=', $date_to],
        ])
        ->get();

        $lenght = 0;
        $tasks_count = 0;
        $time_work = new DateTime("00:00");
        $time_wait = new DateTime("00:00");
        $time_run_to_order = new DateTime("00:00");
        $time_back_with_order = new DateTime("00:00");


        $log_back = null;
        foreach ($logs as $log){
            $lenght += $log->length;
            if ($log->status === 'task_finished'){
                $tasks_count += 1;
            }

            if ($log_back !== null){
                $time_status = $log->created_at->diff($log_back->created_at);
                if ($log_back->status === 'wait'){
                    $time_wait->add($time_status);
                }
                if ($log_back->status === 'run_to_order'){
                    $time_run_to_order->add($time_status);
                }
                if ($log_back->status === 'back_with_order'){
                    $time_back_with_order->add($time_status);
                }
            }

            $log_back = $log;
        }
        if ($log_back !== null){
            $time_status = now()->diff($log_back->created_at);
            if ($log_back->status === 'wait'){
                $time_wait->add($time_status);
            }
            if ($log_back->status === 'run_to_order'){
                $time_run_to_order->add($time_status);
            }
            if ($log_back->status === 'back_with_order'){
                $time_back_with_order->add($time_status);
            }
        }

        $time_work->add((new DateTime("00:00"))->diff($time_run_to_order));
        $time_work->add((new DateTime("00:00"))->diff($time_back_with_order));

        $result = [
            'forkliftter_id' => $forklift_id,
            'length' => $lenght,
            'tasks_count' => $tasks_count,
            'time_work' => (new DateTime("00:00"))->diff($time_work)->format('%a д. %H:%I'),
            'time_wait' => (new DateTime("00:00"))->diff($time_wait)->format('%a д. %H:%I'),
            'time_run_to_order' => (new DateTime("00:00"))->diff($time_run_to_order)->format('%a д. %H:%I'),
            'time_back_with_order' => (new DateTime("00:00"))->diff($time_back_with_order)->format('%a д. %H:%I'),
        ];
        return response(json_encode($result), 200)
            ->header('Content-Type', 'text/json');
    }
}
