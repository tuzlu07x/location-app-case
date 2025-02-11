<?php

return [
    'key' => env('API_KEY'),
    'limit' => env('API_RATE_LIMIT', 10),
    'decay' => env('API_RATE_LIMIT_DECAY', 60)
];
