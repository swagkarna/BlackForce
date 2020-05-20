# BlackForce 💀
Simple Bruteforce script that attacks PHP hashes

![](https://badgen.net/badge/version/0.1/blue) ![](https://badgen.net/github/license/BlackHacker511/BlackForce)
## About
Simple Bruteforce script that attacks PHP hashes

if you find a hash that been created with password_hash() function this script will try to bruteforce it

You need a good passwordlist like:

Rockyou: [Download RockYou](https://github.com/praetorian-code/Hob0Rules/blob/master/wordlists/rockyou.txt.gz)

## Requirements

+ PHP 7.0
+ PHP CLI

## Tested On
+ Linux [ 🐧 ]

Not tested on Windows and you might encouter issues ):

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

## Screenshot
![](https://i.imgur.com/aRTI3x1.png)

## Copyright

Black.Hacker | MIT
