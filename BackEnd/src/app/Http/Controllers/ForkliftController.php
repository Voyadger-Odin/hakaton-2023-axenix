<?php

namespace App\Http\Controllers;

use App\Models\Forklift;
use Illuminate\Http\Request;

class ForkliftController extends Controller
{
    public function started_task()
    {
        $data = json_decode(request()->request->all()[0]);
        $forklift = createForkliftIfNotExist(
            $data->forklift_id,
            $data->warehouse_id
        );

        setForkliftStatus($forklift, 'run_to_order');
        addForkliftLog($data->forklift_id, 'run_to_order', 0);
        setForkliftTask($forklift, $data->task_id);
        return response('OK', 200)
            ->header('Content-Type', 'text/json');
    }

    public function finished_task()
    {
        $data = json_decode(request()->request->all()[0]);
        $forklift = createForkliftIfNotExist(
            $data->forklift_id,
            $data->warehouse_id
        );
        setForkliftStatus($forklift, 'wait');
        addForkliftLog($data->forklift_id, 'task_finished', 0);
        addForkliftLog($data->forklift_id, 'wait', 0);
        setForkliftTask($forklift, null);
        return response('OK', 200)
            ->header('Content-Type', 'text/json');
    }

    public function reach_the_point()
    {
        $data = json_decode(request()->request->all()[0]);
        $forklift = createForkliftIfNotExist(
            $data->forklift_id,
            $data->warehouse_id
        );
        checkPointForForklift($forklift, $data->check_point_name);
        return response('OK', 200)
            ->header('Content-Type', 'text/json');
    }

    public function reach_the_target()
    {
        $data = json_decode(request()->request->all()[0]);
        $forklift = createForkliftIfNotExist(
            $data->forklift_id,
            $data->warehouse_id
        );

        setForkliftStatus($forklift, 'back_with_order');


        $length = 0;
        foreach (getStockObject() as $key => $item){
            if ($item->target_rack_id === $data->target){
                foreach ($item->path_sequence as $sensor){
                    $length += $sensor->next_check_point_distance;
                }
                break;
            }
        }

        addForkliftLog($data->forklift_id, 'back_with_order', $length * 2);

        return response('OK', 200)
            ->header('Content-Type', 'text/json');
    }

    public function test($target)
    {
        $length = 0;
        foreach (getStockObject() as $key => $item){
            if ($item->target_rack_id === $target){
                foreach ($item->path_sequence as $sensor){
                    $length += $sensor->next_check_point_distance;
                }
                break;
            }
        }
        return response(json_encode($length), 200)
            ->header('Content-Type', 'text/json');
    }
}
