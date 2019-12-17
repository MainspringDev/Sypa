<?php

namespace OpenCart\System\Library;

class DB {
    private $adaptor;

    /**
     * @param string $adaptor
     * @param string $hostname
     * @param string $username
     * @param string $password
     * @param string $database
     * @param int|null $port
     * @throws \Exception
     */
    public function __construct(string $adaptor, string $hostname, string $username, string $password, string $database, ?int $port = null) {
        $class = $adaptor;

        if (class_exists($class)) {
            $this->adaptor = new $class($hostname, $username, $password, $database, $port);
        } else {
            throw new \Exception('Error: Could not load database adaptor ' . $adaptor . '!');
        }
    }

    /**
     * @param string $sql
     * @return mixed
     */
    public function query(string $sql) {
        return $this->adaptor->query($sql);
    }

    /**
     * @param string|int|float $value
     * @return mixed
     */
    public function escape($value) {
        return $this->adaptor->escape($value);
    }

    /**
     * @return int
     */
    public function countAffected(): int {
        return $this->adaptor->countAffected();
    }

    /**
     * @return int
     */
    public function getLastId(): int {
        return $this->adaptor->getLastId();
    }

    /**
     * @return bool
     */
    public function isConnected(): bool {
        return $this->adaptor->isConnected();
    }
}
