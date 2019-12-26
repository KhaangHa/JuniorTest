<?php
namespace Magenest\Junior\Model;
use Magenest\Junior\Api\MyInterface;

class MyClass implements MyInterface{
    public function foo()
    {
        echo "Foo";
    }
}