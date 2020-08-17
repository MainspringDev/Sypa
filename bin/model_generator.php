<?php

require_once(__DIR__ . '/../src/Legacy/system/helper/db_schema.php');

function make_name(string $name): string {
    $class_name = '';

    $parts = explode('_', $name);

    foreach ($parts as $part) {
        $class_name .= ucfirst($part);
    }

    return $class_name;
}

function make_property(array $field): string {
    list(
        'name'     => $name,
        'type'     => $type,
        'not_null' => $not_null
    ) = $field;

    if (strpos($type, 'int(') === 0 || strpos($type, 'smallint(') === 0) {
        return 'int $' . $name;
    }

    if (strpos($type, 'decimal(') === 0
        || strpos($type, 'float(') === 0
        || strpos($type, 'double(') === 0
    ) {
        return 'float $' . $name;
    }

    if (strpos($type, 'varchar(') === 0 || $type === 'text' || $type === 'mediumtext') {
        return 'string $' . $name;
    }

    if ($type === 'tinyint(1)') {
        return 'bool $' . $name;
    }

    if ($type === 'datetime' || $type === 'date') {
        return '\DateTimeImmutable $' . $name;
    }

    return '$' . $name;
}

function make_method(array $field): string {
    list(
        'name'     => $name,
        'type'     => $type,
        'not_null' => $not_null
    ) = $field;

    $method_name = '';

    foreach (explode('_', $name) as $part) {
        $method_name .= ucfirst($part);
    }

    if (strpos($type, 'int(') === 0) {
        return 'get' . $method_name . '(): int';
    }

    if (strpos($type, 'decimal(') === 0
        || strpos($type, 'float(') === 0
        || strpos($type, 'double(') === 0
    ) {
        return 'get' . $method_name . '(): float';
    }

    if (strpos($type, 'varchar(') === 0 || $type === 'text' || $type === 'mediumtext') {
        return 'get' . $method_name . '(): string';
    }

    if ($type === 'tinyint(1)') {
        return 'is' . $method_name . '(): bool';
    }

    if ($type === 'datetime' || $type === 'date') {
        return 'get' . $method_name . '(): \DateTimeImmutable';
    }

    return 'get' . $method_name . '()';
}

foreach (db_schema() as $table) {
    $table = array_merge(
        [
            'name'    => '',
            'field'   => [],
            'primary' => [],
            'index'   => [],
            'engine'  => '',
            'charset' => '',
            'collate' => ''
        ],
        $table
    );

    list(
        'name'    => $name,
        'field'   => $fields,
        'primary' => $primary,
        'index'   => $index,
        'engine'  => $engine,
        'charset' => $charset,
        'collate' => $collate
    ) = $table;

    $output  = '<?php' . PHP_EOL . PHP_EOL;
    $output .= 'declare(strict_types=1);' . PHP_EOL . PHP_EOL;
    $output .= 'namespace Sypa\\Model;' . PHP_EOL . PHP_EOL;
    $output .= 'class ' . make_name($name) . ' {' . PHP_EOL;

    foreach ($fields as $field) {
        $output .= '    private ' . make_property($field) . ';' . PHP_EOL;
    }

    $output .= PHP_EOL;

    $params = [];

    foreach ($fields as $field) {
        $params[] = make_property($field);
    }

    $characters = 0;

    array_walk($params, function ($value, $index) use (&$characters) {
        // We account for two additional characters for the parameter's leading space and trailing comma.
        $characters += \mb_strlen($value) + 2;
    });

    // We subtract a character because the first parameter will not have a leading space. This does not account for a
    // single parameter having no trailing comma but this should never be an issue as the param name should never be
    // 85+ characters long.
    $characters--;

    if ($characters > 85) {
        $output .= '    public function __construct(' . PHP_EOL;

        foreach ($params as $index => $param) {
            $output .= '        ' . $param;

            if (count($params) > $index + 1) {
                $output .= ',';
            }

            $output .= PHP_EOL;
        }

        $output .= '    ) {' . PHP_EOL;
    } else {
        $output .= '    public function __construct(' . implode(', ', $params) . ') {' . PHP_EOL;
    }

    foreach ($fields as $field) {
        $output .= '        $this->' . $field['name'] . ' = $' . $field['name'] . ';' . PHP_EOL;
    }

    $output .= '    }' . PHP_EOL . PHP_EOL;

    foreach ($fields as $index => $field) {
        // Prevent double spacing after constructor
        if ($index > 0) {
            $output .= PHP_EOL;
        }

        $output .= '    public function ' . make_method($field) . ' {' . PHP_EOL;
        $output .= '        return $this->' . $field['name'] . ';' . PHP_EOL;
        $output .= '    }' . PHP_EOL;
    }

    $output .= '}' . PHP_EOL;

    file_put_contents(__DIR__ . '/../var/tmp/' . make_name($name) . '.php', $output);
}
