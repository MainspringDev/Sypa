<?php

namespace OpenCart\System\Engine;

use DI\DependencyException;
use DI\NotFoundException;
use OpenCart\System\Library\Cart\Customer;
use OpenCart\System\Library\Cart\Tax;
use OpenCart\System\Library\Config;
use OpenCart\System\Library\DB;
use OpenCart\System\Library\Document;
use OpenCart\System\Library\Request;
use OpenCart\System\Library\Response;
use OpenCart\System\Library\Session;
use OpenCart\System\Library\Url;

/**
 * @property Config $config
 * @property Customer $customer
 * @property DB $db
 * @property Document $document
 * @property Loader $load
 * @property Request $request
 * @property Response $response
 * @property Session $session
 * @property Tax $tax
 * @property Url $url
 */
abstract class Controller {
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
     * @param string $key
     * @return mixed|null
     */
    public function __get(string $key) {
        try {
            return $this->registry->get($key);
        } catch (NotFoundException | DependencyException $e) {
            return null;
        }
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function __set(string $key, $value): void {
        $this->registry->set($key, $value);
    }
}
