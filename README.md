# PHPUBG

This is a PHP wrapper for the PUBG Tracker API.

## Installation

To install:

`composer require cbacon/phpubg`

And then add the following to any file you wish to run it in:

`require 'vendor/autoload.php';`

## Usage

Instantiate the object, and pass in your API token and a Steam nickname:

`$pubg = new PHPUBG($apiToken, $nickname);`

To make a request:

```$r = $pubg->get();
$pubg->readBody($r);```

`readBody()` will return an array containing all of the API's data.
