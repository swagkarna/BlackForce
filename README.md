# BlackForce
Simple Bruteforce script that attacks PHP hashes

## About
Simple Bruteforce script that attacks PHP hashes

if you find a hash that been created with password_hash() function this script will try to bruteforce the password

You need a good passwordlist like:

Rockyou: [Download RockYou](https://github.com/praetorian-code/Hob0Rules/blob/master/wordlists/rockyou.txt.gz)

## Usage
```
 ____  _            _    ______                 
|  _ \| |          | |  |  ____|                
| |_) | | __ _  ___| | _| |__ ___  _ __ ___ ___ 
|  _ <| |/ _` |/ __| |/ /  __/ _ \| '__/ __/ _ \
| |_) | | (_| | (__|   <| | | (_) | | | (_|  __/
|____/|_|\__,_|\___|_|\_\_|  \___/|_|  \___\___|
                                                v0.1
Usage:
./attack.php -hf <hashfile> -w <passwordlist>
Example:
./attack.php -hf hash.txt -w passwords.txt

```

## Copyright

Black.Hacker | MIT
