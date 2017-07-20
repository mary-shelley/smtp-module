<?php
namespace Corley\SmtpModule;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

use Zend\Mail\Transport\TransportInterface;
use Zend\Mail\Transport\InMemory;

class SmtpModuleTest extends TestCase
{
    public function testCreateBaseSmtpService()
    {
        $module = new SmtpModule([
            'type' => InMemory::class,
            'options' => [],
        ]);

        $container = $module->getContainer();
        $this->assertInstanceOf(ContainerInterface::class, $container);
        $this->assertTrue($container->has('smtp'));

        $logger = $container->get('smtp');

        $this->assertInstanceOf(TransportInterface::class, $logger);
    }
}
