<?php

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