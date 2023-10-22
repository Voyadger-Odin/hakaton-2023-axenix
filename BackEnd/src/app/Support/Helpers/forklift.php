<?php

use App\Models\Forklift;
use App\Models\ForkliftLog;

// Получить задание
function getForklift($forklift_id): Forklift | null
{
    return Forklift::find($forklift_id);
}

function createForkliftIfNotExist($id, $warehouse): Forklift
{
    $forklift = Forklift::select()
        ->where('id', '=', $id)
        ->first();
    if ($forklift == null){
        $forklift = new Forklift;
        $forklift->id = $id;
        $forklift->warehouse = $warehouse;
        $forklift->last_to = date('Y-m-d');
        $forklift->save();
    }
    return $forklift;
}

function checkPointForForklift($forklift, $point_name)
{
    return $forklift->update([
        'position' => $point_name
    ]);
}

function setForkliftStatus($forklift, $status)
{
    return $forklift->update([
        'status' => $status
    ]);
}

function setForkliftTask($forklift, $task_id)
{
    return $forklift->update([
        'task_id' => $task_id
    ]);
}

function addForkliftLog($forklift_id, $status, $length)
{
    $forklift = new ForkliftLog();
    $forklift->forklift_id = $forklift_id;
    $forklift->status = $status;
    $forklift->length = $length;
    $forklift->save();
}


function getStockJson()
{
    return '{"1": {"path_sequence": [{"check_point_id": 1, "check_point_name": "K1", "next_check_point_distance": 5}, {"check_point_id": 2, "check_point_name": "K2", "next_check_point_distance": 10}, {"check_point_id": 3, "check_point_name": "K3", "next_check_point_distance": 10}], "target_rack_id": "X1"}, "2": {"path_sequence": [{"check_point_id": 1, "check_point_name": "K1", "next_check_point_distance": 5}, {"check_point_id": 2, "check_point_name": "K2", "next_check_point_distance": 10}, {"check_point_id": 3, "check_point_name": "K3", "next_check_point_distance": 15}, {"check_point_id": 4, "check_point_name": "K4", "next_check_point_distance": 10}], "target_rack_id": "X2"}, "3": {"path_sequence": [{"check_point_id": 1, "check_point_name": "K1", "next_check_point_distance": 5}, {"check_point_id": 2, "check_point_name": "K2", "next_check_point_distance": 5}, {"check_point_id": 5, "check_point_name": "K5", "next_check_point_distance": 10}, {"check_point_id": 6, "check_point_name": "K6", "next_check_point_distance": 10}], "target_rack_id": "X3"}, "4": {"path_sequence": [{"check_point_id": 1, "check_point_name": "K1", "next_check_point_distance": 5}, {"check_point_id": 2, "check_point_name": "K2", "next_check_point_distance": 5}, {"check_point_id": 5, "check_point_name": "K5", "next_check_point_distance": 10}, {"check_point_id": 6, "check_point_name": "K6", "next_check_point_distance": 15}, {"check_point_id": 7, "check_point_name": "K7", "next_check_point_distance": 10}], "target_rack_id": "X4"}, "5": {"path_sequence": [{"check_point_id": 1, "check_point_name": "K1", "next_check_point_distance": 5}, {"check_point_id": 2, "check_point_name": "K2", "next_check_point_distance": 5}, {"check_point_id": 5, "check_point_name": "K5", "next_check_point_distance": 5}, {"check_point_id": 8, "check_point_name": "K8", "next_check_point_distance": 10}, {"check_point_id": 9, "check_point_name": "K9", "next_check_point_distance": 5}], "target_rack_id": "X5"}, "6": {"path_sequence": [{"check_point_id": 1, "check_point_name": "K1", "next_check_point_distance": 5}, {"check_point_id": 2, "check_point_name": "K2", "next_check_point_distance": 5}, {"check_point_id": 5, "check_point_name": "K5", "next_check_point_distance": 5}, {"check_point_id": 8, "check_point_name": "K8", "next_check_point_distance": 10}, {"check_point_id": 9, "check_point_name": "K9", "next_check_point_distance": 15}, {"check_point_id": 10, "check_point_name": "K10", "next_check_point_distance": 10}], "target_rack_id": "X6"}}';
}

function getStockObject()
{
    return json_decode(getStockJson());
}
