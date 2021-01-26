--TEST--
Bug #zzz (wrong value in array if constant is concat to array item by concatenating assignment operator ".=")
--SKIPIF--
<?php if (!extension_loaded("taint")) print "skip"; ?>
--INI--
taint.enable=1
--FILE--
<?php
$foo = ['bar'=> 'baz'];
$foo['bar'] .= 'qux';

var_export($foo);

?>
--EXPECTF--
array (
  'bar' => 'bazqux',
)
