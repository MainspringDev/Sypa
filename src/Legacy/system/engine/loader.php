<?php

/*
 * This class has been modified from the original source code for compatibility with the new framework.
 */

namespace OpenCart\System\Engine;

use OpenCart\System\Library\Template;
use Sypa\Bridge\ControllerResolverTrait;
use Sypa\Bridge\ModelResolverTrait;

final class Loader {
    use ControllerResolverTrait;
    use ModelResolverTrait;
    /**
     * @var Registry
     */
    protected $registry;

    /**
     * @param Registry $registry
     */
    public function __construct(Registry $registry) {
        $this->registry = $registry;
    }

    /**
     * @param string $route
     * @param mixed ...$args
     * @return \Exception|mixed|void
     */
    public function controller(string $route, ...$args) {
        // Sanitize the call
        $route = preg_replace('/[^a-zA-Z0-9_\/]/', '', $route);

        // Keep the original trigger
        $trigger = $route;

        // Trigger the pre events
        $result = $this->registry->get('event')->trigger(APPLICATION . '/controller/' . $trigger . '/before', [&$route, &$args]);
        // @todo Events 'before' and 'after' have different signatures.

        // Make sure its only the last event that returns an output if required.
        if ($result !== null && $result instanceof \Exception === false) {
            $output = $result;
        } else {
            try {
                $action = new Action($this->resolveControllerRoute(APPLICATION . '/controller/' . $route));
                $output = $action->execute($this->registry, $args);
            } catch (\Exception $e) {
                $output = $e;
            }
        }

        // Trigger the post events
        $result = $this->registry->get('event')->trigger(APPLICATION . '/controller/' . $trigger . '/after', [&$route, &$args, &$output]);

        if ($result && $result instanceof \Exception === false) {
            $output = $result;
        }

        if ($output instanceof \Exception === false) {
            return $output;
        }
    }

    /**
     * @param string $route
     * @param string $path
     * @throws \Exception
     */
    public function model(string $route, string $path = ''): void {
        // Sanitize the call
        if (!$this->registry->has('model_' . str_replace('/', '_', $route))) {
            if (!$path) {
                $model_route = APPLICATION . '/model/' . $route;
            } else {
                $model_route = APPLICATION . '/' . $path . $route;
            }

            list($class) = $this->resolveModelRoute($model_route);

            if (class_exists($class)) {
                $proxy = new Proxy();

                // Overriding models is a little harder so we have to use PHP's magic methods
                // In future version we can use runkit
                foreach (get_class_methods($class) as $method) {
                    $function = $this->callback($route . '/' . $method);

                    $proxy->attach($method, $function);
                }

                $this->registry->set('model_' . str_replace('/', '_', $route), $proxy);
            } else {
                throw new \Exception('Error: Could not load model ' . $route . '!');
            }
        }
    }

    /**
     * @param string $route
     * @param array $data
     * @param string $path
     * @return string|false
     * @throws \Exception
     */
    public function view(string $route, array $data = array(), string $path = '') {
        // Sanitize the call
        $route = preg_replace('/[^a-zA-Z0-9_\/]/', '', (string)$route);

        // Keep the original trigger
        $trigger = $route;

        // Modified template contents. Not the output!
        $code = '';

        // Trigger the pre events
        $result = $this->registry->get('event')->trigger(APPLICATION . '/view/' . $trigger . '/before', array(&$route, &$data, &$code));

        // Make sure its only the last event that returns an output if required.
        if ($result && !$result instanceof \Exception) {
            $output = $result;
        } else {
            $template = new Template($this->registry->get('config')->get('template_engine'));

            foreach ($data as $key => $value) {
                $template->set($key, $value);
            }

            $output = $template->render($this->registry->get('config')->get('template_directory') . $route, $code);
        }

        // Trigger the post events
        $result = $this->registry->get('event')->trigger(APPLICATION . '/view/' . $trigger . '/after', array(&$route, &$data, &$output));

        if ($result && !$result instanceof \Exception) {
            $output = $result;
        }

        return $output;
    }

    /**
     * @param string $route
     * @param array $config
     * @return void
     * @throws \Exception
     */
    public function library(string $route, array $config = array()): void {
        // Sanitize the call
        $route = preg_replace('/[^a-zA-Z0-9_\/]/', '', (string)$route);

        $file = DIR_SYSTEM . 'library/' . $route . '.php';
        $class = str_replace('/', '\\', $route);

        if (is_file($file)) {
            include_once($file);

            $this->registry->set(basename($route), new $class($this->registry));
        } else {
            throw new \Exception('Error: Could not load library ' . $route . '!');
        }
    }

    /**
     * @param string $route
     * @return void
     * @throws \Exception
     */
    public function helper(string $route): void {
        $file = DIR_SYSTEM . 'helper/' . preg_replace('/[^a-zA-Z0-9_\/]/', '', (string)$route) . '.php';

        if (is_file($file)) {
            include_once($file);
        } else {
            throw new \Exception('Error: Could not load helper ' . $route . '!');
        }
    }

    /**
     * @param string $route
     * @return void
     */
    public function config(string $route): void {
        $this->registry->get('event')->trigger(APPLICATION . '/config/' . $route . '/before', array(&$route));

        $this->registry->get('config')->load($route);

        $this->registry->get('event')->trigger(APPLICATION . '/config/' . $route . '/after', array(&$route));
    }

    /**
     * @param string $route
     * @param string $prefix
     * @return array
     */
    public function language(string $route, string $prefix = ''): array {
        // Sanitize the call
        $route = preg_replace('/[^a-zA-Z0-9_\-\/]/', '', $route);

        // Keep the original trigger
        $trigger = $route;

        $result = $this->registry->get('event')->trigger(APPLICATION . '/language/' . $trigger . '/before', [&$route, &$prefix]);

        if ($result && $result instanceof \Exception === false) {
            $output = $result;
        } else {
            $output = $this->registry->get('language')->load($route, $prefix);
        }

        $result = $this->registry->get('event')->trigger(APPLICATION . '/language/' . $trigger . '/after', [&$route, &$prefix, &$output]);

        if ($result && $result instanceof \Exception === false) {
            $output = $result;
        }

        return $output;
    }

    /**
     * @param string $route
     * @return \Closure
     */
    protected function callback(string $route) {
        return function (&...$args) use ($route) {
            // Grab args using function because we don't know the number of args being passed.
            // https://www.php.net/manual/en/functions.arguments.php#functions.variable-arg-list
            // https://wiki.php.net/rfc/variadics
            $route = preg_replace('/[^a-zA-Z0-9_\/]/', '', (string)$route);

            // Keep the original trigger
            $trigger = $route;

            // Trigger the pre events
            $result = $this->registry->get('event')->trigger(APPLICATION . '/model/' . $trigger . '/before', array(&$route, &$args));

            if ($result && !$result instanceof \Exception) {
                $output = $result;
            } else {
                list($class, $method) = $this->resolveModelRoute(APPLICATION . '/model/' . $route);

                // Store the model object
                $key = substr($route, 0, strrpos($route, '/'));

                // Check if the model has already been initialised or not
                if (!$this->registry->has($key)) {
                    $object = new $class($this->registry);

                    $this->registry->set($key, $object);
                } else {
                    $object = $this->registry->get($key);
                }

                $callable = array($object, $method);

                if (is_callable($callable)) {
                    $output = call_user_func_array($callable, $args);
                } else {
                    throw new \Exception('Error: Could not call model/' . $route . '!');
                }
            }

            // Trigger the post events
            $result = $this->registry->get('event')->trigger(APPLICATION . '/model/' . $trigger . '/after', array(&$route, &$args, &$output));

            if ($result && !$result instanceof \Exception) {
                $output = $result;
            }

            return $output;
        };
    }
}
