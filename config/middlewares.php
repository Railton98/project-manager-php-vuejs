<?php

$middlewares = [
    'before' => [
        function ($container) {
            echo 'before';
        },
        function ($container) {
            echo 'before 2';
        }
    ],
    'after' => [
        function ($container) {
            echo 'after';
        },
        function ($container) {
            echo 'after 2';
        }
    ]
];
