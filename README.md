# Arrayor
A simple class that provide some functions to manipulate arrays.

|Travis|Coverage|Scrutinizer|Stable Version|Downloads|License|
|:------:|:-------:|:-------:|:------:|:------:|:------:|
|[![Build Status](https://img.shields.io/travis/Xety/Arrayor.svg?style=flat-square)](https://travis-ci.org/Xety/Arrayor)|[![Coverage Status](https://img.shields.io/coveralls/Xety/Arrayor/master.svg?style=flat-square)](https://coveralls.io/r/Xety/Arrayor)|[![Scrutinizer](https://img.shields.io/scrutinizer/g/Xety/Arrayor.svg?style=flat-square)](https://scrutinizer-ci.com/g/Xety/Arrayor)|[![Latest Stable Version](https://img.shields.io/packagist/v/Xety/Arrayor.svg?style=flat-square)](https://packagist.org/packages/xety/arrayor)|[![Total Downloads](https://img.shields.io/packagist/dt/xety/arrayor.svg?style=flat-square)](https://packagist.org/packages/xety/arrayor)|[![License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://packagist.org/packages/xety/xeta)|

### Requirements
* :package: [Composer](https://getcomposer.org)
* ![PHP](https://img.shields.io/badge/PHP->=5.4-44CB12.svg?style=flat-square)

### Functions
* `Arrayor::camelizeIndex($array, $delimiter = '_')`
    * Camelize all index keys in the first level.

``` php

$array = [
    'Index key' => 1,
    'key_index' => 2
];

$result = Arrayor::camelizeIndex($array);

$result = [
    'indexKey' => 1,
    'keyIndex' => 2
];
```

* `Arrayor::implodeRecursive($array = [], $glue = ' : ', $separator = ' | ')`
    * Implode an array into a string by both key and value.

``` php

$array = [
    'key-index' => 1,
    'key index' => 'value'
];

$string = Arrayor::implodeRecursive($array);

$string = 'key-index : 1 | key index : value';
```


### Contribute
[Follow this guide to contribute](https://github.com/Xety/Arrayor/blob/master/CONTRIBUTING.md)
