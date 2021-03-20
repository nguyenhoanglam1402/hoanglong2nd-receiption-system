<?php
 $stringconnect = "host=ec2-18-204-101-137.compute-1.amazonaws.com dbname=d4gep4p3ccf21t user=ljrnajyailnipv password=f368d10af1c7c98da91ed19d7b5f821a5a53e472a64859d6b5e38bb0a2c89c4c";
 pg_connect($stringconnect);
 echo 'alert("Connect successfully !")';
?>