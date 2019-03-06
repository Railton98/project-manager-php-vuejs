<?php

$app->middleware('before', function ($container) {
    session_start();
});
$app->middleware('before', function ($container) {
    header('Content-Type: text/plain');
});
$app->middleware('after', function ($container) {
    echo 'after';
});
$app->middleware('after', function ($container) {
    echo 'after 2';
});
