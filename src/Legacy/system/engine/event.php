<?php

namespace OpenCart\System\Engine;

class Event {
    /**
     * @var Registry
     */
    protected $registry;
    /**
     * @var array
     */
    protected $data = array();

    /**
     * @param Registry $registry
     */
    public function __construct(Registry $registry) {
        $this->registry = $registry;
    }

    /**
     * @param string $trigger
     * @param Action $action
     * @param int $priority
     * @return void
     */
    public function register(string $trigger, Action $action, int $priority = 0): void {
        $this->data[] = array(
            'trigger'  => $trigger,
            'action'   => $action,
            'priority' => $priority
        );

        $sort_order = array();

        foreach ($this->data as $key => $value) {
            $sort_order[$key] = $value['priority'];
        }

        array_multisort($sort_order, SORT_ASC, $this->data);
    }

    /**
     * @param string $event
     * @param array $args
     * @return mixed|void
     */
    public function trigger(string $event, array $args = array()) {
        foreach ($this->data as $value) {
            if (preg_match('/^' . str_replace(array('\*', '\?'), array('.*', '.'), preg_quote($value['trigger'], '/')) . '/', $event)) {
                $result = $value['action']->execute($this->registry, $args);

                if (!is_null($result) && !($result instanceof \Exception)) {
                    return $result;
                }
            }
        }
    }

    /**
     * @param string $trigger
     * @param string $route
     * @return void
     */
    public function unregister(string $trigger, string $route): void {
        foreach ($this->data as $key => $value) {
            if ($trigger == $value['trigger'] && $value['action']->getId() == $route) {
                unset($this->data[$key]);
            }
        }
    }

    /**
     * @param string $trigger
     * @return void
     */
    public function clear(string $trigger): void {
        foreach ($this->data as $key => $value) {
            if ($trigger == $value['trigger']) {
                unset($this->data[$key]);
            }
        }
    }
}
