<?php


function GetServerIp(): string
{
    return '192.168.0.1';
}

function getWarehouses()
{
    $url = 'http://' . GetServerIp() . ':8100/api/warehouses';
    return json_decode(file_get_contents($url));
}
