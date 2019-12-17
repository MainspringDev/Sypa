# Sypa

OpenCart to Symfony bridge.

## Installation

## Development

### Test Suites

#### PHPUnit

Run

```
vendor\bin\phpunit
```

Report File

```
vendor\bin\phpunit --strict-coverage --coverage-html ./var/analysis/phpunit
```

#### Infection

Run

```
vendor\bin\infection
```

Multi-threaded

```
vendor\bin\infection --threads=12
```

### Static Analysis

#### PHPStan

Run automated code static analysis using settings in ```phpstan.neon```.

```
vendor\bin\phpstan analyse
```

Run manual code static analysis.

```
vendor\bin\phpstan analyse ./src
```

A higher level can be specified to analyse code more thoroughly. Default 0.

```
vendor\bin\phpstan analyse ./src --level 7
```

Levels 0-7 available.

#### Phan

Setup

The optional PHP AST extension can be downloaded for Windows at [https://github.com/nikic/php-ast](https://github.com/nikic/php-ast). 

Run

```
vendor\bin\phan
```

Run without the PHP AST extension (slower).

```
vendor\bin\phan --allow-polyfill-parser
```

#### Psalm

Run

```
vendor\bin\psalm
```

### Code Style

#### PHP Coding Standards Fixer

Test

```
vendor\bin\php-cs-fixer fix --config .php_cs --diff-format=udiff --dry-run
```

Run

```
vendor\bin\php-cs-fixer fix --config .php_cs --diff-format=udiff
```

### Reports

#### PHPMetrics

Run

```
vendor\bin\phpmetrics --report-cli .
```

Report File

```
vendor\bin\phpmetrics --report-html=./var/analysis/phpmetrics .
```

#### Churn PHP

Run

```
vendor\bin\churn run src tests
```

#### PHP Lines Of Code

Run

```
vendor\bin\phploc ./src
```

### Optimization

### File Structure
