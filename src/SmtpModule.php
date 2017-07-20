<?php
namespace Corley\SmtpModule;

use Corley\Modular\Module\ModuleInterface;
use Zend\ServiceManager\ServiceManager;

class SmtpModule implements ModuleInterface
{
    private $options;

    public function __construct(array $options = [])
    {
        $this->options = array_replace_recursive([
            'name' => 'default',
            'handlers' => [],
        ], $options);
    }

    public function getContainer()
    {
        $conf = include __DIR__ . '/../configs/services.php';

        $serviceManager = new ServiceManager();
        $serviceManager->configure($conf["services"]);
        $serviceManager->setService("smtp-config", $this->options);

        return $serviceManager;
    }
}
