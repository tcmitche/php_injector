<?php

require "Injector.php";

class Foo
{
    private $bar;
    private $s1 = '';
    private $s2 = '';
    private $s3 = '';
    public function __construct(Bar $bar, $s1, $s2, $s3)
    {
        $this->s1 = $s1;
        $this->s2 = $s2;
        $this->s3 = $s3;
        $this->bar = $bar;
    }
}

class Bar
{
    
}

$c = new Injector();
$c->register('Bar', function($inj) {
    return new Bar;
});
$c->register('Foo', function($inj, $a1, $a2, $a3) {
    $bar = $inj->get('Bar');
    return new Foo($bar, $a1, $a2, $a3);
});
$foo = $c->get('Foo', 'This is a string', 'This is string 2', 'This is string3');

print_r($foo);