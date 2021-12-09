# YAML PHP Benchmark

### Why?

I often see Symfony/Yaml being user for YAML processing in PHP, but I myself uses PECL YAML instead and was wondering about performance, so I'd setup a simple benchmark test.

### Requirements

To run the tests yourself make sure you have met the following requirements:

- [PECL YAML](http://pecl.php.net/package/yaml) *(uses LibYAML)*
- [Symfony/Yaml](http://symfony.com/doc/current/components/yaml/introduction.html) *(pure PHP)*
- [Spyc](https://github.com/mustangostang/spyc) *(pure PHP)*

Installing PECL Yaml can be done by running:
```bash
$ pecl install yaml
```

Symfony/Yaml and Spyc should be installed using [Composer](https://getcomposer.org/) by running:
```bash
$ composer install
```
<small>*NB. I did not use composer's autoload feature as it may interfere with the test results*</small>

### Results

The test pointed out that Symfony/Yaml is by far the *slowest* parser:

```bash
$ php --version
PHP 7.4.3 (cli) (built: Oct 25 2021 18:20:54) ( NTS )
Copyright (c) The PHP Group
Zend Engine v3.4.0, Copyright (c) Zend Technologies
    with Zend OPcache v7.4.3, Copyright (c), by Zend Technologies
    with Xdebug v2.9.2, Copyright (c) 2002-2020, by Derick Rethans

$ php -f ./benchmark.php
PECL YAML
Total: 0.066823959350586
Average: 6.6823959350586E-5
Total: 0.043269872665405
Average: 4.3269872665405E-5
Total: 0.031845092773438
Average: 3.1845092773438E-5

Symfony YAML
Total: 1.668664932251
Average: 0.001668664932251
Total: 0.93599104881287
Average: 0.00093599104881287
Total: 0.60884404182434
Average: 0.00060884404182434

Spyc YAML
Total: 1.2451319694519
Average: 0.0012451319694519
Total: 0.7480890750885
Average: 0.0007480890750885
Total: 0.53511714935303
Average: 0.00053511714935303
```
*In seconds per a 1000 runs*

This test doesn't verify the correctness of the parser, only the speed.
