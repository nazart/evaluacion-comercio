<?php

include './completeRange.php';

$completeRange = new completeRange();
$range = [1,3,6,9];
print_r($completeRange->build($range));
