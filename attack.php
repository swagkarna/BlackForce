#!/usr/bin/php
<?php
echo "\e[1;31m
-----------------------------------------------------
 ____  _            _    ______
|  _ \| |          | |  |  ____|
| |_) | | __ _  ___| | _| |__ ___  _ __ ___ ___
|  _ <| |/ _` |/ __| |/ /  __/ _ \| '__/ __/ _ \
| |_) | | (_| | (__|   <| | | (_) | | | (_|  __/
|____/|_|\__,_|\___|_|\_\_|  \___/|_|  \___\___|
                                                v0.1
-----------------------------------------------------\e[0m
";

$striped = null;
if ($argc != 5 || in_array($argv[1], array('--help', '-help', '-h', '-?'))) {
    echo "Usage:\n";
    echo "./attack.php -hf <hashfile> -w <passwordlist>\n";
    echo "Example:\n";
    echo "./attack.php -hf hash.txt -w passwords.txt\n";
    echo "-----------------------------------------------------\n";
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

    $found = [];
    try {
        if ($file = fopen($args[1], "r")) {
            $text = fread($file, filesize($args[1]));
            $hashes = explode(PHP_EOL, $text);
            foreach ($hashes as $hash) {
                if (!is_null(trim($hash)) && !empty(trim($hash)) && trim($hash) !== "\n" && trim($hash) !== "\r") {
                    if ($passwords = fopen($args[2], "r")) {
                        while (($password = fgets($passwords)) !== false) {
                            if (password_verify(trim($password), trim($hash))) {
                                echo "\e[1;32m";
                                echo "-------------------------------\n";
                                echo "Password Found: " . trim($password) . "\n";
                                echo "-------------------------------\n";
                                echo "\e[39m";
                                $found[] = [$hash => $password];
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

        $option = readline("Do you want to export result (Y/N): ");
        if ($option == "Y" or $option == "y") {
            $myfile = fopen("result - " . date("Y-m-d h:m:s") . ".txt", "w");
            fwrite($myfile, "[ BlackForce Result ]\n");
            fwrite($myfile, "------------------------\n");
            foreach ($found as $fph) {
                foreach ($fph as $hash => $password) {
                    fwrite($myfile, $hash . ":" . $password);
                }
            }
            fwrite($myfile, "------------------------\n");
            fclose($myfile);
        } else {
            exit();
        }
    } catch (Exception $err) {
        echo $err->getMessage();
    }
}
?>
