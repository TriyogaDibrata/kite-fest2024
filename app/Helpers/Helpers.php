<?php

use App\Charts\ParticipantChart;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Request;

function activeMenu($uri = '') {
    if(Request::is(Request::segment(1) . '/' . $uri . '/*') || Request::is(Request::segment(1) . '/' . $uri) || Request::is($uri)) {
        return 'active';
    }
}

function activeDropdownMenu($uri = '') {
    if(Request::segment(1) == $uri) {
        return 'active open';
    }
}

function activeSubmenu($uri = '') {
    if(Request::segment(1) == $uri) {
        return 'expand';
    }
}

function formatTimeHi($time) {
    return Carbon::parse($time)->format('H:i');
}

function formattedDate($date) {
    return Carbon::parse($date)->locale('id_ID')->isoFormat('dddd, DD MMMM YYYY');
}

function generateAcronym($string) {
    $words = explode(" ", $string);
    $acronym = "";
    foreach ($words as $w) {
    $acronym .= mb_substr($w, 0, 1);
    }
    return $acronym;
}

function generateUniqeId($table = '', $field = '', $length = 0, $prefix = '') {
    $unique_id = IdGenerator::generate(['table' => $table, 'field' => $field, 'length' => $length, 'prefix' => $prefix, 'reset_on_prefix_change' => false]);
    return $unique_id;
}

function pChart() : \ArielMejiaDev\LarapexCharts\HorizontalBar {
    $chart = LarapexChart::horizontalBarChart()
    ->setTitle('Los Angeles vs Miami.')
    ->setSubtitle('Wins during season 2021.')
    ->setColors(['#FFC107', '#D32F2F'])
    ->addData('San Francisco', [6, 9, 3, 4, 10, 8])
    ->addData('Boston', [7, 3, 8, 2, 6, 4])
    ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);

    return $chart;
}