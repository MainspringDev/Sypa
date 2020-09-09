<?php

require_once(__DIR__ . '/../vendor/autoload.php');

function make_name(string $name): string {
    $class_name = '';

    $parts = explode('_', $name);

    foreach ($parts as $part) {
        $class_name .= ucfirst($part);
    }

    return $class_name;
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
        return 'get' . $method_name . '()';
    }

    if (strpos($type, 'decimal(') === 0
        || strpos($type, 'float(') === 0
        || strpos($type, 'double(') === 0
    ) {
        return 'get' . $method_name . '()';
    }

    if (strpos($type, 'varchar(') === 0 || $type === 'text' || $type === 'mediumtext') {
        return 'get' . $method_name . '()';
    }

    if ($type === 'tinyint(1)') {
        return 'is' . $method_name . '()';
    }

    if ($type === 'datetime' || $type === 'date') {
        return 'get' . $method_name . '()';
    }

    return 'get' . $method_name . '()';
}

function match_model(string $model): string {
    foreach (get_declared_classes() as $declared_class) {
        echo $declared_class . PHP_EOL;
        if (preg_match('/^Syps\\\Model\\\(.*)\\\\' . $model . '$/', $declared_class) === true) {
            return $declared_class;
        }
    }

    return '';
}

function array_aligner(array $array, int $indent): string {
    $max = 0;

    array_walk($array, function ($align_to, $align_from) use (&$max) {
        $character_count = strlen($align_from);

        if ($character_count > $max) {
            $max = $character_count;
        }
    });

    $output = '';

    foreach ($array as $align_from => $align_to) {
        $output .= str_repeat('    ', $indent) . "'" . $align_from . "'" . str_repeat(' ', $max - strlen($align_from)) . " => " . $align_to . "," . PHP_EOL;
    }

    $output = rtrim($output, "\r\n,");

    return $output;
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

    $model = make_name($name);
    $column_count = count($fields);

    // Begin File
    $output  = '<?php' . PHP_EOL . PHP_EOL;
    $output .= 'declare(strict_types=1);' . PHP_EOL . PHP_EOL;
    $output .= 'namespace Sypa\\Generator\\Hydrator;' . PHP_EOL . PHP_EOL;
    //$output .= 'use ' . match_model($model) . ';' . PHP_EOL . PHP_EOL;
    $output .= 'class ' . make_name($name) . 'Hydrator {' . PHP_EOL;

    // Required Data
    $output .= '    const REQUIRED_DATA = [' . PHP_EOL;
    foreach ($fields as $index => $field) {
        $output .= "        '" . $field['name'] . "'" . (($index + 1) < $column_count ? ',' : '') . PHP_EOL;
    }
    $output .= '    ];' . PHP_EOL . PHP_EOL;

    // Hydrate Method
    $output .= '    /**' . PHP_EOL;
    $output .= '     * @param array $data' . PHP_EOL;
    $output .= '     * @return ' . $model . PHP_EOL;
    $output .= '     * @throws \Exception' . PHP_EOL;
    $output .= '     */' . PHP_EOL;
    $output .= '    public function hydrate(array $data): ' . $model . ' {' . PHP_EOL;
    $output .= '        foreach (self::REQUIRED_DATA as $required_data) {' . PHP_EOL;
    $output .= '            if (array_key_exists($required_data, $data) === false) {' . PHP_EOL;
    $output .= '                throw new \InvalidArgumentException(sprintf(' . PHP_EOL;
    $output .= '                    "Unable to create ' . $model . ' from data. Missing \'%s\'.",' . PHP_EOL;
    $output .= '                    $required_data' . PHP_EOL;
    $output .= '                ));' . PHP_EOL;
    $output .= '            }' . PHP_EOL;
    $output .= '        }' . PHP_EOL;
    $output .= PHP_EOL;
    $output .= '        list(' . PHP_EOL;
    $align = [];
    foreach ($fields as $index => $field) {
        $align[$field['name']] = '$' . $field['name'];
    }
    $output .= array_aligner($align, 3) . PHP_EOL;
    $output .= '        ) = $data;' . PHP_EOL;
    $output .= PHP_EOL;
    $output .= '        return new ' . $model . '(' . PHP_EOL;
    foreach ($fields as $index => $field) {
        $output .= '            $' . $field['name'] . (($index + 1) < $column_count ? ',' : '') . PHP_EOL;
    }
    $output .= '        );' . PHP_EOL;
    $output .= '    }' . PHP_EOL . PHP_EOL;

    // Extract Method
    $output .= '    /**' . PHP_EOL;
    $output .= '     * @param ' . $model . ' $' . lcfirst($model) . PHP_EOL;
    $output .= '     * @return array<string, mixed>' . PHP_EOL;
    $output .= '     */' . PHP_EOL;
    $output .= '    public function extract(' . $model . ' $' . lcfirst($model) . '): array {' . PHP_EOL;
    $output .= '        return [' . PHP_EOL;
    $align = [];
    foreach ($fields as $index => $field) {
        $align[$field['name']] = '$' . lcfirst($model) . "->" . make_method($field);
    }
    $output .= array_aligner($align, 3) . PHP_EOL;
    $output .= '        ];' . PHP_EOL;
    $output .= '    }' . PHP_EOL;

    // End File
    $output .= '}' . PHP_EOL;

    file_put_contents(__DIR__ . '/../var/tmp/' . $model . 'Hydrator.php', $output);
}
