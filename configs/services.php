<?php

use Corley\SmtpModule\Factory\SmtpFactory;

use Zend\Mail\Transport\TransportInterface;

return [
    'services' => [
        'factories' => [
            TransportInterface::class => SmtpFactory::class
        ],
        'aliases' => [
            'smtp' => TransportInterface::class,
        ],
    ],
];
