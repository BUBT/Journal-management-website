<?php

namespace App\Test;

class Human
{
    public $name = 'Lynn';
    public $age = 0;

    public function __construct()
    {
        return $this;
    }

    public function setName( $name )
    {
        $this->name = $name;
    }

    public function say()
    {
        echo 'World Peace';
    }
}