<?php


$hash = (time()*25.012548/7854);
$hash = hash('gost-crypto',$hash);
echo $hash;