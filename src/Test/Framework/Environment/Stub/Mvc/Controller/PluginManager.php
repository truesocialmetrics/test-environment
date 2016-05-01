<?php

namespace Test\Framework\Environment\Stub\Mvc\Controller;

use InvalidArgumentException;
use Zend\Mvc\Controller\PluginManager as ZendMvcControllerPluginManager;

class PluginManager extends ZendMvcControllerPluginManager
{
    /**
     * Default set of plugins factories.
     *
     * @var array
     */
    protected $factories = [
    ];

    /**
     * Default set of plugins.
     *
     * @var array
     */
    protected $invokableClasses = [
    ];

    /**
     * Default set of plugin aliases.
     *
     * @var array
     */
    protected $aliases = [
    ];

    private $mapping = [];

    public function __construct()
    {
        // @HACK
        // do nothing
    }

    /**
     * Retrieve a registered instance.
     *
     * After the plugin is retrieved from the service locator, inject the
     * controller in the plugin every time it is requested. This is required
     * because a controller can use a plugin and another controller can be
     * dispatched afterwards. If this second controller uses the same plugin
     * as the first controller, the reference to the controller inside the
     * plugin is lost.
     *
     * @param string $name
     * @param mixed  $options
     * @param bool   $usePeeringServiceManagers
     *
     * @return mixed
     */
    public function get($name, $options = [], $usePeeringServiceManagers = true)
    {
        if (!$this->has($name)) {
            throw new InvalidArgumentException('unknow plugin "' . $name . '"');
        }
        $plugin = $this->mapping[$name];
        $this->injectController($plugin);

        return $plugin;
    }

    public function has($name)
    {
        return array_key_exists($name, $this->mapping);
    }

    public function set($name, $plugin)
    {
        $this->mapping[$name] = $plugin;
    }

    public function setServiceLocator(ContainerInterface $container)
    {
        $this->creationContext = $container;
    }

    public function getServiceLocator()
    {
        return $this->creationContext;
    }
}