<?php
$request_uri = $_SERVER['REQUEST_URI'];
$uri_parts = parse_url($request_uri);
parse_str($uri_parts['query'],$results);
print_r($results['marque']);

print_r(__DIR__);
?>