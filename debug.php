<?php

require 'vendor/autoload.php';

use GuzzleHttp\MessageFormatter;
use Monolog\Logger;

$logger = new Logger('console');
$messageFormatter = new MessageFormatter(MessageFormatter::DEBUG);

$params = [
    'authUrl' => 'http://1.2.3.4:5000/v3',
    'region' => '{region}',
    'user' => [
        'name' => '{name}',
        'password' => '{password}',
        'domain' => ['id' => 'default'],
    ],
    'scope' => ['project' => ['id' => '{projectid}']],

    // enable debug mode
    'debugLog' => true,
    'logger' => $logger,
    'messageFormatter' => $messageFormatter,
];

$openstack = new OpenStack\OpenStack($params);


//Put your code below this line
dump(iterator_to_array($openstack->computeV2()->listServers()));
