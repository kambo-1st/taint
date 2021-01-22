--TEST--
Bug #xxxx (segmentation fault if class with empty constructor is instantiated with parameter)
--SKIPIF--
<?php if (!extension_loaded("taint")) print "skip"; ?>
--INI--
taint.enable=1
--FILE--
<?php
class Foo {}

$baz = 'baz';
new Foo($baz); // Segmentation fault
echo $baz;

?>
--EXPECTF--
baz
