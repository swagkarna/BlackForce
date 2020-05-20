#!/usr/bin/php
<?php
echo "
 ____  _            _    ______                 
|  _ \| |          | |  |  ____|                
| |_) | | __ _  ___| | _| |__ ___  _ __ ___ ___ 
|  _ <| |/ _` |/ __| |/ /  __/ _ \| '__/ __/ _ \
| |_) | | (_| | (__|   <| | | (_) | | | (_|  __/
|____/|_|\__,_|\___|_|\_\_|  \___/|_|  \___\___|
                                                v0.1
";


$striped = null;
if ($argc != 5 || in_array($argv[1], array('--help', '-help', '-h', '-?'))) {
	echo "Usage:\n";
	echo "./attack.php -hf <hashfile> -w <passwordlist>\n";
	echo "Example:\n";
	echo "./attack.php -hf hash.txt -w passwords.txt\n";
} else {
	foreach ($argv as $value){
		if($value == "--hash" or $value == "--wordlist" or $value == "-w" or $value == "-hf"){
		} else {
			$striped .= $value . "| BF |";			
		}
	}
	
	$striped = rtrim($striped , "| BF |");
	
	
	$args = explode("| BF |", $striped);

try{
$hash = file_get_contents($args[1]);
$handle = fopen($args[2], "r");

if ($handle) {
    while (($line = fgets($handle)) !== false) {
		if ( password_verify( trim($line), trim($hash)  ) ) {
			echo "\e[32m";
			echo "-------------------------------\n";
			echo "Password Found: " . trim($line) . "\n";
			echo  "-------------------------------\n";
			break;
		} else {
			echo "Check Password: " . trim($line) . "\n";
		}
    }
    fclose($handle);
}
} catch(Exception $err){
	echo $err->getMessage();	
}
}
?>
