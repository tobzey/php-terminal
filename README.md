# php-terminal

php-terminal is a server side terminal with user defined commands and responses.

## Installation

Download the index.php and change the necessary variables.

```bash
$user = "anonymous";
$hostname = "mydomain.com";
$prefix = "$user@$hostname:";
$commands = [
    "a" => "b",
    "b" => "c",
    "c" => "d",
];
```

## Contributing
Pull requests are welcome. Please make sure to update tests as appropriate.
