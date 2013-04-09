<?php

require "Injector.php";

class Foo
{
    private $bar;
    private $str = '';
    public function __construct(Bar $bar, $str)
    {
        $this->str = $str;
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
$c->register('Foo', function($inj, $args) {
    $bar = new Bar();
    return new Foo($bar, $args);
});
$foo = $c->get('Foo', 'This is a string');

print_r($foo);