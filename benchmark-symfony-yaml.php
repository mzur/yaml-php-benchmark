<?php

include __DIR__.'/vendor/symfony/yaml/Unescaper.php';
include __DIR__.'/vendor/symfony/yaml/Inline.php';
include __DIR__.'/vendor/symfony/yaml/Parser.php';
include __DIR__.'/vendor/symfony/yaml/Dumper.php';
include __DIR__.'/vendor/symfony/yaml/Escaper.php';
include __DIR__.'/vendor/symfony/yaml/Yaml.php';

use Symfony\Component\Yaml\Yaml;

$sources = glob(__DIR__.'/yaml/*.yml');

foreach($sources as $source){
	benchmark(1000, function() use ($source){
		Yaml::parseFile($source);
	});
	$data = Yaml::parseFile($source);
	file_put_contents(__DIR__.'/result/symfony-yaml/' . basename($source), Yaml::dump($data));
}
