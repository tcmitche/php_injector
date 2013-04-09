<?php

class Injector
{
    private $procs = array();
    
    public function register($class, $func) 
    {
        if (class_exists($class)) {
            $this->procs[$class] = $func;
        }
    }
    
    public function get()
    {
        $args = func_get_args();
        $class = array_shift($args);
        if (!isset($this->procs[$class])) {
            return false;
        }
        if (func_num_args() > 1) {
            //array_unshift($args, $this->procs);
            return $this->procs[$class]($this->procs, $args);
        } else {
            return $this->procs[$class]($this->procs);
        }
    }

}