--TEST--
Bug #yyy (segmentation fault if constant is concat to object property by concatenating assignment operator ".=")
--SKIPIF--
<?php if (!extension_loaded("taint")) print "skip"; ?>
--INI--
taint.enable=1
--FILE--
<?php
class Foo {
    private $_processedExpression = 'a';

    public function bar() {
        $this->_processedExpression .= 'b'; // Segmentation fault
        echo $this->_processedExpression;
    }
}

$parser = new Foo();
$parser->bar();

?>
--EXPECTF--
ab