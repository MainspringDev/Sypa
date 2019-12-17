<?php

namespace OpenCart\System\Engine;

final class Router {
    /**
     * @var Registry
     */
    private $registry;
    /**
     * @var Action[]
     */
    private $pre_action = array();
    /**
     * @var
     */
    private $error;

    /**
     * @param Registry $registry
     */
    public function __construct(Registry $registry) {
        $this->registry = $registry;
    }

    /**
     * @param Action $pre_action
     * @return void
     */
    public function addPreAction(Action $pre_action): void {
        $this->pre_action[] = $pre_action;
    }

    /**
     * @param Action $action
     * @param Action $error
     * @throws \ReflectionException
     */
    public function dispatch(Action $action, Action $error): void {
        $this->error = $error;

        foreach ($this->pre_action as $pre_action) {
            $result = $this->execute($pre_action);

            if ($result instanceof Action) {
                $action = $result;

                break;
            }
        }

        while ($action instanceof Action) {
            $action = $this->execute($action);
        }
    }

    /**
     * @param Action $action
     * @return \Exception|mixed|Action|void
     */
    private function execute(Action $action) {
        $result = $action->execute($this->registry);

        if ($result instanceof Action) {
            return $result;
        }

        if ($result instanceof \Exception) {
            $action = $this->error;

            $this->error = null;

            return $action;
        }
    }
}
