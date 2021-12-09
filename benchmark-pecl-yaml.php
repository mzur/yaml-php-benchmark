<?php

$sources = glob(__DIR__.'/yaml/*.yml');

foreach($sources as $source){
	benchmark(1000, function() use ($source){
		$data = yaml_parse_file($source);
	});
	$data = yaml_parse_file($source);
	yaml_emit_file(__DIR__.'/result/pecl-yaml/' . basename($source), $data);
}
