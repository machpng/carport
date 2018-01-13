<?php
return [
    'url' => 'http://www.dx-79.com/actionapi/CarCode',
    'method' => [
        'all' => 'getCarCodeDT',
        'detail' => 'getCarPortDetail?carCode=code&tableName=name',
        'list' => 'getCarCodeDTPage?pagesize=2&currentPage=2',
        'statistics' => 'CountCarPort',
        'create' => 'createCarPort'
    ]
];