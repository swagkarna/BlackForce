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
    $commands = ["--hash", "--wordlist", "-w", "-hf"];
    foreach ($argv as $value) {
        if (in_array($value, $commands)) {

        } else {

            $striped .= $value . "| BF |";
        }
    }

    $striped = rtrim($striped, "| BF |");

    $args = explode("| BF |", $striped);

    try {
        if ($file = fopen($args[1], "r")) {
            $text = fread($file, filesize($args[1]));
            $hashes = explode(PHP_EOL, $text);
            foreach ($hashes as $hash) {
                if (!is_null(trim($hash)) && !empty(trim($hash)) && trim($hash) !== "\n" && trim($hash) !== "\r") {
                    if ($passwords = fopen($args[2], "r")) {
                        while (($password = fgets($passwords)) !== false) {
                            if (password_verify(trim($password), trim($hash))) {
                                echo "\e[32m";
                                echo "-------------------------------\n";
                                echo "Password Found: " . trim($password) . "\n";
                                echo "-------------------------------\n";
                                echo "\e[39m";
                                break;
                            } else {
                                echo "Check Password: " . trim($password) . "\n";
                            }
                        }

                    }
                    fclose($passwords);

                }
            }
        }
        fclose($file);
    } catch (Exception $err) {
        echo $err->getMessage();
    }
}
?>
