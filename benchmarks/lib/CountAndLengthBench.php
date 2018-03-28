<?php

namespace Benchmark;

use Str\Str;
use Stringy\Stringy;

class CountAndLengthBench
{
    public function bench_length_Str() {
        (new Str('Hello world'))->length();
    }

    public function bench_length_Stringy() {
        (new Stringy('Hello world'))->length();
    }

    public function bench_count_substr_Str() {
        (new Str('HelLo wOrld'))->countSubstr('l', false);
    }

    public function bench_count_substr_Stringy() {
        (new Stringy('HelLo wOrld'))->countSubstr('l', false);
    }
}
