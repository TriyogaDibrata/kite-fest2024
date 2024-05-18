<?php

use Carbon\Carbon;
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

function generateAcronym($string) {
    $words = explode(" ", $string);
    $acronym = "";
    foreach ($words as $w) {
    $acronym .= mb_substr($w, 0, 1);
    }
    return $acronym;
}