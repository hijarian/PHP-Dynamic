# Dynamic objects for PHP

Instances of the class `Dynamic` are almost like `stdClass`, except they can assign `callable`s and run them.

## Examples

```php
$obj = new Dynamic;
$obj->add = function ($x, $y) {return $x + $y;}
3 == $obj->add(1,2); // true

$obj->datetime = array('DateTime', 'createFromFormat');
$obj->datetime('Y-m-d', '2013-08-09') instanceof 'DateTime'; // true

$obj->storedValue = '666';
666 == $obj->storedValue; // true
```

# Acknowledgments

This is a complete ripoff from the [insightful comment from _spark_ at the PHP documentation about predefined classes](http://www.php.net/manual/en/reserved.classes.php#105404). :)
Thank you, spark! 

# License

Public Domain, of course. I explicitly wave any rights on the code inside this repo. Repo exists only to publish this code in the Web.
