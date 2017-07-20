<?php
namespace Corley\SmtpModule\Factory;

use PHPUnit\Framework\TestCase;
use Corley\SmtpModule\SmtpModule;
use Psr\Container\ContainerInterface;
use Zend\Mail\Transport\TransportInterface;
use Zend\Mail\Transport\InMemory;

class SmtpFactoryTest extends TestCase
{
    public function testCreate()
    {
        $module = new SmtpModule([
            'type' => InMemory::class,
            'options' => [],
        ]);

        $container = $module->getContainer();

        $this->assertInstanceOf(ContainerInterface::class, $container);
        $this->assertTrue($container->has("smtp"));
        $this->assertInstanceOf(TransportInterface::class, $container->get("smtp"));
    }
}
