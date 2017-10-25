# multibyte string methods

Methods for handling multibyte string manipulations.

[![Build Status][2]][1]
[![Codecov][4]][3]

## Installation

via [composer][5]:

    composer require jpuck/mbstring

## Usage

See the [tests](./tests) for more examples.

### Case Map

Creates an index of uppercase character positions in a string
that can be mapped to other strings.

```php
$original = '🔥 Foó, foó FOÓ 😁';
$casemap = new CaseMap($original);
$replaced = mb_eregi_replace('foó', 'bår', $original);
$restored = $casemap->transform($replaced);

echo "original: $original\n";
echo "replaced: $replaced\n";
echo "restored: $restored\n";
```

>     original: 🔥 Foó, foó FOÓ 😁  
>     replaced: 🔥 bår, bår bår 😁  
>     restored: 🔥 Bår, bår BÅR 😁  

[1]:https://travis-ci.org/jpuck/mbstring
[2]:https://travis-ci.org/jpuck/mbstring.svg?branch=master
[3]:https://codecov.io/gh/jpuck/mbstring/branch/master
[4]:https://img.shields.io/codecov/c/github/jpuck/mbstring/master.svg
[5]:https://getcomposer.org
