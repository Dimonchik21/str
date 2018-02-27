[![Build Status](https://travis-ci.org/fe3dback/str.svg?branch=master)](https://travis-ci.org/fe3dback/str) [![Coverage Status](https://coveralls.io/repos/github/fe3dback/str/badge.svg?branch=master)](https://coveralls.io/github/fe3dback/str?branch=master)

_in dev, please do not use in production_

# str/str

```php
$s = new Str('Hello, 世界');
$s->last(2); // 世界
$s->chars(); // ['H','e','l','l','o',',',' ','世','界']

$s
    ->ensureLeft('H') // Hello, 世界
    ->ensureRight('!!!') // Hello, 世界!!!
    ->trimRight('!') // Hello, 世界
    ->append('Str say - '); // Str say - Hello, 世界

$send = function (string $s) {};
$send((string)$s); // same
$send($s->toString()); // same
$send($s->getString()); // same
```

A fast string manipulation library with multibyte support. 
Based on "Stringy" library, with focus on speed.

Lib uses php7 features and does not throw any 
exceptions (because all input parameters are 
strongly typed). The code is completely covered by unit tests)

## install

__Requirements__:
- php7.0

```bash
composer require str/str
```

## support List

### Done
- [x] ensureLeft
- [x] ensureRight
- [x] hasPrefix
- [x] hasSuffix
- [x] contains
- [x] replace - add limit param
- [x] toLowerCase
- [x] toUpperCase
- [x] trim
- [x] trimLeft
- [x] trimRight
- [x] append
- [x] prepend
- [x] at
- [x] substr
- [x] chars
- [x] first
- [x] last
- [x] length
- [x] indexOf
- [x] indexOfLast
- [x] countSubstr
- [x] containsAll
- [x] containsAny
- [x] startsWith
- [x] startsWithAny
- [x] endsWith
- [x] endsWithAny
- [x] pad
- [x] padBoth
- [x] padLeft
- [x] padRight
- [x] insert
- [x] removeLeft
- [x] removeRight
- [x] repeat
- [x] reverse
- [x] shuffle
- [x] between
- [x] camelize
- [x] collapseWhitespace
- [x] dasherize
- [x] delimit
- [x] lowerCaseFirst
- [x] regexReplace
- [x] upperCaseFirst
- [x] isUUID

### Todo Stringy
- [ ] hasLowerCase
- [ ] hasUpperCase
- [ ] htmlDecode
- [ ] htmlEncode
- [ ] humanize
- [ ] isAlpha
- [ ] isAlphanumeric
- [ ] isBase64
- [ ] isBlank
- [ ] isHexadecimal
- [ ] isJson
- [ ] isLowerCase
- [ ] isSerialized
- [ ] isUpperCase
- [ ] lines
- [ ] longestCommonPrefix
- [ ] longestCommonSuffix
- [ ] longestCommonSubstring
- [ ] safeTruncate
- [ ] slugify
- [ ] slice
- [ ] split
- [ ] stripWhitespace
- [ ] surround
- [ ] swapCase
- [ ] tidy
- [ ] titleize
- [ ] toAscii
- [ ] toBoolean
- [ ] toSpaces
- [ ] toTabs
- [ ] toTitleCase
- [ ] truncate
- [ ] underscored
- [ ] upperCamelize

### Todo New


## benchmark

```bash
./vendor/bin/phpbench run --report=str
./vendor/bin/phpbench run -o markdown --report=str
```

Test subjects:
- FS ([str/str](https://github.com/fe3dback/str))
- Stringy ([danielstjules/Stringy](https://github.com/danielstjules/Stringy))

----

subject | mode | mem_peak | diff
 --- | --- | --- | --- 
bench_StrStatic | 239.000μs | 1,328,496b | 1.00x
bench_Str | 482.000μs | 1,355,320b | 2.02x
bench_Stringy | 1,479.000μs | 1,872,552b | 6.19x
bench_StringyStatic | 1,790.000μs | 1,894,024b | 7.49x

##### [see all other benchmark results](https://github.com/fe3dback/str/blob/master/benchmark.md)