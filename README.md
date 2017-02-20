##OpenStack PHP SDK - Issue report

This project aims to provide minimal, reproducible bug report to project [php-opencloud/openstack](https://github.com/php-opencloud/openstack/)

### 1. Clone this repo and install dependencies

```bash
$ git clone git@github.com:haphan/openstack-issue-report.git && cd openstack-issue-report
$ composer install -vvv
```
Alternatively you can directly fork this project and make changes.

### 2. Populate credentials and run debug

Edit `debug.php` and modify `$params` with your OpenStack credentials. 
The template code enable debug information to print directly to your console.
 
Write code that you think having an issue at the end.


```php
<?php

require 'vendor/autoload.php';

use GuzzleHttp\MessageFormatter;
use Monolog\Logger;

$logger = new Logger('console');
$messageFormatter = new MessageFormatter(MessageFormatter::DEBUG);

$params = [
    'authUrl' => 'http://1.2.3.4:5000/v3',
    'region' => 'RegionOne',
    'user' => [
        'name' => 'foo',
        'password' => 'notasecretpassword',
        'domain' => ['id' => 'default'],
    ],
    'scope' => ['project' => ['id' => 'aaaaabbbbccccdddeeefffff']],

    // enable debug mode
    'debugLog' => true,
    'logger' => $logger,
    'messageFormatter' => $messageFormatter,
];

$openstack = new OpenStack\OpenStack($params);


//Put your code below this line
dump($openstack->computeV2()->listServers());
```

Execute via command line and log all output to `output.log`

```bash
$ php debug.php | tee output.log
```

### 3. Report the issue

- Push your code to a public github repository
- Additionally, you can attach `output.log` when creating an issue in `php-opencloud/openstack`