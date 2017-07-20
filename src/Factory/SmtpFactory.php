<?php
namespace Corley\SmtpModule\Factory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Mail\Transport\Factory;

class SmtpFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $options = $container->get("smtp-config");

        return Factory::create($options);
    }
}
