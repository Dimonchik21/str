<?php

declare(strict_types=1);

use Str\Lib\StrModifiersMB;
use PHPUnit\Framework\TestCase;

class StrModifiersMBTest extends TestCase
{
    /**
     * @dataProvider SubstrProvider
     * @param $expected
     * @param $str
     * @param int $start
     * @param int $length
     */
    public function testSubstr($expected, $str, $start = 0, $length = 1)
    {
        $this->assertEquals($expected, StrModifiersMB::substr($str, $start, $length));
    }

    public function SubstrProvider()
    {
        return [
            ['Hel', 'Hello world', 0, 3],
            ['H世', 'H世ello world', 0, 2],
            [' H世', '  H世', 1, 4],
            ['123', '000123000', 3, 3],
        ];
    }

    /**
     * @dataProvider EnsureRightProvider
     * @param array $inp
     * @param string $out
     */
    public function testEnsureRight(array $inp, string $out)
    {
        $this->assertEquals($out, StrModifiersMB::ensureRight(
            array_shift($inp),
            array_shift($inp)
        ));
    }

    public function EnsureRightProvider()
    {
        return
            [
                [
                    ['Hello world', '<<_right'],
                    'Hello world<<_right',
                ],
                [
                    ['Hello world<<_right', '<<_right'],
                    'Hello world<<_right',
                ],
                [
                    ['q', 'q'],
                    'q',
                ],
                [
                    ['qq', 'q'],
                    'qq',
                ],
                [
                    ['Hello, 世界', '世'],
                    'Hello, 世界世',
                ],
                [
                    ['Hello, 世界界', '界'],
                    'Hello, 世界界',
                ],
                [
                    ['世', '世'],
                    '世',
                ],
            ];
    }

    /**
     * @dataProvider EnsureLeftProvider
     * @param array $inp
     * @param string $out
     */
    public function testEnsureLeft(array $inp, string $out)
    {
        $this->assertEquals($out, StrModifiersMB::ensureLeft(
            array_shift($inp),
            array_shift($inp)
        ));
    }

    public function EnsureLeftProvider()
    {
        return
            [
                [
                    ['Hello world', '_left>>'],
                    '_left>>Hello world',
                ],
                [
                    ['_left>>Hello world', '_left>>'],
                    '_left>>Hello world',
                ],
                [
                    ['q', 'q'],
                    'q',
                ],
                [
                    ['qq', 'q'],
                    'qq',
                ],
                [
                    ['Hello, 世界', '界'],
                    '界Hello, 世界',
                ],
                [
                    ['界Hello, 世界', '界'],
                    '界Hello, 世界',
                ],
                [
                    ['世', '世'],
                    '世',
                ],
            ];
    }

    /**
     * @dataProvider AtProvider
     * @param $expected
     * @param $str
     * @param $pos
     */
    public function testAt($expected, $str, $pos)
    {
        $this->assertEquals($expected, StrModifiersMB::at($str, $pos));
    }

    public function AtProvider()
    {
        return [
            ['H', 'Hello world', 0],
            ['e', 'Hello world', 1],
            ['d', 'Hello world', -1],
            ['世', '世', -1],
            ['世', '世', 0],
            ['', '', 0],
            ['', '', -1],
            ['', '', 1],
        ];
    }

    /**
     * @dataProvider charsProvider()
     * @param $expected
     * @param $str
     */
    public function testChars($expected, $str)
    {
        $this->assertInternalType('array', $expected);
        $this->assertEquals($expected, StrModifiersMB::chars($str));
    }

    public function charsProvider()
    {
        return [
            [[], ''],
            [['T', 'e', 's', 't'], 'Test'],
            [['F', 'ò', 'ô', ' ', 'B', 'à', 'ř'], 'Fòô Bàř']
        ];
    }

    /**
     * @dataProvider firstProvider()
     * @param $expected
     * @param $str
     * @param $n
     */
    public function testFirst($expected, $str, $n)
    {
        $this->assertEquals($expected, StrModifiersMB::first($str, $n));
    }

    public function firstProvider()
    {
        return [
            ['', 'foo bar', -5],
            ['', 'foo bar', 0],
            ['f', 'foo bar', 1],
            ['foo', 'foo bar', 3],
            ['foo bar', 'foo bar', 7],
            ['foo bar', 'foo bar', 8],
            ['', 'fòô bàř', -5],
            ['', 'fòô bàř', 0],
            ['f', 'fòô bàř', 1],
            ['fòô', 'fòô bàř', 3],
            ['fòô bàř', 'fòô bàř', 7],
            ['fòô bàř', 'fòô bàř', 8],
        ];
    }

    /**
     * @dataProvider lastProvider()
     * @param $expected
     * @param $str
     * @param $n
     */
    public function testLast($expected, $str, $n)
    {
        $this->assertEquals($expected, StrModifiersMB::last($str, $n));
    }

    public function lastProvider()
    {
        return [
            ['', 'foo bar', -5],
            ['', 'foo bar', 0],
            ['r', 'foo bar', 1],
            ['bar', 'foo bar', 3],
            ['foo bar', 'foo bar', 7],
            ['foo bar', 'foo bar', 8],
            ['', 'fòô bàř', -5],
            ['', 'fòô bàř', 0],
            ['ř', 'fòô bàř', 1],
            ['bàř', 'fòô bàř', 3],
            ['fòô bàř', 'fòô bàř', 7],
            ['fòô bàř', 'fòô bàř', 8],
        ];
    }

    /**
     * @dataProvider toLowerCaseProvider()
     * @param $expected
     * @param $str
     */
    public function testToLowerCase($expected, $str)
    {
        $this->assertEquals($expected, StrModifiersMB::toLowerCase($str));
    }
    public function toLowerCaseProvider()
    {
        return [
            ['foo bar', 'FOO BAR'],
            [' foo_bar ', ' FOO_bar '],
            ['fòô bàř', 'FÒÔ BÀŘ'],
            [' fòô_bàř ', ' FÒÔ_bàř '],
            ['αυτοκίνητο', 'ΑΥΤΟΚΊΝΗΤΟ'],
        ];
    }

    /**
     * @dataProvider toUpperCaseProvider()
     * @param $expected
     * @param $str
     */
    public function testToUpperCase($expected, $str)
    {
        $this->assertEquals($expected, StrModifiersMB::toUpperCase($str));
    }
    public function toUpperCaseProvider()
    {
        return [
            ['FOO BAR', 'foo bar'],
            [' FOO_BAR ', ' FOO_bar '],
            ['FÒÔ BÀŘ', 'fòô bàř'],
            [' FÒÔ_BÀŘ ', ' FÒÔ_bàř '],
            ['ΑΥΤΟΚΊΝΗΤΟ', 'αυτοκίνητο'],
        ];
    }

    /**
     * @dataProvider appendProvider()
     * @param $expected
     * @param $str
     * @param $string
     */
    public function testAppend($expected, $str, $string)
    {
        $this->assertEquals($expected, StrModifiersMB::append($str, $string));
    }
    public function appendProvider()
    {
        return [
            ['foobar', 'foo', 'bar'],
            ['fòôbàř', 'fòô', 'bàř']
        ];
    }

    /**
     * @dataProvider prependProvider()
     * @param $expected
     * @param $str
     * @param $string
     */
    public function testPrepend($expected, $str, $string)
    {
        $this->assertEquals($expected, StrModifiersMB::prepend($str, $string));
    }
    public function prependProvider()
    {
        return [
            ['foobar', 'bar', 'foo'],
            ['fòôbàř', 'bàř', 'fòô']
        ];
    }

    /**
     * @dataProvider ReplaceProvider
     * @param $params
     * @param $expected
     */
    public function testReplace($params, $expected)
    {
        $this->assertEquals($expected, StrModifiersMB::replace(
            array_shift($params), // s
            array_shift($params), // old
            array_shift($params), // new
            array_shift($params)  // limit
        ));
    }
    public function ReplaceProvider()
    {
        return
            [
                [
                    ['oink oink oinkk', 'k', 'ky', 2],
                    'oinky oinky oinkk'
                ],
                [
                    ['oink oink oink', 'k', 'ky', 4],
                    'oinky oinky oinky'
                ],
                [
                    ['oink oink oink', 'oink', 'moo', -1],
                    'moo moo moo'
                ],
                [
                    ['hello world, hello universe', 'hello', 'привет', 1],
                    'привет world, hello universe'
                ],
                [
                    ['banana', 'a', 'e', 4],
                    'benene'
                ],
                [
                    ['ban 世 a!', ' 世', ' foo', -1],
                    'ban foo a!'
                ],
                [
                    ['世世世世世', '世', '界', 2],
                    '界界世世世'
                ],
                [
                    ['世世世世世', '世', '界', 0],
                    '世世世世世'
                ],
                [
                    ['世q世q世', 'q', 'q', 5],
                    '世q世q世'
                ],
                [
                    ['世q世q世', 'z', 'zz', 2],
                    '世q世q世'
                ],
                [
                    ['', 'a', 'b', -1],
                    ''
                ],
            ];
    }

    /**
     * @dataProvider trimProvider()
     * @param $expected
     * @param $str
     * @param string $chars
     */
    public function testTrim($expected, $str, $chars = '')
    {
        $this->assertEquals($expected, StrModifiersMB::trim($str, $chars));
    }
    public function trimProvider()
    {
        return [
            ['foo   bar', '  foo   bar  '],
            ['foo bar', ' foo bar'],
            ['foo bar', 'foo bar '],
            ['foo bar', "\n\t foo bar \n\t"],
            ['fòô   bàř', '  fòô   bàř  '],
            ['fòô bàř', ' fòô bàř'],
            ['fòô bàř', 'fòô bàř '],
            [' foo bar ', "\n\t foo bar \n\t", "\n\t"],
            ['fòô bàř', "\n\t fòô bàř \n\t", ''],
            ['fòô', ' fòô ', ''], // narrow no-break space (U+202F)
            ['fòô', '  fòô  ', ''], // medium mathematical space (U+205F)
            ['fòô', '           fòô', ''] // spaces U+2000 to U+200A
        ];
    }

    /**
     * @dataProvider trimLeftProvider()
     * @param $expected
     * @param $str
     * @param string $chars
     */
    public function testTrimLeft($expected, $str, $chars = '')
    {
        $this->assertEquals($expected, StrModifiersMB::trimLeft($str, $chars));
    }
    public function trimLeftProvider()
    {
        return [
            ['foo   bar  ', '  foo   bar  '],
            ['foo bar', ' foo bar'],
            ['foo bar ', 'foo bar '],
            ["foo bar \n\t", "\n\t foo bar \n\t"],
            ['fòô   bàř  ', '  fòô   bàř  '],
            ['fòô bàř', ' fòô bàř'],
            ['fòô bàř ', 'fòô bàř '],
            ['foo bar', '--foo bar', '-'],
            ['fòô bàř', 'òòfòô bàř', 'ò'],
            ["fòô bàř \n\t", "\n\t fòô bàř \n\t", ''],
            ['fòô ', ' fòô ', ''], // narrow no-break space (U+202F)
            ['fòô  ', '  fòô  ', ''], // medium mathematical space (U+205F)
            ['fòô', '           fòô', ''] // spaces U+2000 to U+200A
        ];
    }

    /**
     * @dataProvider trimRightProvider()
     * @param $expected
     * @param $str
     * @param $chars
     */
    public function testTrimRight($expected, $str, $chars = '')
    {
        $this->assertEquals($expected, StrModifiersMB::trimRight($str, $chars));
    }
    public function trimRightProvider()
    {
        return [
            ['  foo   bar', '  foo   bar  '],
            ['foo bar', 'foo bar '],
            [' foo bar', ' foo bar'],
            ["\n\t foo bar", "\n\t foo bar \n\t"],
            ['  fòô   bàř', '  fòô   bàř  '],
            ['fòô bàř', 'fòô bàř '],
            [' fòô bàř', ' fòô bàř'],
            ['foo bar', 'foo bar--', '-'],
            ['fòô bàř', 'fòô bàřòò', 'ò'],
            ["\n\t fòô bàř", "\n\t fòô bàř \n\t", ''],
            [' fòô', ' fòô ', ''], // narrow no-break space (U+202F)
            ['  fòô', '  fòô  ', ''], // medium mathematical space (U+205F)
            ['fòô', 'fòô           ', ''] // spaces U+2000 to U+200A
        ];
    }

    /**
     * @dataProvider padProvider()
     * @param $expected
     * @param $str
     * @param $length
     * @param $padStr
     * @param $padType
     */
    public function testPad($expected, $str, $length, $padStr = ' ', $padType = 'right')
    {
        $this->assertEquals($expected, StrModifiersMB::pad($str, $length, $padStr, $padType));
    }
    public function padProvider()
    {
        return [
            // length <= str
            ['foo bar', 'foo bar', -1],
            ['foo bar', 'foo bar', 7],
            ['fòô bàř', 'fòô bàř', 7, ' ', 'right'],
            // right
            ['foo bar  ', 'foo bar', 9],
            ['foo bar_*', 'foo bar', 9, '_*', 'right'],
            ['fòô bàř¬ø¬', 'fòô bàř', 10, '¬ø', 'right'],
            // left
            ['  foo bar', 'foo bar', 9, ' ', 'left'],
            ['_*foo bar', 'foo bar', 9, '_*', 'left'],
            ['¬ø¬fòô bàř', 'fòô bàř', 10, '¬ø', 'left'],
            // both
            ['foo bar ', 'foo bar', 8, ' ', 'both'],
            ['¬fòô bàř¬ø', 'fòô bàř', 10, '¬ø', 'both'],
            ['¬øfòô bàř¬øÿ', 'fòô bàř', 12, '¬øÿ', 'both'],
            // wrong pad type
            ['foo bar', 'foo bar', 8, ' ', 'wrong']
        ];
    }

    /**
     * @dataProvider padLeftProvider()
     * @param $expected
     * @param $str
     * @param $length
     * @param $padStr
     */
    public function testPadLeft($expected, $str, $length, $padStr = ' ')
    {
        $this->assertEquals($expected, StrModifiersMB::padLeft($str, $length, $padStr));
    }
    public function padLeftProvider()
    {
        return [
            ['  foo bar', 'foo bar', 9],
            ['_*foo bar', 'foo bar', 9, '_*'],
            ['_*_foo bar', 'foo bar', 10, '_*'],
            ['  fòô bàř', 'fòô bàř', 9, ' '],
            ['¬øfòô bàř', 'fòô bàř', 9, '¬ø'],
            ['¬ø¬fòô bàř', 'fòô bàř', 10, '¬ø'],
            ['¬ø¬øfòô bàř', 'fòô bàř', 11, '¬ø'],
        ];
    }

    /**
     * @dataProvider padRightProvider()
     * @param $expected
     * @param $str
     * @param $length
     * @param $padStr
     */
    public function testPadRight($expected, $str, $length, $padStr = ' ')
    {
        $this->assertEquals($expected, StrModifiersMB::padRight($str, $length, $padStr));
    }
    public function padRightProvider()
    {
        return [
            ['foo bar  ', 'foo bar', 9],
            ['foo bar_*', 'foo bar', 9, '_*'],
            ['foo bar_*_', 'foo bar', 10, '_*'],
            ['fòô bàř  ', 'fòô bàř', 9, ' '],
            ['fòô bàř¬ø', 'fòô bàř', 9, '¬ø'],
            ['fòô bàř¬ø¬', 'fòô bàř', 10, '¬ø'],
            ['fòô bàř¬ø¬ø', 'fòô bàř', 11, '¬ø'],
        ];
    }

    /**
     * @dataProvider padBothProvider()
     * @param $expected
     * @param $str
     * @param $length
     * @param $padStr
     */
    public function testPadBoth($expected, $str, $length, $padStr = ' ')
    {
        $this->assertEquals($expected, StrModifiersMB::padBoth($str, $length, $padStr));
    }
    public function padBothProvider()
    {
        return [
            ['foo bar ', 'foo bar', 8],
            [' foo bar ', 'foo bar', 9, ' '],
            ['fòô bàř ', 'fòô bàř', 8, ' '],
            [' fòô bàř ', 'fòô bàř', 9, ' '],
            ['fòô bàř¬', 'fòô bàř', 8, '¬ø'],
            ['¬fòô bàř¬', 'fòô bàř', 9, '¬ø'],
            ['¬fòô bàř¬ø', 'fòô bàř', 10, '¬ø'],
            ['¬øfòô bàř¬ø', 'fòô bàř', 11, '¬ø'],
            ['¬fòô bàř¬ø', 'fòô bàř', 10, '¬øÿ'],
            ['¬øfòô bàř¬ø', 'fòô bàř', 11, '¬øÿ'],
            ['¬øfòô bàř¬øÿ', 'fòô bàř', 12, '¬øÿ']
        ];
    }

    /**
     * @dataProvider insertProvider()
     * @param $expected
     * @param $str
     * @param $substring
     * @param $index
     */
    public function testInsert($expected, $str, $substring, $index)
    {
        $this->assertEquals($expected, StrModifiersMB::insert($str, $substring, $index));
    }
    public function insertProvider()
    {
        return [
            ['foo bar', 'oo bar', 'f', 0],
            ['foo bar', 'f bar', 'oo', 1],
            ['f bar', 'f bar', 'oo', 20],
            ['foo bar', 'foo ba', 'r', 6],
            ['fòôbàř', 'fòôbř', 'à', 4],
            ['fòô bàř', 'òô bàř', 'f', 0],
            ['fòô bàř', 'f bàř', 'òô', 1],
            ['fòô bàř', 'fòô bà', 'ř', 6]
        ];
    }

    /**
     * @dataProvider removeLeftProvider()
     * @param $expected
     * @param $str
     * @param $substring
     */
    public function testRemoveLeft($expected, $str, $substring)
    {
        $this->assertEquals($expected, StrModifiersMB::removeLeft($str, $substring));
    }
    public function removeLeftProvider()
    {
        $s = 'foo bar';
        return [
            ['foo bar', 'foo bar', ''],
            ['oo bar', 'foo bar', 'f'],
            ['bar', 'foo bar', 'foo '],
            ['foo bar', 'foo bar', 'oo'],
            ['foo bar', 'foo bar', 'oo bar'],
            ['oo bar', 'foo bar', StrModifiersMB::first($s)],
            ['oo bar', 'foo bar', StrModifiersMB::at($s,0)],
            ['fòô bàř', 'fòô bàř', ''],
            ['òô bàř', 'fòô bàř', 'f'],
            ['bàř', 'fòô bàř', 'fòô '],
            ['fòô bàř', 'fòô bàř', 'òô'],
            ['fòô bàř', 'fòô bàř', 'òô bàř']
        ];
    }

    /**
     * @dataProvider removeRightProvider()
     * @param $expected
     * @param $str
     * @param $substring
     */
    public function testRemoveRight($expected, $str, $substring)
    {
        $this->assertEquals($expected, StrModifiersMB::removeRight($str, $substring));
    }
    public function removeRightProvider()
    {
        $s = 'foo bar';
        return [
            ['foo bar', 'foo bar', ''],
            ['foo ba', 'foo bar', 'r'],
            ['foo', 'foo bar', ' bar'],
            ['foo bar', 'foo bar', 'ba'],
            ['foo bar', 'foo bar', 'foo ba'],
            ['foo ba', 'foo bar', StrModifiersMB::last($s)],
            ['foo ba', 'foo bar', StrModifiersMB::at($s,6)],
            ['fòô bàř', 'fòô bàř', ''],
            ['fòô bà', 'fòô bàř', 'ř'],
            ['fòô', 'fòô bàř', ' bàř'],
            ['fòô bàř', 'fòô bàř', 'bà'],
            ['fòô bàř', 'fòô bàř', 'fòô bà']
        ];
    }

    /**
     * @dataProvider repeatProvider()
     * @param $expected
     * @param $str
     * @param $multiplier
     */
    public function testRepeat($expected, $str, $multiplier)
    {
        $this->assertEquals($expected, StrModifiersMB::repeat($str, $multiplier));
    }
    public function repeatProvider()
    {
        return [
            ['', 'foo', 0],
            ['foo', 'foo', 1],
            ['foofoo', 'foo', 2],
            ['foofoofoo', 'foo', 3],
            ['fòô', 'fòô', 1],
            ['fòôfòô', 'fòô', 2],
            ['fòôfòôfòô', 'fòô', 3]
        ];
    }

    /**
     * @dataProvider reverseProvider()
     * @param $expected
     * @param $str
     */
    public function testReverse($expected, $str)
    {
        $this->assertEquals($expected, StrModifiersMB::reverse($str));
    }
    public function reverseProvider()
    {
        return [
            ['', ''],
            ['raboof', 'foobar'],
            ['řàbôòf', 'fòôbàř'],
            ['řàb ôòf', 'fòô bàř'],
            ['∂∆ ˚åß', 'ßå˚ ∆∂']
        ];
    }

    /**
     * @dataProvider shuffleProvider()
     * @param $str
     */
    public function testShuffle($str)
    {
        $result = StrModifiersMB::shuffle($str);

        $oldValues = StrModifiersMB::chars($str);
        $newValues = StrModifiersMB::chars($result);

        $countOld = array_count_values($oldValues);
        $countNew = array_count_values($newValues);

        // We'll make sure that the chars are present after shuffle
        $this->assertEquals($countOld, $countNew);
        $this->assertEmpty(array_diff($countOld, $countNew));
    }
    public function shuffleProvider()
    {
        return [
            ['foo bar'],
            ['∂∆ ˚åß'],
            ['å´¥©¨ˆßå˚ ∆∂˙©å∑¥øœ¬']
        ];
    }

    /**
     * @dataProvider betweenProvider()
     * @param $expected
     * @param $str
     * @param $start
     * @param $end
     * @param int $offset
     */
    public function testBetween($expected, $str, $start, $end, $offset = 0)
    {
        $this->assertEquals($expected, StrModifiersMB::between($str, $start, $end, $offset), $str);
    }
    public function betweenProvider()
    {
        return [
            ['', 'foo', '{', '}'],
            ['', '{foo', '{', '}'],
            ['foo', '{foo}', '{', '}'],
            ['{foo', '{{foo}', '{', '}'],
            ['', '{}foo}', '{', '}'],
            ['foo', '}{foo}', '{', '}'],
            ['foo', 'A description of {foo} goes here', '{', '}'],
            ['bar', '{foo} and {bar}', '{', '}', 1],
            ['', 'fòô', '{', '}', 0],
            ['', '{fòô', '{', '}', 0],
            ['fòô', '{fòô}', '{', '}', 0],
            ['{fòô', '{{fòô}', '{', '}', 0],
            ['', '{}fòô}', '{', '}', 0],
            ['fòô', '}{fòô}', '{', '}', 0],
            ['fòô', 'A description of {fòô} goes here', '{', '}', 0],
            ['bàř', '{fòô} and {bàř}', '{', '}', 1]
        ];
    }

    /**
     * @dataProvider camelizeProvider()
     * @param $expected
     * @param $str
     */
    public function testCamelize($expected, $str)
    {
        $this->assertEquals($expected, StrModifiersMB::camelize($str), $str);
    }
    public function camelizeProvider()
    {
        return [
            ['camelCase', 'CamelCase'],
            ['camelCase', 'Camel-Case'],
            ['camelCase', 'camel case'],
            ['camelCase', 'camel -case'],
            ['camelCase', 'camel - case'],
            ['camelCase', 'camel_case'],
            ['camelCTest', 'camel c test'],
            ['stringWith1Number', 'string_with1number'],
            ['stringWith22Numbers', 'string-with-2-2 numbers'],
            ['dataRate', 'data_rate'],
            ['backgroundColor', 'background-color'],
            ['yesWeCan', 'yes_we_can'],
            ['mozSomething', '-moz-something'],
            ['carSpeed', '_car_speed_'],
            ['serveHTTP', 'ServeHTTP'],
            ['1Camel2Case', '1camel2case'],
            ['camelΣase', 'camel σase'],
            ['στανιλCase', 'Στανιλ case'],
            ['σamelCase', 'σamel  Case']
        ];
    }

    /**
     * @dataProvider upperCaseFirstProvider()
     * @param $expected
     * @param $str
     */
    public function testUpperCaseFirst($expected, $str)
    {
        $this->assertEquals($expected, StrModifiersMB::upperCaseFirst($str), $str);
    }
    public function upperCaseFirstProvider()
    {
        return [
            ['Test', 'Test'],
            ['Test', 'test'],
            ['1a', '1a'],
            ['Σ test', 'σ test'],
            [' σ test', ' σ test']
        ];
    }

    /**
     * @dataProvider lowerCaseFirstProvider()
     * @param $expected
     * @param $str
     */
    public function testLowerCaseFirst($expected, $str)
    {
        $this->assertEquals($expected, StrModifiersMB::lowerCaseFirst($str), $str);
    }
    public function lowerCaseFirstProvider()
    {
        return [
            ['test', 'Test'],
            ['test', 'test'],
            ['1a', '1a'],
            ['σ test', 'Σ test'],
            [' Σ test', ' Σ test']
        ];
    }

    /**
     * @dataProvider collapseWhitespaceProvider()
     * @param $expected
     * @param $str
     */
    public function testCollapseWhitespace($expected, $str)
    {
        $this->assertEquals($expected, StrModifiersMB::collapseWhitespace($str), $str);
    }
    public function collapseWhitespaceProvider()
    {
        return [
            ['foo bar', '  foo   bar  '],
            ['test string', 'test string'],
            ['Ο συγγραφέας', '   Ο     συγγραφέας  '],
            ['123', ' 123 '],
            ['', ' '], // no-break space (U+00A0)
            ['', '           '], // spaces U+2000 to U+200A
            ['', ' '], // narrow no-break space (U+202F)
            ['', ' '], // medium mathematical space (U+205F)
            ['', '　'], // ideographic space (U+3000)
            ['1 2 3', '  1  2  3　　'],
            ['', ' '],
            ['', ''],
        ];
    }

    /**
     * @dataProvider regexReplaceProvider()
     * @param $expected
     * @param $str
     * @param $pattern
     * @param $replacement
     * @param string $options
     */
    public function testRegexReplace($expected, $str, $pattern, $replacement, $options = 'msr')
    {
        $this->assertEquals($expected, StrModifiersMB::regexReplace($str, $pattern, $replacement, $options), $str);
    }
    public function regexReplaceProvider()
    {
        return [
            ['', '', '', ''],
            ['bar', 'foo', 'f[o]+', 'bar'],
            ['o bar', 'foo bar', 'f(o)o', '\1'],
            ['bar', 'foo bar', 'f[O]+\s', '', 'i'],
            ['foo', 'bar', '[[:alpha:]]{3}', 'foo'],
            ['', '', '', '', 'msr'],
            ['bàř', 'fòô ', 'f[òô]+\s', 'bàř', 'msr'],
            ['fòô', 'fò', '(ò)', '\\1ô', 'msr'],
            ['fòô', 'bàř', '[[:alpha:]]{3}', 'fòô', 'msr']
        ];
    }

    /**
     * @dataProvider dasherizeProvider()
     * @param $expected
     * @param $str
     */
    public function testDasherize($expected, $str)
    {
        $this->assertEquals($expected, StrModifiersMB::dasherize($str), $str);
    }
    public function dasherizeProvider()
    {
        return [
            ['test-case', 'testCase'],
            ['test-case', 'Test-Case'],
            ['test-case', 'test case'],
            ['-test-case', '-test -case'],
            ['test-case', 'test - case'],
            ['test-case', 'test_case'],
            ['test-c-test', 'test c test'],
            ['test-d-case', 'TestDCase'],
            ['test-c-c-test', 'TestCCTest'],
            ['string-with1number', 'string_with1number'],
            ['string-with-2-2-numbers', 'String-with_2_2 numbers'],
            ['1test2case', '1test2case'],
            ['data-rate', 'dataRate'],
            ['car-speed', 'CarSpeed'],
            ['yes-we-can', 'yesWeCan'],
            ['background-color', 'backgroundColor'],
            ['dash-σase', 'dash Σase'],
            ['στανιλ-case', 'Στανιλ case'],
            ['σash-case', 'Σash  Case']
        ];
    }

    /**
     * @dataProvider delimitProvider()
     * @param $expected
     * @param $str
     * @param $delimiter
     */
    public function testDelimit($expected, $str, $delimiter)
    {
        $this->assertEquals($expected, StrModifiersMB::delimit($str, $delimiter), $str);
    }
    public function delimitProvider()
    {
        return [
            ['test*case', 'testCase', '*'],
            ['test&case', 'Test-Case', '&'],
            ['test#case', 'test case', '#'],
            ['test**case', 'test -case', '**'],
            ['~!~test~!~case', '-test - case', '~!~'],
            ['test*case', 'test_case', '*'],
            ['test%c%test', '  test c test', '%'],
            ['test+u+case', 'TestUCase', '+'],
            ['test=c=c=test', 'TestCCTest', '='],
            ['string#>with1number', 'string_with1number', '#>'],
            ['1test2case', '1test2case', '*'],
            ['test ύα σase', 'test Σase', ' ύα ',],
            ['στανιλαcase', 'Στανιλ case', 'α',],
            ['σashΘcase', 'Σash  Case', 'Θ']
        ];
    }

    /**
     * @dataProvider htmlEncodeProvider()
     * @param $expected
     * @param $str
     * @param int $flags
     */
    public function testHtmlEncode($expected, $str, $flags = ENT_COMPAT)
    {
        $this->assertEquals($expected, StrModifiersMB::htmlEncode($str, $flags), $str);
    }
    public function htmlEncodeProvider()
    {
        return [
            ['&amp;', '&'],
            ['&quot;', '"'],
            ['&#039;', "'", ENT_QUOTES],
            ['&lt;', '<'],
            ['&gt;', '>'],
        ];
    }

    /**
     * @dataProvider htmlDecodeProvider()
     * @param $expected
     * @param $str
     * @param int $flags
     */
    public function testHtmlDecode($expected, $str, $flags = ENT_COMPAT)
    {
        $this->assertEquals($expected, StrModifiersMB::htmlDecode($str, $flags), $str);
    }
    public function htmlDecodeProvider()
    {
        return [
            ['&', '&amp;'],
            ['"', '&quot;'],
            ["'", '&#039;', ENT_QUOTES],
            ['<', '&lt;'],
            ['>', '&gt;'],
        ];
    }

    /**
     * @dataProvider humanizeProvider()
     * @param $expected
     * @param $str
     */
    public function testHumanize($expected, $str)
    {
        $this->assertEquals($expected, StrModifiersMB::humanize($str), $str);
    }
    public function humanizeProvider()
    {
        return [
            ['Author', 'author_id'],
            ['Test user', ' _test_user_'],
            ['Συγγραφέας', ' συγγραφέας_id ']
        ];
    }

    /**
     * @dataProvider linesProvider()
     * @param $expected
     * @param $str
     */
    public function testLines($expected, $str)
    {
        $result = StrModifiersMB::lines($str);
        $expectedCount = count($expected);

        if ($expectedCount === 0) { $this->assertEmpty($result); }

        for ($i = 0; $i < $expectedCount; $i++) {
            $this->assertEquals($expected[$i], $result[$i]);
        }
    }
    public function linesProvider()
    {
        return [
            [[], ''],
            [[''], "\r\n"],
            [['foo', 'bar'], "foo\nbar"],
            [['foo', 'bar'], "foo\rbar"],
            [['foo', 'bar'], "foo\r\nbar"],
            [['foo', '', 'bar'], "foo\r\n\r\nbar"],
            [['foo', 'bar', ''], "foo\r\nbar\r\n"],
            [['', 'foo', 'bar'], "\r\nfoo\r\nbar"],
            [['fòô', 'bàř'], "fòô\nbàř"],
            [['fòô', 'bàř'], "fòô\rbàř"],
            [['fòô', 'bàř'], "fòô\n\rbàř"],
            [['fòô', 'bàř'], "fòô\r\nbàř"],
            [['fòô', '', 'bàř'], "fòô\r\n\r\nbàř"],
            [['fòô', 'bàř', ''], "fòô\r\nbàř\r\n"],
            [['', 'fòô', 'bàř'], "\r\nfòô\r\nbàř"],
        ];
    }

    /**
     * @dataProvider splitProvider()
     * @param $expected
     * @param $str
     * @param $pattern
     * @param int $limit
     */
    public function testSplit($expected, $str, $pattern, $limit = -1)
    {
        $result = StrModifiersMB::split($str, $pattern, $limit);
        $expectedLen = count($expected);

        if ($expectedLen === 0) { $this->assertEmpty($result); }

        for ($i = 0; $i < $expectedLen; $i++) {
            $this->assertEquals($expected[$i], $result[$i]);
        }
    }
    public function splitProvider()
    {
        return [
            [['foo,bar,baz'], 'foo,bar,baz', ''],
            [['foo,bar,baz'], 'foo,bar,baz', '-'],
            [['foo', 'bar', 'baz'], 'foo,bar,baz', ','],
            [['foo', 'bar', 'baz'], 'foo,bar,baz', ',', -1],
            [['foo', 'bar', 'baz'], 'foo,bar,baz', ',', -1],
            [[], 'foo,bar,baz', ',', 0],
            [['foo'], 'foo,bar,baz', ',', 1],
            [['foo', 'bar'], 'foo,bar,baz', ',', 2],
            [['foo', 'bar', 'baz'], 'foo,bar,baz', ',', 3],
            [['foo', 'bar', 'baz'], 'foo,bar,baz', ',', 10],
            [['fòô,bàř,baz'], 'fòô,bàř,baz', '-', -1],
            [['fòô', 'bàř', 'baz'], 'fòô,bàř,baz', ',', -1],
            [['fòô', 'bàř', 'baz'], 'fòô,bàř,baz', ',', -1],
            [['fòô', 'bàř', 'baz'], 'fòô,bàř,baz', ',', -1],
            [[], 'fòô,bàř,baz', ',', 0],
            [['fòô'], 'fòô,bàř,baz', ',', 1],
            [['fòô', 'bàř'], 'fòô,bàř,baz', ',', 2],
            [['fòô', 'bàř', 'baz'], 'fòô,bàř,baz', ',', 3],
            [['fòô', 'bàř', 'baz'], 'fòô,bàř,baz', ',', 10]
        ];
    }

    /**
     * @dataProvider longestCommonPrefixProvider()
     * @param $expected
     * @param $str
     * @param $otherStr
     */
    public function testLongestCommonPrefix($expected, $str, $otherStr)
    {
        $this->assertEquals($expected, StrModifiersMB::longestCommonPrefix($str, $otherStr), $str);
    }
    public function longestCommonPrefixProvider()
    {
        return [
            ['foo', 'foobar', 'foo bar'],
            ['foo bar', 'foo bar', 'foo bar'],
            ['f', 'foo bar', 'far boo'],
            ['', 'toy car', 'foo bar'],
            ['', 'foo bar', ''],
            ['fòô', 'fòôbar', 'fòô bar'],
            ['fòô bar', 'fòô bar', 'fòô bar'],
            ['fò', 'fòô bar', 'fòr bar'],
            ['', 'toy car', 'fòô bar'],
            ['', 'fòô bar', ''],
        ];
    }

    /**
     * @dataProvider longestCommonSuffixProvider()
     * @param $expected
     * @param $str
     * @param $otherStr
     */
    public function testLongestCommonSuffix($expected, $str, $otherStr)
    {
        $this->assertEquals($expected, StrModifiersMB::longestCommonSuffix($str, $otherStr), $str);
    }
    public function longestCommonSuffixProvider()
    {
        return [
            ['bar', 'foobar', 'foo bar'],
            ['foo bar', 'foo bar', 'foo bar'],
            ['ar', 'foo bar', 'boo far'],
            ['', 'foo bad', 'foo bar'],
            ['', 'foo bar', ''],
            ['bàř', 'fòôbàř', 'fòô bàř'],
            ['fòô bàř', 'fòô bàř', 'fòô bàř'],
            [' bàř', 'fòô bàř', 'fòr bàř'],
            ['', 'toy car', 'fòô bàř'],
            ['', 'fòô bàř', ''],
        ];
    }

    /**
     * @dataProvider longestCommonSubstringProvider()
     * @param $expected
     * @param $str
     * @param $otherStr
     */
    public function testLongestCommonSubstring($expected, $str, $otherStr)
    {
        $this->assertEquals($expected, StrModifiersMB::longestCommonSubstring($str, $otherStr), $str);
    }
    public function longestCommonSubstringProvider()
    {
        return [
            ['foo', 'foobar', 'foo bar'],
            ['foo bar', 'foo bar', 'foo bar'],
            ['oo ', 'foo bar', 'boo far'],
            ['foo ba', 'foo bad', 'foo bar'],
            ['', 'foo bar', ''],
            ['fòô', 'fòôbàř', 'fòô bàř'],
            ['fòô bàř', 'fòô bàř', 'fòô bàř'],
            [' bàř', 'fòô bàř', 'fòr bàř'],
            [' ', 'toy car', 'fòô bàř'],
            ['', 'fòô bàř', ''],
        ];
    }

    /**
     * @dataProvider safeTruncateProvider()
     * @param $expected
     * @param $str
     * @param $length
     * @param string $substring
     */
    public function testSafeTruncate($expected, $str, $length, $substring = '')
    {
        $this->assertEquals($expected, StrModifiersMB::safeTruncate($str, $length, $substring), $str);
    }
    public function safeTruncateProvider()
    {
        return [
            ['Test foo bar', 'Test foo bar', 12],
            ['Test foo', 'Test foo bar', 11],
            ['Test foo', 'Test foo bar', 8],
            ['Test', 'Test foo bar', 7],
            ['Test', 'Test foo bar', 4],
            ['Test foo bar', 'Test foo bar', 12, '...'],
            ['Test foo...', 'Test foo bar', 11, '...'],
            ['Test...', 'Test foo bar', 8, '...'],
            ['Test...', 'Test foo bar', 7, '...'],
            ['T...', 'Test foo bar', 4, '...'],
            ['Test....', 'Test foo bar', 11, '....'],
            ['Tëst fòô bàř', 'Tëst fòô bàř', 12, ''],
            ['Tëst fòô', 'Tëst fòô bàř', 11, ''],
            ['Tëst fòô', 'Tëst fòô bàř', 8, ''],
            ['Tëst', 'Tëst fòô bàř', 7, ''],
            ['Tëst', 'Tëst fòô bàř', 4, ''],
            ['Tëst fòô bàř', 'Tëst fòô bàř', 12, 'ϰϰ'],
            ['Tëst fòôϰϰ', 'Tëst fòô bàř', 11, 'ϰϰ'],
            ['Tëstϰϰ', 'Tëst fòô bàř', 8, 'ϰϰ'],
            ['Tëstϰϰ', 'Tëst fòô bàř', 7, 'ϰϰ'],
            ['Tëϰϰ', 'Tëst fòô bàř', 4, 'ϰϰ'],
            ['What are your plans...', 'What are your plans today?', 22, '...']
        ];
    }

    /**
     * @dataProvider slugifyProvider()
     * @param $expected
     * @param $str
     * @param string $replacement
     */
    public function testSlugify($expected, $str, $replacement = '-')
    {
        $this->assertEquals($expected, StrModifiersMB::slugify($str, $replacement), $str);
    }
    public function slugifyProvider()
    {
        return [
            ['foo-bar', ' foo  bar '],
            ['foo-bar', 'foo -.-"-...bar'],
            ['another-foo-bar', 'another..& foo -.-"-...bar'],
            ['foo-dbar', " Foo d'Bar "],
            ['a-string-with-dashes', 'A string-with-dashes'],
            ['user-host', 'user@host'],
            ['using-strings-like-foo-bar', 'Using strings like fòô bàř'],
            ['numbers-1234', 'numbers 1234'],
            ['perevirka-ryadka', 'перевірка рядка'],
            ['bukvar-s-bukvoy-y', 'букварь с буквой ы'],
            ['podekhal-k-podezdu-moego-doma', 'подъехал к подъезду моего дома'],
            ['foo:bar:baz', 'Foo bar baz', ':'],
            ['a_string_with_underscores', 'A_string with_underscores', '_'],
            ['a_string_with_dashes', 'A string-with-dashes', '_'],
            ['a\string\with\dashes', 'A string-with-dashes', '\\'],
            ['an_odd_string', '--   An odd__   string-_', '_']
        ];
    }

    /**
     * @dataProvider toAsciiProvider()
     * @param $expected
     * @param $str
     * @param string $language
     * @param bool $removeUnsupported
     */
    public function testToAscii($expected, $str, $language = 'en', $removeUnsupported = true)
    {
        $this->assertEquals($expected, StrModifiersMB::toAscii($str, $language, $removeUnsupported), $str);
    }
    public function toAsciiProvider()
    {
        return [
            ['foo bar', 'fòô bàř'],
            [' TEST ', ' ŤÉŚŢ '],
            ['f = z = 3', 'φ = ź = 3'],
            ['perevirka', 'перевірка'],
            ['lysaya gora', 'лысая гора'],
            ['user@host', 'user@host'],
            ['shchuka', 'щука'],
            ['', '漢字'],
            ['xin chao the gioi', 'xin chào thế giới'],
            ['XIN CHAO THE GIOI', 'XIN CHÀO THẾ GIỚI'],
            ['dam phat chet luon', 'đấm phát chết luôn'],
            [' ', ' '], // no-break space (U+00A0)
            ['           ', '           '], // spaces U+2000 to U+200A
            [' ', ' '], // narrow no-break space (U+202F)
            [' ', ' '], // medium mathematical space (U+205F)
            [' ', '　'], // ideographic space (U+3000)
            ['', '𐍉'], // some uncommon, unsupported character (U+10349)
            ['𐍉', '𐍉', 'en', false],
            ['aouAOU', 'äöüÄÖÜ'],
            ['aeoeueAEOEUE', 'äöüÄÖÜ', 'de'],
            ['aeoeueAEOEUE', 'äöüÄÖÜ', 'de_DE']
        ];
    }

    /**
     * @dataProvider sliceProvider()
     * @param $expected
     * @param $str
     * @param $start
     * @param null $end
     */
    public function testSlice($expected, $str, $start, $end = null)
    {
        $this->assertEquals($expected, StrModifiersMB::slice($str, $start, $end), $str);
    }
    public function sliceProvider()
    {
        return [
            ['foobar', 'foobar', 0],
            ['foobar', 'foobar', 0, null],
            ['foobar', 'foobar', 0, 6],
            ['fooba', 'foobar', 0, 5],
            ['', 'foobar', 3, 0],
            ['', 'foobar', 3, 2],
            ['ba', 'foobar', 3, 5],
            ['ba', 'foobar', 3, -1],
            ['fòôbàř', 'fòôbàř', 0, null],
            ['fòôbàř', 'fòôbàř', 0, null],
            ['fòôbàř', 'fòôbàř', 0, 6],
            ['fòôbà', 'fòôbàř', 0, 5],
            ['', 'fòôbàř', 3, 0],
            ['', 'fòôbàř', 3, 2],
            ['bà', 'fòôbàř', 3, 5],
            ['bà', 'fòôbàř', 3, -1]
        ];
    }

    /**
     * @dataProvider stripWhitespaceProvider()
     * @param $expected
     * @param $str
     */
    public function testStripWhitespace($expected, $str)
    {
        $this->assertEquals($expected, StrModifiersMB::stripWhitespace($str), $str);
    }
    public function stripWhitespaceProvider()
    {
        return [
            ['foobar', '  foo   bar  '],
            ['teststring', 'test string'],
            ['Οσυγγραφέας', '   Ο     συγγραφέας  '],
            ['123', ' 123 '],
            ['', ' '], // no-break space (U+00A0)
            ['', '           '], // spaces U+2000 to U+200A
            ['', ' '], // narrow no-break space (U+202F)
            ['', ' '], // medium mathematical space (U+205F)
            ['', '　'], // ideographic space (U+3000)
            ['123', '  1  2  3　　'],
            ['', ' '],
            ['', ''],
        ];
    }

    /**
     * @dataProvider truncateProvider()
     * @param $expected
     * @param $str
     * @param $length
     * @param string $substring
     */
    public function testTruncate($expected, $str, $length, $substring = '')
    {
        $this->assertEquals($expected, StrModifiersMB::truncate($str, $length, $substring), $str);
    }
    public function truncateProvider()
    {
        return [
            ['Test foo bar', 'Test foo bar', 12],
            ['Test foo ba', 'Test foo bar', 11],
            ['Test foo', 'Test foo bar', 8],
            ['Test fo', 'Test foo bar', 7],
            ['Test', 'Test foo bar', 4],
            ['Test foo bar', 'Test foo bar', 12, '...'],
            ['Test foo...', 'Test foo bar', 11, '...'],
            ['Test ...', 'Test foo bar', 8, '...'],
            ['Test...', 'Test foo bar', 7, '...'],
            ['T...', 'Test foo bar', 4, '...'],
            ['Test fo....', 'Test foo bar', 11, '....'],
            ['Test fòô bàř', 'Test fòô bàř', 12, ''],
            ['Test fòô bà', 'Test fòô bàř', 11, ''],
            ['Test fòô', 'Test fòô bàř', 8, ''],
            ['Test fò', 'Test fòô bàř', 7, ''],
            ['Test', 'Test fòô bàř', 4, ''],
            ['Test fòô bàř', 'Test fòô bàř', 12, 'ϰϰ'],
            ['Test fòô ϰϰ', 'Test fòô bàř', 11, 'ϰϰ'],
            ['Test fϰϰ', 'Test fòô bàř', 8, 'ϰϰ'],
            ['Test ϰϰ', 'Test fòô bàř', 7, 'ϰϰ'],
            ['Teϰϰ', 'Test fòô bàř', 4, 'ϰϰ'],
            ['What are your pl...', 'What are your plans today?', 19, '...']
        ];
    }

    /**
     * @dataProvider upperCamelizeProvider()
     * @param $expected
     * @param $str
     */
    public function testUpperCamelize($expected, $str)
    {
        $this->assertEquals($expected, StrModifiersMB::upperCamelize($str), $str);
    }
    public function upperCamelizeProvider()
    {
        return [
            ['CamelCase', 'camelCase'],
            ['CamelCase', 'Camel-Case'],
            ['CamelCase', 'camel case'],
            ['CamelCase', 'camel -case'],
            ['CamelCase', 'camel - case'],
            ['CamelCase', 'camel_case'],
            ['CamelCTest', 'camel c test'],
            ['StringWith1Number', 'string_with1number'],
            ['StringWith22Numbers', 'string-with-2-2 numbers'],
            ['1Camel2Case', '1camel2case'],
            ['CamelΣase', 'camel σase'],
            ['ΣτανιλCase', 'στανιλ case'],
            ['ΣamelCase', 'Σamel  Case']
        ];
    }

    /**
     * @dataProvider surroundProvider()
     * @param $expected
     * @param $str
     * @param $substring
     */
    public function testSurround($expected, $str, $substring)
    {
        $this->assertEquals($expected, StrModifiersMB::surround($str, $substring), $str);
    }
    public function surroundProvider()
    {
        return [
            ['__foobar__', 'foobar', '__'],
            ['test', 'test', ''],
            ['**', '', '*'],
            ['¬fòô bàř¬', 'fòô bàř', '¬'],
            ['ßå∆˚ test ßå∆˚', ' test ', 'ßå∆˚']
        ];
    }

    /**
     * @dataProvider swapCaseProvider()
     * @param $expected
     * @param $str
     */
    public function testSwapCase($expected, $str)
    {
        $this->assertEquals($expected, StrModifiersMB::swapCase($str), $str);
    }
    public function swapCaseProvider()
    {
        return [
            ['TESTcASE', 'testCase'],
            ['tEST-cASE', 'Test-Case'],
            [' - σASH  cASE', ' - Σash  Case'],
            ['νΤΑΝΙΛ', 'Ντανιλ']
        ];
    }

    /**
     * @dataProvider tidyProvider()
     */
    public function testTidy($expected, $str)
    {
        $this->assertEquals($expected, StrModifiersMB::tidy($str), $str);
    }
    public function tidyProvider()
    {
        return [
            ['"I see..."', '“I see…”'],
            ["'This too'", "‘This too’"],
            ['test-dash', 'test—dash'],
            ['Ο συγγραφέας είπε...', 'Ο συγγραφέας είπε…']
        ];
    }

    /**
     * @dataProvider titleizeProvider()
     * @param $expected
     * @param $str
     * @param array $ignore
     */
    public function testTitleize($expected, $str, $ignore = [])
    {
        $this->assertEquals($expected, StrModifiersMB::titleize($str, $ignore), $str);
    }
    public function titleizeProvider()
    {
        $ignore = ['at', 'by', 'for', 'in', 'of', 'on', 'out', 'to', 'the'];
        return [
            ['Title Case', 'TITLE CASE'],
            ['Testing The Method', 'testing the method'],
            ['Testing the Method', 'testing the method', $ignore],
            ['I Like to Watch Dvds at Home', 'i like to watch DVDs at home',
                $ignore],
            ['Θα Ήθελα Να Φύγει', '  Θα ήθελα να φύγει  ', []]
        ];
    }

    /**
     * @dataProvider toSpacesProvider()
     * @param $expected
     * @param $str
     * @param int $tabLength
     */
    public function testToSpaces($expected, $str, $tabLength = 4)
    {
        $this->assertEquals($expected, StrModifiersMB::toSpaces($str, $tabLength), $str);
    }
    public function toSpacesProvider()
    {
        return [
            ['    foo    bar    ', '	foo	bar	'],
            ['     foo     bar     ', '	foo	bar	', 5],
            ['    foo  bar  ', '		foo	bar	', 2],
            ['foobar', '	foo	bar	', 0],
            ["    foo\n    bar", "	foo\n	bar"],
            ["    fòô\n    bàř", "	fòô\n	bàř"]
        ];
    }

    /**
     * @dataProvider toTabsProvider()
     * @param $expected
     * @param $str
     * @param int $tabLength
     */
    public function testToTabs($expected, $str, $tabLength = 4)
    {
        $this->assertEquals($expected, StrModifiersMB::toTabs($str, $tabLength), $str);
    }
    public function toTabsProvider()
    {
        return [
            ['	foo	bar	', '    foo    bar    '],
            ['	foo	bar	', '     foo     bar     ', 5],
            ['		foo	bar	', '    foo  bar  ', 2],
            ["	foo\n	bar", "    foo\n    bar"],
            ["	fòô\n	bàř", "    fòô\n    bàř"]
        ];
    }

    /**
     * @dataProvider toTitleCaseProvider()
     * @param $expected
     * @param $str
     */
    public function testToTitleCase($expected, $str)
    {
        $this->assertEquals($expected, StrModifiersMB::toTitleCase($str), $str);
    }
    public function toTitleCaseProvider()
    {
        return [
            ['Foo Bar', 'foo bar'],
            [' Foo_Bar ', ' foo_bar '],
            ['Fòô Bàř', 'fòô bàř'],
            [' Fòô_Bàř ', ' fòô_bàř '],
            ['Αυτοκίνητο Αυτοκίνητο', 'αυτοκίνητο αυτοκίνητο'],
        ];
    }

    /**
     * @dataProvider underscoredProvider()
     * @param $expected
     * @param $str
     */
    public function testUnderscored($expected, $str)
    {
        $this->assertEquals($expected, StrModifiersMB::underscored($str), $str);
    }
    public function underscoredProvider()
    {
        return [
            ['test_case', 'testCase'],
            ['test_case', 'Test-Case'],
            ['test_case', 'test case'],
            ['test_case', 'test -case'],
            ['_test_case', '-test - case'],
            ['test_case', 'test_case'],
            ['test_c_test', '  test c test'],
            ['test_u_case', 'TestUCase'],
            ['test_c_c_test', 'TestCCTest'],
            ['string_with1number', 'string_with1number'],
            ['string_with_2_2_numbers', 'String-with_2_2 numbers'],
            ['1test2case', '1test2case'],
            ['yes_we_can', 'yesWeCan'],
            ['test_σase', 'test Σase'],
            ['στανιλ_case', 'Στανιλ case'],
            ['σash_case', 'Σash  Case']
        ];
    }
}
