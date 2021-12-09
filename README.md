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
Total: 0.065805912017822
Average: 6.5805912017822E-5
Total: 0.046339988708496
Average: 4.6339988708496E-5
Total: 0.031901121139526
Average: 3.1901121139526E-5

Symfony YAML
Total: 1.6955361366272
Average: 0.0016955361366272
Total: 1.0237720012665
Average: 0.0010237720012665
Total: 0.59659910202026
Average: 0.00059659910202026

Spyc YAML
Total: 1.2520709037781
Average: 0.0012520709037781
Total: 0.74660110473633
Average: 0.00074660110473633
Total: 0.53867197036743
Average: 0.00053867197036743
```
*In seconds per a 1000 runs*

This test doesn't verify the correctness of the parser, only the speed.
