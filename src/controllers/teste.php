<?php

$i1 = DateInterval::createFromDateString("9 hours");
$i2 = DateInterval::createFromDateString("6 hours");

$sr1 = sumInterval($i1, $i2);
$sr2 = subtractInterval($i1, $i2);

print_r(intervalToDate($sr1));

?> 