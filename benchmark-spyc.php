<?php

include __DIR__.'/vendor/mustangostang/spyc/Spyc.php';

$sources = glob(__DIR__.'/yaml/*.yml');

foreach($sources as $source){
	benchmark(1000, function() use ($source){
		$data = spyc_load_file($source);
	});
	$data = spyc_load_file($source);
	file_put_contents(__DIR__.'/result/spyc/' . basename($source), Spyc::YAMLDump($data));
}
