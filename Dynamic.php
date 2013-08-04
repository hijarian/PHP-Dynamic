<?php
/**
 * Class Dynamic
 *
 * We can add both properties and methods to objects of this class.
 *
 * $obj = new Dynamic;
 * $obj->add = function ($x, $y) {return $x + $y;}
 * 3 == $obj->add(1,2); // true
 *
 * $obj->datetime = array('DateTime', 'createFromFormat');
 * $obj->datetime('Y-m-d', '2013-08-09') instanceof 'DateTime'; // true
 *
 * $obj->storedValue = '666';
 * 666 == $obj->storedValue; // true
 */
class Dynamic extends stdClass
{
    public function __call($key,$params)
    {
        if (!isset($this->{$key})) {
            throw new InvalidArgumentException(
                sprintf('Call to undefined method %s::%s()',get_class($this),$key)
            );
        }

        $method = $this->{$key};
        return call_user_func_array($method,$params);
    }
}
