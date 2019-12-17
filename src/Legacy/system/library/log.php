<?php

namespace OpenCart\System\Library;

class Log {
    private $handle;

    /**
     * @param string $filename
     */
    public function __construct(string $filename) {
        $file = DIR_LOGS . $filename;

        if (!is_file($file)) {
            $this->handle = fopen(DIR_LOGS . $filename, 'x');
        } else {
            $this->handle = fopen(DIR_LOGS . $filename, 'a');
        }
    }

    /**
     * @param string|array $message
     * @return void
     */
    public function write($message): void {
        fwrite($this->handle, date('Y-m-d G:i:s') . ' - ' . print_r($message, true) . "\n");
    }

    public function __destruct() {
        fclose($this->handle);
    }
}
