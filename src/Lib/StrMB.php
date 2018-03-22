<?php

declare(strict_types=1);

namespace Str\Lib;

/**
 * Returns language-specific replacements for the toAscii() method.
 * For example, German will map 'ä' to 'ae', while other languages
 * will simply return 'a'.
 *
 * @param  string $language Language of the source string.
 * @return array  An array of replacements.
 */
function libstr_langSpecificCharsArray(string $language = 'en'): array
{
    $split = preg_split('/[-_]/', $language);
    $language = strtolower($split[0]);

    $languageSpecific = [
        'de' => [
            ['ä',  'ö',  'ü',  'Ä',  'Ö',  'Ü' ],
            ['ae', 'oe', 'ue', 'AE', 'OE', 'UE'],
        ],
        'bg' => [
            ['х', 'Х', 'щ', 'Щ', 'ъ', 'Ъ', 'ь', 'Ь'],
            ['h', 'H', 'sht', 'SHT', 'a', 'А', 'y', 'Y']
        ]
    ];

    if (isset($languageSpecific[$language])) {
        return $languageSpecific[$language];
    }

    return [];
}

/**
 * Returns the replacements for the toAscii() method.
 *
 * @return array An array of replacements.
 */
function libstr_charsArray(): array
{
    /** @noinspection UselessReturnInspection */
    return $charsArray = [
        '0'     => ['°', '₀', '۰', '０'],
        '1'     => ['¹', '₁', '۱', '１'],
        '2'     => ['²', '₂', '۲', '２'],
        '3'     => ['³', '₃', '۳', '３'],
        '4'     => ['⁴', '₄', '۴', '٤', '４'],
        '5'     => ['⁵', '₅', '۵', '٥', '５'],
        '6'     => ['⁶', '₆', '۶', '٦', '６'],
        '7'     => ['⁷', '₇', '۷', '７'],
        '8'     => ['⁸', '₈', '۸', '８'],
        '9'     => ['⁹', '₉', '۹', '９'],
        'a'     => ['à', 'á', 'ả', 'ã', 'ạ', 'ă', 'ắ', 'ằ', 'ẳ', 'ẵ',
                    'ặ', 'â', 'ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'ā', 'ą', 'å',
                    'α', 'ά', 'ἀ', 'ἁ', 'ἂ', 'ἃ', 'ἄ', 'ἅ', 'ἆ', 'ἇ',
                    'ᾀ', 'ᾁ', 'ᾂ', 'ᾃ', 'ᾄ', 'ᾅ', 'ᾆ', 'ᾇ', 'ὰ', 'ά',
                    'ᾰ', 'ᾱ', 'ᾲ', 'ᾳ', 'ᾴ', 'ᾶ', 'ᾷ', 'а', 'أ', 'အ',
                    'ာ', 'ါ', 'ǻ', 'ǎ', 'ª', 'ა', 'अ', 'ا', 'ａ', 'ä'],
        'b'     => ['б', 'β', 'ب', 'ဗ', 'ბ', 'ｂ'],
        'c'     => ['ç', 'ć', 'č', 'ĉ', 'ċ', 'ｃ'],
        'd'     => ['ď', 'ð', 'đ', 'ƌ', 'ȡ', 'ɖ', 'ɗ', 'ᵭ', 'ᶁ', 'ᶑ',
                    'д', 'δ', 'د', 'ض', 'ဍ', 'ဒ', 'დ', 'ｄ'],
        'e'     => ['é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'ế', 'ề', 'ể', 'ễ',
                    'ệ', 'ë', 'ē', 'ę', 'ě', 'ĕ', 'ė', 'ε', 'έ', 'ἐ',
                    'ἑ', 'ἒ', 'ἓ', 'ἔ', 'ἕ', 'ὲ', 'έ', 'е', 'ё', 'э',
                    'є', 'ə', 'ဧ', 'ေ', 'ဲ', 'ე', 'ए', 'إ', 'ئ', 'ｅ'],
        'f'     => ['ф', 'φ', 'ف', 'ƒ', 'ფ', 'ｆ'],
        'g'     => ['ĝ', 'ğ', 'ġ', 'ģ', 'г', 'ґ', 'γ', 'ဂ', 'გ', 'گ', 'ｇ'],
        'h'     => ['ĥ', 'ħ', 'η', 'ή', 'ح', 'ه', 'ဟ', 'ှ', 'ჰ', 'ｈ'],
        'i'     => ['í', 'ì', 'ỉ', 'ĩ', 'ị', 'î', 'ï', 'ī', 'ĭ', 'į',
                    'ı', 'ι', 'ί', 'ϊ', 'ΐ', 'ἰ', 'ἱ', 'ἲ', 'ἳ', 'ἴ',
                    'ἵ', 'ἶ', 'ἷ', 'ὶ', 'ί', 'ῐ', 'ῑ', 'ῒ', 'ΐ', 'ῖ',
                    'ῗ', 'і', 'ї', 'и', 'ဣ', 'ိ', 'ီ', 'ည်', 'ǐ', 'ი',
                    'इ', 'ی', 'ｉ'],
        'j'     => ['ĵ', 'ј', 'Ј', 'ჯ', 'ج', 'ｊ'],
        'k'     => ['ķ', 'ĸ', 'к', 'κ', 'Ķ', 'ق', 'ك', 'က', 'კ', 'ქ',
                    'ک', 'ｋ'],
        'l'     => ['ł', 'ľ', 'ĺ', 'ļ', 'ŀ', 'л', 'λ', 'ل', 'လ', 'ლ', 'ｌ'],
        'm'     => ['м', 'μ', 'م', 'မ', 'მ', 'ｍ'],
        'n'     => ['ñ', 'ń', 'ň', 'ņ', 'ŉ', 'ŋ', 'ν', 'н', 'ن', 'န', 'ნ', 'ｎ'],
        'o'     => ['ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ',
                    'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'ø', 'ō', 'ő',
                    'ŏ', 'ο', 'ὀ', 'ὁ', 'ὂ', 'ὃ', 'ὄ', 'ὅ', 'ὸ', 'ό',
                    'о', 'و', 'θ', 'ို', 'ǒ', 'ǿ', 'º', 'ო', 'ओ', 'ｏ',
                    'ö'],
        'p'     => ['п', 'π', 'ပ', 'პ', 'پ', 'ｐ'],
        'q'     => ['ყ', 'ｑ'],
        'r'     => ['ŕ', 'ř', 'ŗ', 'р', 'ρ', 'ر', 'რ', 'ｒ'],
        's'     => ['ś', 'š', 'ş', 'с', 'σ', 'ș', 'ς', 'س', 'ص', 'စ', 'ſ', 'ს', 'ｓ'],
        't'     => ['ť', 'ţ', 'т', 'τ', 'ț', 'ت', 'ط', 'ဋ', 'တ', 'ŧ', 'თ', 'ტ', 'ｔ'],
        'u'     => ['ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'ứ', 'ừ', 'ử', 'ữ',
                    'ự', 'û', 'ū', 'ů', 'ű', 'ŭ', 'ų', 'µ', 'у', 'ဉ',
                    'ု', 'ူ', 'ǔ', 'ǖ', 'ǘ', 'ǚ', 'ǜ', 'უ', 'उ', 'ｕ',
                    'ў', 'ü'],
        'v'     => ['в', 'ვ', 'ϐ', 'ｖ'],
        'w'     => ['ŵ', 'ω', 'ώ', 'ဝ', 'ွ', 'ｗ'],
        'x'     => ['χ', 'ξ', 'ｘ'],
        'y'     => ['ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ', 'ÿ', 'ŷ', 'й', 'ы', 'υ',
                    'ϋ', 'ύ', 'ΰ', 'ي', 'ယ', 'ｙ'],
        'z'     => ['ź', 'ž', 'ż', 'з', 'ζ', 'ز', 'ဇ', 'ზ', 'ｚ'],
        'aa'    => ['ع', 'आ', 'آ'],
        'ae'    => ['æ', 'ǽ'],
        'ai'    => ['ऐ'],
        'ch'    => ['ч', 'ჩ', 'ჭ', 'چ'],
        'dj'    => ['ђ', 'đ'],
        'dz'    => ['џ', 'ძ'],
        'ei'    => ['ऍ'],
        'gh'    => ['غ', 'ღ'],
        'ii'    => ['ई'],
        'ij'    => ['ĳ'],
        'kh'    => ['х', 'خ', 'ხ'],
        'lj'    => ['љ'],
        'nj'    => ['њ'],
        'oe'    => ['œ', 'ؤ'],
        'oi'    => ['ऑ'],
        'oii'   => ['ऒ'],
        'ps'    => ['ψ'],
        'sh'    => ['ш', 'შ', 'ش'],
        'shch'  => ['щ'],
        'ss'    => ['ß'],
        'sx'    => ['ŝ'],
        'th'    => ['þ', 'ϑ', 'ث', 'ذ', 'ظ'],
        'ts'    => ['ц', 'ც', 'წ'],
        'uu'    => ['ऊ'],
        'ya'    => ['я'],
        'yu'    => ['ю'],
        'zh'    => ['ж', 'ჟ', 'ژ'],
        '(c)'   => ['©'],
        'A'     => ['Á', 'À', 'Ả', 'Ã', 'Ạ', 'Ă', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ',
                    'Ặ', 'Â', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ', 'Å', 'Ā', 'Ą',
                    'Α', 'Ά', 'Ἀ', 'Ἁ', 'Ἂ', 'Ἃ', 'Ἄ', 'Ἅ', 'Ἆ', 'Ἇ',
                    'ᾈ', 'ᾉ', 'ᾊ', 'ᾋ', 'ᾌ', 'ᾍ', 'ᾎ', 'ᾏ', 'Ᾰ', 'Ᾱ',
                    'Ὰ', 'Ά', 'ᾼ', 'А', 'Ǻ', 'Ǎ', 'Ａ', 'Ä'],
        'B'     => ['Б', 'Β', 'ब', 'Ｂ'],
        'C'     => ['Ç','Ć', 'Č', 'Ĉ', 'Ċ', 'Ｃ'],
        'D'     => ['Ď', 'Ð', 'Đ', 'Ɖ', 'Ɗ', 'Ƌ', 'ᴅ', 'ᴆ', 'Д', 'Δ', 'Ｄ'],
        'E'     => ['É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', 'Ế', 'Ề', 'Ể', 'Ễ',
                    'Ệ', 'Ë', 'Ē', 'Ę', 'Ě', 'Ĕ', 'Ė', 'Ε', 'Έ', 'Ἐ',
                    'Ἑ', 'Ἒ', 'Ἓ', 'Ἔ', 'Ἕ', 'Έ', 'Ὲ', 'Е', 'Ё', 'Э',
                    'Є', 'Ə', 'Ｅ'],
        'F'     => ['Ф', 'Φ', 'Ｆ'],
        'G'     => ['Ğ', 'Ġ', 'Ģ', 'Г', 'Ґ', 'Γ', 'Ｇ'],
        'H'     => ['Η', 'Ή', 'Ħ', 'Ｈ'],
        'I'     => ['Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị', 'Î', 'Ï', 'Ī', 'Ĭ', 'Į',
                    'İ', 'Ι', 'Ί', 'Ϊ', 'Ἰ', 'Ἱ', 'Ἳ', 'Ἴ', 'Ἵ', 'Ἶ',
                    'Ἷ', 'Ῐ', 'Ῑ', 'Ὶ', 'Ί', 'И', 'І', 'Ї', 'Ǐ', 'ϒ',
                    'Ｉ'],
        'J'     => ['Ｊ'],
        'K'     => ['К', 'Κ', 'Ｋ'],
        'L'     => ['Ĺ', 'Ł', 'Л', 'Λ', 'Ļ', 'Ľ', 'Ŀ', 'ल', 'Ｌ'],
        'M'     => ['М', 'Μ', 'Ｍ'],
        'N'     => ['Ń', 'Ñ', 'Ň', 'Ņ', 'Ŋ', 'Н', 'Ν', 'Ｎ'],
        'O'     => ['Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ', 'Ỗ',
                    'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ', 'Ø', 'Ō', 'Ő',
                    'Ŏ', 'Ο', 'Ό', 'Ὀ', 'Ὁ', 'Ὂ', 'Ὃ', 'Ὄ', 'Ὅ', 'Ὸ',
                    'Ό', 'О', 'Θ', 'Ө', 'Ǒ', 'Ǿ', 'Ｏ', 'Ö'],
        'P'     => ['П', 'Π', 'Ｐ'],
        'Q'     => ['Ｑ'],
        'R'     => ['Ř', 'Ŕ', 'Р', 'Ρ', 'Ŗ', 'Ｒ'],
        'S'     => ['Ş', 'Ŝ', 'Ș', 'Š', 'Ś', 'С', 'Σ', 'Ｓ'],
        'T'     => ['Ť', 'Ţ', 'Ŧ', 'Ț', 'Т', 'Τ', 'Ｔ'],
        'U'     => ['Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'Ứ', 'Ừ', 'Ử', 'Ữ',
                    'Ự', 'Û', 'Ū', 'Ů', 'Ű', 'Ŭ', 'Ų', 'У', 'Ǔ', 'Ǖ',
                    'Ǘ', 'Ǚ', 'Ǜ', 'Ｕ', 'Ў', 'Ü'],
        'V'     => ['В', 'Ｖ'],
        'W'     => ['Ω', 'Ώ', 'Ŵ', 'Ｗ'],
        'X'     => ['Χ', 'Ξ', 'Ｘ'],
        'Y'     => ['Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ', 'Ÿ', 'Ῠ', 'Ῡ', 'Ὺ', 'Ύ',
                    'Ы', 'Й', 'Υ', 'Ϋ', 'Ŷ', 'Ｙ'],
        'Z'     => ['Ź', 'Ž', 'Ż', 'З', 'Ζ', 'Ｚ'],
        'AE'    => ['Æ', 'Ǽ'],
        'Ch'    => ['Ч'],
        'Dj'    => ['Ђ'],
        'Dz'    => ['Џ'],
        'Gx'    => ['Ĝ'],
        'Hx'    => ['Ĥ'],
        'Ij'    => ['Ĳ'],
        'Jx'    => ['Ĵ'],
        'Kh'    => ['Х'],
        'Lj'    => ['Љ'],
        'Nj'    => ['Њ'],
        'Oe'    => ['Œ'],
        'Ps'    => ['Ψ'],
        'Sh'    => ['Ш'],
        'Shch'  => ['Щ'],
        'Ss'    => ['ẞ'],
        'Th'    => ['Þ'],
        'Ts'    => ['Ц'],
        'Ya'    => ['Я'],
        'Yu'    => ['Ю'],
        'Zh'    => ['Ж'],
        ' '     => ["\xC2\xA0", "\xE2\x80\x80", "\xE2\x80\x81",
                    "\xE2\x80\x82", "\xE2\x80\x83", "\xE2\x80\x84",
                    "\xE2\x80\x85", "\xE2\x80\x86", "\xE2\x80\x87",
                    "\xE2\x80\x88", "\xE2\x80\x89", "\xE2\x80\x8A",
                    "\xE2\x80\xAF", "\xE2\x81\x9F", "\xE3\x80\x80",
                    "\xEF\xBE\xA0"],
    ];
}

/**
 * Check if the string has $prefix at the start.
 *
 * @param  string $s
 * @param  string $prefix
 * @return bool
 */
function libstr_hasPrefix(string $s, string $prefix): bool
{
    if ($s === '' || $prefix === '') { return false; }

    return (0 === \mb_strpos($s, $prefix));
}

/**
 * Check if the string has $suffix at the end.
 *
 * @param  string $s
 * @param  string $suffix
 * @return bool
 */
function libstr_hasSuffix(string $s, string $suffix): bool
{
    if ($s === '' || $suffix === '') { return false; }

    return \mb_substr($s, -\mb_strlen($suffix)) === $suffix;
}

/**
 * Return string length
 *
 * @param  string $str
 * @return int
 */
function libstr_length(string $str): int
{
    return \mb_strlen($str);
}

/**
 * Check if $haystack contains $needle substring.
 *
 * @param  string $haystack
 * @param  string $needle
 * @param  bool $caseSensitive
 * @return bool
 */
function libstr_contains(string $haystack, string $needle, bool $caseSensitive = true): bool
{
    if ($haystack === '' || $needle === '') { return false; }

    if ($caseSensitive) {
        return false !== \mb_strpos($haystack, $needle);
    }

    return (false !== \mb_stripos($haystack, $needle));
}

/**
 * Returns the index of the first occurrence of $needle in the string,
 * and -1 if not found. Accepts an optional offset from which to begin
 * the search.
 *
 * @param  string $haystack
 * @param  string $needle Substring to look for
 * @param  int $offset Offset from which to search
 * @return int The occurrence's index if found, otherwise -1
 */
function libstr_indexOf(string $haystack, string $needle, int $offset = 0): int
{
    if ($needle === '' || $haystack === '')  { return -1; }

    $maxLen = \mb_strlen($haystack);

    if ($offset < 0) {
        $offset = $maxLen - (int)abs($offset);
    }

    if ($offset > $maxLen)  { return -1; }

    if ($offset < 0)  { return -1; }

    $pos = \mb_strpos($haystack, $needle, $offset);

    return false === $pos ? -1 : $pos;
}

/**
 * Returns the index of the last occurrence of $needle in the string,
 * and -1 if not found. Accepts an optional offset from which to begin
 * the search. Offsets may be negative to count from the last character
 * in the string.
 *
 * @param  string $haystack
 * @param  string $needle Substring to look for
 * @param  int $offset Offset from which to search
 * @return int The last occurrence's index if found, otherwise -1
 */
function libstr_indexOfLast(string $haystack, string $needle, int $offset = 0): int
{
    if ($needle === '' || $haystack === '') { return -1; }

    $maxLen = \mb_strlen($haystack);

    if ($offset < 0) {
        $offset = $maxLen - (int)abs($offset);
    }

    if ($offset > $maxLen) { return -1; }

    if ($offset < 0) { return -1; }

    $pos = \mb_strrpos($haystack, $needle, $offset);

    return false === $pos ? -1 : $pos;
}

/**
 * Returns the number of occurrences of $substring in the given string.
 * By default, the comparison is case-sensitive, but can be made insensitive
 * by setting $caseSensitive to false.
 *
 * @param  string $haystack
 * @param  string $needle        The substring to search for
 * @param  bool   $caseSensitive Whether or not to enforce case-sensitivity
 * @return int                   The number of $substring occurrences
 */
function libstr_countSubstr(string $haystack, string $needle, bool $caseSensitive = true): int
{
    if ($caseSensitive) {
        return \mb_substr_count($haystack, $needle);
    }

    $haystack = \mb_strtoupper($haystack);
    $needle = \mb_strtoupper($needle);

    return \mb_substr_count($haystack, $needle);
}

/**
 * Returns true if the string contains all $needles, false otherwise. By
 * default the comparison is case-sensitive, but can be made insensitive by
 * setting $caseSensitive to false.
 *
 * @param  string   $str
 * @param  string[] $needles       Substrings to look for
 * @param  bool     $caseSensitive Whether or not to enforce case-sensitivity
 * @return bool                    Whether or not $str contains $needle
 */
function libstr_containsAll(string $str, array $needles, bool $caseSensitive = true): bool
{
    if (empty($needles)) { return false; }

    foreach ($needles as $needle) {
        if (!libstr_contains($str, $needle, $caseSensitive)) { return false; }
    }

    return true;
}

/**
 * Returns true if the string contains any $needles, false otherwise. By
 * default the comparison is case-sensitive, but can be made insensitive by
 * setting $caseSensitive to false.
 *
 * @param  string   $str
 * @param  string[] $needles       Substrings to look for
 * @param  bool     $caseSensitive Whether or not to enforce case-sensitivity
 * @return bool                    Whether or not $str contains $needle
 */
function libstr_containsAny(string $str, array $needles, bool $caseSensitive = true): bool
{
    if (empty($needles)) { return false; }

    foreach ($needles as $needle) {
        if (libstr_contains($str, $needle, $caseSensitive)) { return true; }
    }

    return false;
}

/**
 * Returns true if the string begins with $substring, false otherwise. By
 * default, the comparison is case-sensitive, but can be made insensitive
 * by setting $caseSensitive to false.
 *
 * @param  string $str
 * @param  string $substring     The substring to look for
 * @param  bool   $caseSensitive Whether or not to enforce case-sensitivity
 * @return bool                  Whether or not $str starts with $substring
 */
function libstr_startsWith(string $str, string $substring, bool $caseSensitive = true): bool
{
    if ($caseSensitive) {
        return libstr_hasPrefix($str, $substring);
    }

    return libstr_hasPrefix(\mb_strtoupper($str), \mb_strtoupper($substring));
}

/**
 * Returns true if the string begins with any of $substrings, false
 * otherwise. By default the comparison is case-sensitive, but can be made
 * insensitive by setting $caseSensitive to false.
 *
 * @param  string   $str
 * @param  string[] $substrings    Substrings to look for
 * @param  bool     $caseSensitive Whether or not to enforce case-sensitivity
 * @return bool                    Whether or not $str starts with $substring
 */
function libstr_startsWithAny(string $str, array $substrings, bool $caseSensitive = true): bool
{
    if (empty($substrings)) { return false; }

    foreach ($substrings as $substring) {
        if (libstr_startsWith($str, $substring, $caseSensitive)) { return true; }
    }

    return false;
}

/**
 * Returns true if the string ends with $substring, false otherwise. By
 * default, the comparison is case-sensitive, but can be made insensitive
 * by setting $caseSensitive to false.
 *
 * @param  string $str
 * @param  string $substring     The substring to look for
 * @param  bool   $caseSensitive Whether or not to enforce case-sensitivity
 * @return bool                  Whether or not $str ends with $substring
 */
function libstr_endsWith(string $str, string $substring, bool $caseSensitive = true): bool
{
    if ($caseSensitive) {
        return libstr_hasSuffix($str, $substring);
    }

    return libstr_hasSuffix(\mb_strtoupper($str), \mb_strtoupper($substring));
}

/**
 * Returns true if the string ends with any of $substrings, false otherwise.
 * By default, the comparison is case-sensitive, but can be made insensitive
 * by setting $caseSensitive to false.
 *
 * @param  string   $str
 * @param  string[] $substrings    Substrings to look for
 * @param  bool     $caseSensitive Whether or not to enforce case-sensitivity
 * @return bool                    Whether or not $str ends with $substring
 */
function libstr_endsWithAny(string $str, array $substrings, bool $caseSensitive = true): bool
{
    if (empty($substrings)) { return false; }

    foreach ($substrings as $substring) {
        if (libstr_endsWith($str, $substring, $caseSensitive)) { return true; }
    }

    return false;
}

/**
 * Checks if the given string is a valid UUID v.4.
 * It doesn't matter whether the given UUID has dashes.
 *
 * @param  string $str
 * @return bool
 */
function libstr_isUUIDv4(string $str): bool
{
    $l = '[a-f0-9]';
    $pattern = "/^{$l}{8}-?{$l}{4}-?4{$l}{3}-?[89ab]{$l}{3}-?{$l}{12}\Z/";
    return (bool)\preg_match($pattern, $str);
}

/**
 * Returns true if the string contains a lower case char, false otherwise.
 * This function check only ascii [a-z] chars.
 *
 * @param  string $str
 * @return bool
 */
function libstr_hasLowerCase(string $str): bool
{
    return libstr_matchesPattern($str, '.*[[:lower:]]');
}

/**
 * Returns true if the string contains an upper case char, false otherwise.
 * This function check only ascii [A-Z] chars.
 *
 * @param  string $str
 * @return bool
 */
function libstr_hasUpperCase(string $str): bool
{
    return libstr_matchesPattern($str, '.*[[:upper:]]');
}

/**
 * Returns true if $str matches the supplied pattern, false otherwise.
 *
 * @param  string $str
 * @param  string $pattern Regex pattern to match against
 * @return bool            Whether or not $str matches the pattern
 */
function libstr_matchesPattern(string $str, string $pattern): bool
{
    return \mb_ereg_match($pattern, $str);
}

/**
 * Returns true if the string contains only alphabetic chars, false otherwise.
 * This function check only ascii [a-zA-Z] chars.
 *
 * @param  string $str
 * @return bool   Whether or not $str contains only alphabetic chars
 */
function libstr_isAlpha(string $str): bool
{
    return libstr_matchesPattern($str,'^[[:alpha:]]*$');
}

/**
 * Returns true if the string contains only alphabetic and numeric chars, false otherwise.
 * This function check only ascii [a-zA-Z0-9] chars.
 *
 * @param  string $str
 * @return bool   Whether or not $str contains only alphanumeric chars
 */
function libstr_isAlphanumeric(string $str): bool
{
    return libstr_matchesPattern($str,'^[[:alnum:]]*$');
}

/**
 * Returns true if the string contains only whitespace chars, false otherwise.
 *
 * @param  string $str
 * @return bool   Whether or not $str contains only whitespace characters
 */
function libstr_isBlank(string $str): bool
{
    return libstr_matchesPattern($str,'^[[:space:]]*$');
}

/**
 * Returns true if the string is base64 encoded, false otherwise.
 *
 * @param  string $str
 * @return bool   Whether or not $str is base64 encoded
 */
function libstr_isBase64(string $str): bool
{
    return (base64_encode(base64_decode($str)) === $str);
}

/**
 * Returns true if the string contains only hexadecimal chars, false otherwise.
 * This function check only ascii [A-Fa-f0-9] chars.
 *
 * @param  string $str
 * @return bool   Whether or not $str contains only hexadecimal chars
 */
function libstr_isHexadecimal(string $str): bool
{
    return libstr_matchesPattern($str,'^[[:xdigit:]]*$');
}

/**
 * Returns true if the string is JSON, false otherwise. Unlike json_decode
 * in PHP 5.x, this method is consistent with PHP 7 and other JSON parsers,
 * in that an empty string is not considered valid JSON.
 *
 * @param  string $str
 * @return bool   Whether or not $str is JSON
 */
function libstr_isJson(string $str): bool
{
    if ('' === $str) { return false; }

    json_decode($str);
    return json_last_error() === JSON_ERROR_NONE;
}

/**
 * Returns true if the string contains only lower case chars, false  otherwise.
 * This function check only ascii [a-z] chars.
 *
 * @param  string $str
 * @return bool   Whether or not $str contains only lower case characters
 */
function libstr_isLowerCase(string $str): bool
{
    return libstr_matchesPattern($str, '^[[:lower:]]*$');
}

/**
 * Returns true if the string contains only lower case chars, false otherwise.
 * This function check only ascii [A-Z] chars.
 *
 * @param  string $str
 * @return bool   Whether or not $str contains only lower case characters
 */
function libstr_isUpperCase(string $str): bool
{
    return libstr_matchesPattern($str,'^[[:upper:]]*$');
}

/**
 * Returns true if the string is serialized, false otherwise.
 *
 * @param  string $str
 * @return bool   Whether or not $str is serialized
 */
function libstr_isSerialized(string $str): bool
{
    return $str === 'b:0;' || @unserialize($str, []) !== false;
}

/**
 * Returns a boolean representation of the given logical string value.
 * For example, 'true', '1', 'on' and 'yes' will return true. 'false', '0',
 * 'off', and 'no' will return false. In all instances, case is ignored.
 * For other numeric strings, their sign will determine the return value.
 * In addition, blank strings consisting of only whitespace will return
 * false. For all other strings, the return value is a result of a
 * boolean cast.
 *
 * @param  string $str
 * @return bool   A boolean value for the string
 */
function libstr_toBoolean(string $str): bool
{
    $key = libstr_toLowerCase($str);
    $map = [
        'true'  => true,
        '1'     => true,
        'on'    => true,
        'yes'   => true,
        'false' => false,
        '0'     => false,
        'off'   => false,
        'no'    => false
    ];

    if (\array_key_exists($key, $map)) {
        return $map[$key];
    }

    if (\is_numeric($str)) {
        return ((int)$str > 0);
    }

    return (bool)libstr_regexReplace($str,'[[:space:]]', '');
}

/**
 * Returns the substring beginning at $start with the specified $length.
 * It differs from the mb_substr() function in that providing a $length of 0
 * will return the rest of the string, rather than an empty string.
 *
 * @param  string $s
 * @param  int    $start Position of the first character to use
 * @param  int    $length Maximum number of characters used
 * @return string
 */
function libstr_substr(string $s, int $start = 0, int $length = 0): string
{
    if ($length === 0) {
        $length = libstr_length($s);
    }

    return \mb_substr($s, $start, $length);
}

/**
 * Returns the character at $pos, with indexes starting at 0.
 *
 * @param  string $s
 * @param  int    $pos
 * @return string
 */
function libstr_at(string $s, int $pos): string
{
    return libstr_substr($s, $pos, 1);
}

/**
 * Returns an array consisting of the characters in the string.
 *
 * @param  string $s
 * @return array  An array of string chars
 */
function libstr_chars(string $s): array
{
    if ($s === '') {
        return [];
    }

    $chars = [];

    for ($i = 0, $iMax = libstr_length($s); $i < $iMax; $i++) {
        $chars[] = libstr_at($s, $i);
    }

    return $chars;
}

/**
 * Returns the first $length characters of the string.
 *
 * @param  string $s      String for search
 * @param  int    $length Number of characters to retrieve from the start
 * @return string
 */
function libstr_first(string $s, int $length = 1): string
{
    if ($length <= 0) { return ''; }

    return libstr_substr($s, 0, $length);
}

/**
 * Returns the last $length characters of the string.
 *
 * @param  string $s      String for search
 * @param  int    $length Number of characters to retrieve from the end
 * @return string
 */
function libstr_last(string $s, int $length = 1): string
{
    if ($length <= 0) { return ''; }

    return libstr_substr($s, -$length);
}

/** @noinspection MoreThanThreeArgumentsInspection */
/**
 * Replace returns a copy of the string $str with the first
 * n non-overlapping instances of old replaced by new.
 * If old is empty, it matches at the beginning of the string and
 * after each UTF-8 sequence, yielding up to k+1 replacements
 * for a k-rune string. If n < 0,
 * there is no limit on the number of replacements.
 *
 * @param  string $str
 * @param  string $old
 * @param  string $new
 * @param  int    $limit
 * @return string
 */
function libstr_replace(string $str, string $old, string $new, int $limit = -1): string
{
    if ($old === $new || $limit === 0) { return $str; }

    $oldCount = libstr_countSubstr($str, $old);

    if ($oldCount === 0) { return $str; }

    if ($limit < 0 || $oldCount < $limit) {
        $limit = $oldCount;
    }

    $result = $str;
    $offset = 0;

    while (--$limit >= 0) {
        $pos = \mb_strpos($result, $old, $offset);
        $offset = $pos + \mb_strlen($old);
        $result = \mb_substr($result, 0, $pos) . $new . \mb_substr($result, $offset);
    }

    return $result;
}

/**
 * Returns a string with whitespace removed from the start and end of the
 * string. Supports the removal of unicode whitespace. Accepts an optional
 * string of characters to strip instead of the defaults.
 *
 * @param  string $str
 * @param  string $chars Optional string of characters to strip
 * @return string
 */
function libstr_trim(string $str, string $chars = ''): string
{
    $chars = $chars ? \preg_quote($chars, '/') : '\s';
    return \mb_ereg_replace("^[$chars]+|[$chars]+\$", '', $str);
}

/**
 * Returns a string with whitespace removed from the start of the string.
 * Supports the removal of unicode whitespace. Accepts an optional
 * string of characters to strip instead of the defaults.
 *
 * @param  string $str
 * @param  string $chars Optional string of characters to strip
 * @return string
 */
function libstr_trimLeft(string $str, string $chars = ''): string
{
    $chars = $chars ? \preg_quote($chars, '/') : '\s';
    return \mb_ereg_replace("^[$chars]+", '', $str);
}

/**
 * Returns a string with whitespace removed from the end of the string.
 * Supports the removal of unicode whitespace. Accepts an optional
 * string of characters to strip instead of the defaults.
 *
 * @param  string $str
 * @param  string $chars Optional string of characters to strip
 * @return string
 */
function libstr_trimRight(string $str, string $chars = ''): string
{
    $chars = $chars ? \preg_quote($chars, '/') : '\s';
    return \mb_ereg_replace("[$chars]+\$", '', $str);
}

/**
 * Append $sub to str
 *
 * @param  string $str
 * @param  string $sub
 * @return string
 */
function libstr_append(string $str, string $sub): string
{
    return $str . $sub;
}

/**
 * Prepend $sub to str
 *
 * @param  string $str
 * @param  string $sub
 * @return string
 */
function libstr_prepend(string $str, string $sub): string
{
    return $sub . $str;
}

/**
 * Check whether $prefix exists in the string, and
 * prepend $prefix to the string if it doesn't
 *
 * @param  $str
 * @param  $check
 * @return string
 */
function libstr_ensureLeft(string $str, string $check): string
{
    if (libstr_hasPrefix($str, $check)) { return $str; }
    return libstr_prepend($str, $check);
}

/**
 * Check whether $suffix exists in the string, and
 * append $suffix to the string if it doesn't
 *
 * @param  $str
 * @param  $check
 * @return string
 */
function libstr_ensureRight(string $str, string $check): string
{
    if (libstr_hasSuffix($str, $check)) { return $str; }
    return libstr_append($str, $check);
}

/**
 * Returns a new string of a given length such that both sides of the
 * string are padded. Alias for pad() with a $padType of 'both'.
 *
 * @param  string $str
 * @param  int    $length Desired string length after padding
 * @param  string $padStr String used to pad, defaults to space
 * @return string
 */
function libstr_padBoth(string $str, int $length, string $padStr = ' '): string
{
    $padding = $length - \mb_strlen($str);
    return libstr_applyPadding($str, (int)floor($padding / 2), (int)ceil($padding / 2), $padStr);
}

/**
 * Returns a new string of a given length such that the beginning of the
 * string is padded. Alias for pad() with a $padType of 'left'.
 *
 * @param  string $str
 * @param  int    $length Desired string length after padding
 * @param  string $padStr String used to pad, defaults to space
 * @return string
 */
function libstr_padLeft(string $str, int $length, string $padStr = ' '): string
{
    return libstr_applyPadding($str, $length - \mb_strlen($str), 0, $padStr);
}

/**
 * Returns a new string of a given length such that the end of the string
 * is padded. Alias for pad() with a $padType of 'right'.
 *
 * @param  string $str
 * @param  int    $length Desired string length after padding
 * @param  string $padStr String used to pad, defaults to space
 * @return string
 */
function libstr_padRight(string $str, int $length, string $padStr = ' '): string
{
    return libstr_applyPadding($str, 0, $length - \mb_strlen($str), $padStr);
}

/** @noinspection MoreThanThreeArgumentsInspection */
/**
 * Adds the specified amount of left and right padding to the given string.
 * The default character used is a space.
 *
 * @param  string $str
 * @param  int    $left   Length of left padding
 * @param  int    $right  Length of right padding
 * @param  string $padStr String used to pad
 * @return string
 *
 * @internal
 */
function libstr_applyPadding(string $str, int $left = 0, int $right = 0, string $padStr = ' '): string
{
    if ($right + $left <= 0) { return $str; }
    if ('' === $padStr) { return $str;}

    if (1 === \mb_strlen($padStr)) {
        return str_repeat($padStr, $left) . $str . str_repeat($padStr, $right);
    }

    $leftPadding = \mb_substr(str_repeat($padStr, $left), 0, $left);
    $rightPadding = \mb_substr(str_repeat($padStr, $right), 0, $right);
    return $leftPadding . $str . $rightPadding;
}

/**
 * Inserts $substring into the string at the $index provided.
 *
 * @param  string $str
 * @param  string $substring String to be inserted
 * @param  int    $index     The index at which to insert the substring
 * @return string with the resulting $str after the insertion
 */
function libstr_insert(string $str, string $substring, int $index): string
{
    if (0 === $index) { return $substring . $str; }
    if ($substring === '') { return $str; }
    return \mb_substr($str, 0, $index) . $substring . \mb_substr($str, $index);
}

/**
 * Returns a new string with the prefix $substring removed, if present.
 *
 * @param  string $str
 * @param  string $substring The prefix to remove
 * @return string having a $str without the prefix $substring
 */
function libstr_removeLeft(string $str, string $substring): string
{
    if ('' !== $substring && libstr_hasPrefix($str, $substring)) {
        return \mb_substr($str, \mb_strlen($substring));
    }

    return $str;
}

/**
 * Returns a new string with the suffix $substring removed, if present.
 *
 * @param  string $str
 * @param  string $substring The suffix to remove
 * @return string having a $str without the suffix $substring
 */
function libstr_removeRight(string $str, string $substring): string
{
    if ('' !== $substring && libstr_hasSuffix($str, $substring)) {
        return \mb_substr($str, 0, \mb_strlen($str) - \mb_strlen($substring));
    }

    return $str;
}

/**
 * Returns a repeated string given a multiplier. An alias for str_repeat.
 *
 * @param  string $str
 * @param  int    $multiplier The number of times to repeat the string
 * @return string with a repeated str
 */
function libstr_repeat(string $str, int $multiplier): string
{
    return \str_repeat($str, $multiplier);
}

/**
 * Returns a reversed string. A multi-byte version of strrev().
 *
 * @param  string $str
 * @return string
 */
function libstr_reverse(string $str): string
{
    if ('' === $str) {
        return '';
    }

    $reversed = '';

    // Loop from last index of string to first
    $i = \mb_strlen($str);
    while ($i--) {
        $reversed .= \mb_substr($str, $i, 1);
    }

    return $reversed;
}

/**
 * A multi-byte str_shuffle() function. It returns a string with its
 * characters in random order.
 *
 * @param  string $str
 * @return string
 */
function libstr_shuffle(string $str): string
{
    $indexes = \range(0, \mb_strlen($str) - 1);
    \shuffle($indexes);

    $shuffledStr = '';
    foreach ($indexes as $i) {
        $shuffledStr .= \mb_substr($str, $i, 1);
    }

    return $shuffledStr;
}

/** @noinspection MoreThanThreeArgumentsInspection */
/**
 * Returns the substring between $start and $end, if found, or an empty
 * string. An optional offset may be supplied from which to begin the
 * search for the start string.
 *
 * @param  string $str
 * @param  string $start  Delimiter marking the start of the substring
 * @param  string $end    Delimiter marking the end of the substring
 * @param  int    $offset Index from which to begin the search
 * @return string
 */
function libstr_between(string $str, string $start, string $end, int $offset = 0): string
{
    $startIndex = libstr_indexOf($str, $start, $offset);
    if ($startIndex === -1) { return ''; }

    $substrIndex = $startIndex + \mb_strlen($start);
    $endIndex = libstr_indexOf($str, $end, $substrIndex);

    if ($endIndex === -1) { return ''; }
    if ($endIndex === $substrIndex) { return ''; }

    return libstr_substr($str, $substrIndex, $endIndex - $substrIndex);
}

/**
 * Returns a camelCase version of the string. Trims surrounding spaces,
 * capitalizes letters following digits, spaces, dashes and underscores,
 * and removes spaces, dashes, as well as underscores.
 *
 * @param  string $str
 * @return string in camelCase
 */
function libstr_camelize(string $str): string
{
    $str = libstr_lowerCaseFirst(libstr_trim($str));
    $str = preg_replace('/^[-_]+/', '', $str);
    $str = preg_replace_callback('/[-_\s]+(.)?/u', function ($match)
    {
        if (isset($match[1])) { return \mb_strtoupper($match[1]); }
        return '';
    }, $str);
    $str = preg_replace_callback('/[\d]+(.)?/u', function ($match) {
        return \mb_strtoupper($match[0]);
    }, $str);
    return $str;
}

/**
 * Make a string lowercase
 *
 * @param  string $str
 * @return string
 */
function libstr_toLowerCase(string $str): string
{
    return \mb_strtolower($str);
}

/**
 * Make a string uppercase
 *
 * @param  string $str
 * @return string
 */
function libstr_toUpperCase(string $str): string
{
    return \mb_strtoupper($str);
}

/**
 * Converts the first character of the string to lower case.
 *
 * @param  string $str
 * @return string
 */
function libstr_lowerCaseFirst(string $str): string
{
    if ('' === $str) {
        return '';
    }

    $first = \mb_substr($str, 0, 1);
    $rest = \mb_substr($str, 1);
    return \mb_strtolower($first) . $rest;
}

/**
 * Converts the first character of the supplied string to upper case.
 *
 * @param  string $str
 * @return string
 */
function libstr_upperCaseFirst(string $str): string
{
    if ('' === $str) {
        return '';
    }

    $first = \mb_substr($str, 0, 1);
    $rest = \mb_substr($str, 1);
    return \mb_strtoupper($first) . $rest;
}

/**
 * Trims the string and replaces consecutive whitespace characters with a
 * single space. This includes tabs and newline characters, as well as
 * multi-byte whitespace such as the thin space and ideographic space.
 *
 * @param  string $str
 * @return string
 */
function libstr_collapseWhitespace(string $str): string
{
    $str = libstr_regexReplace($str, '[[:space:]]+', ' ');
    return libstr_trim($str);
}

/** @noinspection MoreThanThreeArgumentsInspection */
/**
 * Replaces all occurrences of $pattern in $str by $replacement. An alias
 * for mb_ereg_replace(). Note that the 'i' option with multi-byte patterns
 * in mb_ereg_replace() requires PHP 5.6+ for correct results. This is due
 * to a lack of support in the bundled version of Oniguruma in PHP < 5.6,
 * and current versions of HHVM (3.8 and below).
 *
 * @param  string $str
 * @param  string $pattern     The regular expression pattern
 * @param  string $replacement The string to replace with
 * @param  string $options     Matching conditions to be used
 * @return string
 */
function libstr_regexReplace(string $str, string $pattern, string $replacement, string $options = 'msr'): string
{
    return \mb_ereg_replace($pattern, $replacement, $str, $options);
}

/**
 * Returns a lowercase and trimmed string separated by dashes. Dashes are
 * inserted before uppercase characters (with the exception of the first
 * character of the string), and in place of spaces as well as underscores.
 *
 * @param  string $str
 * @return string
 */
function libstr_dasherize(string $str): string
{
    return libstr_delimit($str, '-');
}

/**
 * Returns a lowercase and trimmed string separated by the given delimiter.
 * Delimiters are inserted before uppercase characters (with the exception
 * of the first character of the string), and in place of spaces, dashes,
 * and underscores. Alpha delimiters are not converted to lowercase.
 *
 * @param  string $str
 * @param  string $delimiter Sequence used to separate parts of the string
 * @return string
 */
function libstr_delimit(string $str, string $delimiter): string
{
    $str = libstr_trim($str);
    $str = libstr_regexReplace($str, '\B([A-Z])', '-\1');
    $str = libstr_toLowerCase($str);
    return libstr_regexReplace($str, '[-_\s]+', $delimiter);
}

/**
 * Convert all HTML entities to their applicable characters. An alias of
 * html_entity_decode. For a list of flags, refer to
 * http://php.net/manual/en/function.html-entity-decode.php
 *
 * @param  string $str
 * @param  int    $flags Optional flags
 * @return string
 */
function libstr_htmlDecode(string $str, int $flags = ENT_QUOTES): string
{
    return \html_entity_decode($str, $flags);
}

/**
 * Convert all applicable characters to HTML entities. An alias of
 * htmlentities. Refer to http://php.net/manual/en/function.htmlentities.php
 * for a list of flags.
 *
 * @param  string $str
 * @param  int    $flags Optional flags
 * @return string
 */
function libstr_htmlEncode(string $str, int $flags = ENT_QUOTES): string
{
    return \htmlentities($str, $flags);
}

/**
 * Capitalizes the first word of the string, replaces underscores with
 * spaces, and strips '_id'.
 *
 * @param  string $str
 * @return string
 */
function libstr_humanize(string $str): string
{
    $str = \str_replace(['_id', '_'], ['', ' '], $str);
    $str = libstr_trim($str);
    return libstr_upperCaseFirst($str);
}

/**
 * Splits on newlines and carriage returns, returning an array of strings
 * corresponding to the lines in the string.
 *
 * @param  string $str
 * @return array of strings
 */
function libstr_lines(string $str): array
{
    return libstr_split($str, '[\r\n]{1,2}');
}

/**
 * Splits the string with the provided regular expression, returning an
 * array of strings. An optional integer $limit will truncate the
 * results.
 *
 * @param  string $str
 * @param  string $pattern The regex with which to split the string
 * @param  int    $limit   Optional maximum number of results to return
 * @return array of strings
 */
function libstr_split(string $str, string $pattern, int $limit = -1): array
{
    if (0 === $limit || '' === $str) { return []; }
    if ($pattern === '') { return [$str]; }

    // mb_split returns the remaining unsplit string in the last index when
    // supplying a limit
    $limit = ($limit > 0) ? $limit + 1 : -1;

    $array = \mb_split($pattern, $str, $limit);
    if ($limit > 0 && \count($array) === $limit) {
        array_pop($array);
    }

    $result = [];
    foreach ($array as $string) {
        $result[] = $string;
    }

    return $result;
}

// @todo Optimize all below this line:
// ----------------------------------------------------------

/**
 * Returns the longest common prefix between the string and $otherStr.
 *
 * @param  string $str
 * @param  string $otherStr Second string for comparison
 * @return string being the longest common prefix
 */
function libstr_longestCommonPrefix(string $str, string $otherStr): string
{
    $maxLength = min(\mb_strlen($str), \mb_strlen($otherStr));

    $longestCommonPrefix = '';

    for ($i = 0; $i < $maxLength; $i++) {
        $char = \mb_substr($str, $i, 1);

        if ($char === \mb_substr($otherStr, $i, 1)) {
            $longestCommonPrefix .= $char;
        } else { break; }
    }

    return $longestCommonPrefix;
}

/**
 * Returns the longest common suffix between the string and $otherStr.
 *
 * @param  string $str
 * @param  string $otherStr Second string for comparison
 * @return string being the longest common suffix
 */
function libstr_longestCommonSuffix(string $str, string $otherStr): string
{
    $maxLength = min(\mb_strlen($str), \mb_strlen($otherStr));

    $longestCommonSuffix = '';

    for ($i = 1; $i <= $maxLength; $i++) {
        $char = \mb_substr($str, -$i, 1);

        if ($char === \mb_substr($otherStr, -$i, 1)) {
            $longestCommonSuffix = $char . $longestCommonSuffix;
        } else { break; }
    }

    return $longestCommonSuffix;
}

/**
 * Returns the longest common substring between the string and $otherStr.
 * In the case of ties, it returns that which occurs first.
 *
 * @param  string $str
 * @param  string $otherStr Second string for comparison
 * @return string being the longest common substring
 */
function libstr_longestCommonSubstring(string $str, string $otherStr): string
{
    // Uses dynamic programming to solve
    // http://en.wikipedia.org/wiki/Longest_common_substring_problem
    $strLength = \mb_strlen($str);
    $otherLength = \mb_strlen($otherStr);

    // Return if either string is empty
    if ($strLength === 0 || $otherLength === 0) {
        $str = '';
        return $str;
    }

    $len = 0;
    $end = 0;
    $table = array_fill(0, $strLength + 1,
        array_fill(0, $otherLength + 1, 0));

    for ($i = 1; $i <= $strLength; $i++) {
        for ($j = 1; $j <= $otherLength; $j++) {
            $strChar = \mb_substr($str, $i - 1, 1);
            $otherChar = \mb_substr($otherStr, $j - 1, 1);

            if ($strChar === $otherChar) {
                $table[$i][$j] = $table[$i - 1][$j - 1] + 1;
                if ($table[$i][$j] > $len) {
                    $len = $table[$i][$j];
                    $end = $i;
                }
            } else {
                $table[$i][$j] = 0;
            }
        }
    }

    $str = \mb_substr($str, $end - $len, $len);

    return $str;
}

/**
 * Truncates the string to a given length, while ensuring that it does not
 * split words. If $substring is provided, and truncating occurs, the
 * string is further truncated so that the substring may be appended without
 * exceeding the desired length.
 *
 * @param  string $str
 * @param  int    $length    Desired length of the truncated string
 * @param  string $substring The substring to append if it can fit
 * @return string
 */
function libstr_safeTruncate(string $str, int $length, string $substring = ''): string
{
    if ($length >= \mb_strlen($str)) {
        return $str;
    }

    // Need to further trim the string so we can append the substring
    $substringLength = \mb_strlen($substring);
    $length -= $substringLength;

    $truncated = \mb_substr($str, 0, $length);

    // If the last word was truncated
    if (\mb_strpos($str, ' ', $length - 1) !== $length) {
        // Find pos of the last occurrence of a space, get up to that
        $lastPos = \mb_strrpos($truncated, ' ', 0);
        if ($lastPos !== false) {
            $truncated = \mb_substr($truncated, 0, $lastPos);
        }
    }

    $str = $truncated . $substring;

    return $str;
}

/**
 * Converts the string into an URL slug. This includes replacing non-ASCII
 * characters with their closest ASCII equivalents, removing remaining
 * non-ASCII and non-alphanumeric characters, and replacing whitespace with
 * $replacement. The replacement defaults to a single dash, and the string
 * is also converted to lowercase. The language of the source string can
 * also be supplied for language-specific transliteration.
 *
 * @param  string $str
 * @param  string $replacement The string used to replace whitespace
 * @param  string $language    Language of the source string
 * @return string
 */
function libstr_slugify(string $str, string $replacement = '-', string $language = 'en'): string
{
    $str = libstr_toAscii($str, $language);

    $str = \str_replace('@', $replacement, $str);
    $quotedReplacement = \preg_quote($replacement, '');
    $pattern = "/[^a-zA-Z\d\s-_$quotedReplacement]/u";
    $str = \preg_replace($pattern, '', $str);

    $str = libstr_toLowerCase($str);
    $str = libstr_delimit($str, $replacement);
    $str = libstr_removeLeft($str, $replacement);

    return libstr_removeRight($str, $replacement);
}

/**
 * Returns an ASCII version of the string. A set of non-ASCII characters are
 * replaced with their closest ASCII counterparts, and the rest are removed
 * by default. The language or locale of the source string can be supplied
 * for language-specific transliteration in any of the following formats:
 * en, en_GB, or en-GB. For example, passing "de" results in "äöü" mapping
 * to "aeoeue" rather than "aou" as in other languages.
 *
 * @param  string $str
 * @param  string $language          Language of the source string
 * @param  bool   $removeUnsupported Whether or not to remove the unsupported characters
 * @return string
 */
function libstr_toAscii(string $str, string $language = 'en', bool $removeUnsupported = true): string
{
    $langSpecific = libstr_langSpecificCharsArray($language);

    if (!empty($langSpecific)) {
        $str = \str_replace($langSpecific[0], $langSpecific[1], $str);
    }

    // @todo optimize
    foreach (libstr_charsArray() as $key => $value) {
        /** @noinspection ForeachSourceInspection */
        foreach ($value as $item) {
            $str = libstr_replace($str, $item, (string)$key);
        }
    }

    if ($removeUnsupported) {
        $str = \preg_replace('/[^\x20-\x7E]/', '', $str);
    }

    return $str;
}

/**
 * Returns the substring beginning at $start, and up to, but not including
 * the index specified by $end. If $end is omitted, the function extracts
 * the remaining string. If $end is negative, it is computed from the end
 * of the string.
 *
 * @param  string $str
 * @param  int    $start Initial index from which to begin extraction
 * @param  int    $end   Optional index at which to end extraction
 * @return string being the extracted substring
 */
function libstr_slice(string $str, int $start, int $end = null): string
{
    if ($end === null) {
        $length = \mb_strlen($str);
    }
    elseif ($end >= 0 && $end <= $start) {
        return '';
    }
    elseif ($end < 0) {
        $length = \mb_strlen($str) + $end - $start;
    }
    else {
        $length = $end - $start;
    }

    return libstr_substr($str, $start, $length);
}

/**
 * Strip all whitespace characters. This includes tabs and newline
 * characters, as well as multi-byte whitespace such as the thin space
 * and ideographic space.
 *
 * @param  string $str
 * @return string with whitespace stripped
 */
function libstr_stripWhitespace(string $str): string
{
    return libstr_regexReplace($str, '[[:space:]]+', '');
}

/**
 * Truncates the string to a given length. If $substring is provided, and
 * truncating occurs, the string is further truncated so that the substring
 * may be appended without exceeding the desired length.
 *
 * @param  string $str
 * @param  int    $length    Desired length of the truncated string
 * @param  string $substring The substring to append if it can fit
 * @return string
 */
function libstr_truncate(string $str, int $length, string $substring = ''): string
{
    if ($length >= \mb_strlen($str)) { return $str; }

    // Need to further trim the string so we can append the substring
    $substringLength = \mb_strlen($substring);
    $length -= $substringLength;

    $truncated = \mb_substr($str, 0, $length);
    $str = $truncated . $substring;

    return $str;
}

/**
 * Returns an UpperCamelCase version of the supplied string. It trims
 * surrounding spaces, capitalizes letters following digits, spaces, dashes
 * and underscores, and removes spaces, dashes, underscores.
 *
 * @param  string $str
 * @return string
 */
function libstr_upperCamelize(string $str): string
{
    return libstr_upperCaseFirst(libstr_camelize($str));
}

/**
 * Surrounds $str with the given substring.
 *
 * @param  string $str
 * @param  string $substring The substring to add to both sides
 * @return string
 */
function libstr_surround(string $str, string $substring): string
{
    return implode('', [$substring, $str, $substring]);
}

/**
 * Returns a case swapped version of the string.
 *
 * @param  string $str
 * @return string that has each character's case swapped
 */
function libstr_swapCase(string $str): string
{
    return preg_replace_callback(
        '/[\S]/u',
        function ($match) {
            if ($match[0] === \mb_strtoupper($match[0])) {
                return \mb_strtolower($match[0]);
            }

            return \mb_strtoupper($match[0]);
        },
        $str
    );
}

/**
 * Returns a string with smart quotes, ellipsis characters, and dashes from
 * Windows-1252 (commonly used in Word documents) replaced by their ASCII
 * equivalents.
 *
 * @param  string $str
 * @return string
 */
function libstr_tidy(string $str): string
{
    return preg_replace([
        '/\x{2026}/u',
        '/[\x{201C}\x{201D}]/u',
        '/[\x{2018}\x{2019}]/u',
        '/[\x{2013}\x{2014}]/u',
    ], [
        '...',
        '"',
        "'",
        '-',
    ], $str);
}

/**
 * Returns a trimmed string with the first letter of each word capitalized.
 * Also accepts an array, $ignore, allowing you to list words not to be
 * capitalized.
 *
 * @param  string $str
 * @param  array  $ignore An array of words not to capitalize
 * @return string
 */
function libstr_titleize(string $str, array $ignore = []): string
{
    $str = trim($str);

    return preg_replace_callback(
        '/([\S]+)/u',
        function ($match) use ($ignore) {
            if ($ignore && \in_array($match[0], $ignore, true)) {
                return $match[0];
            }

            $str = $match[0];
            $str = libstr_toLowerCase($str);

            return libstr_upperCaseFirst($str);
        },
        $str
    );
}

/**
 * Converts each tab in the string to some number of spaces, as defined by
 * $tabLength. By default, each tab is converted to 4 consecutive spaces.
 *
 * @param  string $str
 * @param  int    $tabLength Number of spaces to replace each tab with
 * @return string
 */
function libstr_toSpaces(string $str, int $tabLength = 4): string
{
    $spaces = \str_repeat(' ', $tabLength);

    return \str_replace("\t", $spaces, $str);
}

/**
 * Converts each occurrence of some consecutive number of spaces, as
 * defined by $tabLength, to a tab. By default, each 4 consecutive spaces
 * are converted to a tab.
 *
 * @param  string $str
 * @param  int    $tabLength Number of spaces to replace with a tab
 * @return string
 */
function libstr_toTabs(string $str, int $tabLength = 4): string
{
    $spaces = \str_repeat(' ', $tabLength);

    return \str_replace($spaces, "\t", $str);
}

/**
 * Converts the first character of each word in the string to uppercase.
 *
 * @param  string $str
 * @return string
 */
function libstr_toTitleCase(string $str): string
{
    return \mb_convert_case($str, \MB_CASE_TITLE);
}

/**
 * Returns a lowercase and trimmed string separated by underscores.
 * Underscores are inserted before uppercase characters (with the exception
 * of the first character of the string), and in place of spaces as well as
 * dashes.
 *
 * @param  string $str
 * @return string
 */
function libstr_underscored(string $str): string
{
    return libstr_delimit($str, '_');
}

/** @noinspection MoreThanThreeArgumentsInspection */
/**
 * Move substring of desired $length to $destination index of the original $str.
 * In case $destination is less than $length returns $str untouched.
 *
 * @param  string $str
 * @param  int    $start
 * @param  int    $length
 * @param  int    $destination
 * @return string
 */
function libstr_move(string $str, int $start, int $length, int $destination): string
{
    if ($destination <= $length) { return $str; }

    $substr = libstr_substr($str, $start, $length);
    $result = libstr_insert($str, $substr, $destination);

    return libstr_replace($result, $substr, '', 1);
}

/** @noinspection MoreThanThreeArgumentsInspection */
/**
 * Replaces substring in the original $str of $length with given $substr.
 *
 * @param  string $str
 * @param  int    $start
 * @param  int    $length
 * @param  string $substr
 * @return string
 */
function libstr_overwrite(string $str, int $start, int $length, string $substr): string
{
    if ($length <= 0) { return $str; }

    $sub = libstr_substr($str, $start, $length);

    return libstr_replace($str, $sub, $substr, 1);
}

/**
 * Returns a snake_case version of the string.
 *
 * @todo refactoring
 * @todo cover null in tests
 * @param  string $str
 * @return string
 */
function libstr_snakeize(string $str): string
{
    $str = \mb_ereg_replace('::', '/', $str);
    $str = \mb_ereg_replace('([A-Z]+)([A-Z][a-z])', '\1_\2', $str);
    $str = \mb_ereg_replace('([a-z\d])([A-Z])', '\1_\2', $str);
    $str = \mb_ereg_replace('\s+', '_', $str);
    $str = \mb_ereg_replace('\s+', '_', $str);
    $str = \mb_ereg_replace('^\s+|\s+$', '', $str);
    $str = \mb_ereg_replace('-', '_', $str);
    $str = libstr_toLowerCase($str);

    $str = \mb_ereg_replace_callback(
        '([\d|A-Z])',
        function ($matches) {
            $match = $matches[1];
            if ((string)(int)$match === $match) {
                return '_' . $match . '_';
            }
            return null;
        },
        $str
    );

    $str = \mb_ereg_replace('_+', '_', $str);
    $str = libstr_trim($str, '_');

    return $str;
}

/** @noinspection MoreThanThreeArgumentsInspection */
/**
 * Inserts given $substr $times times into the original $str after
 * the first occurrence of $needle.
 *
 * @param  string $str
 * @param  string $needle
 * @param  string $substr
 * @param  int    $times
 * @return string
 */
function libstr_afterFirst(string $str, string $needle, string $substr, int $times = 1): string
{
    $idx = libstr_indexOf($str, $needle);
    $needleLen = \mb_strlen($needle);
    $idxEnd = $idx + $needleLen;
    $innerSubstr = libstr_repeat($substr, $times);

    return libstr_insert($str, $innerSubstr, $idxEnd);
}

/** @noinspection MoreThanThreeArgumentsInspection */
/**
 * Inserts given $substr $times times into the original $str before
 * the first occurrence of $needle.
 *
 * @param  string $str
 * @param  string $needle
 * @param  string $substr
 * @param  int    $times
 * @return string
 */
function libstr_beforeFirst(string $str, string $needle, string $substr, int $times = 1): string
{
    $idx = libstr_indexOf($str, $needle);
    $innerSubstr = libstr_repeat($substr, $times);

    return libstr_insert($str, $innerSubstr, $idx);
}

/** @noinspection MoreThanThreeArgumentsInspection */
/**
 * Inserts given $substr $times times into the original $str after
 * the last occurrence of $needle.
 *
 * @param  string $str
 * @param  string $needle
 * @param  string $substr
 * @param  int    $times
 * @return string
 */
function libstr_afterLast(string $str, string $needle, string $substr, int $times = 1): string
{
    $idx = libstr_indexOfLast($str, $needle);
    $needleLen = \mb_strlen($needle);
    $idxEnd = $idx + $needleLen;
    $innerSubstr = libstr_repeat($substr, $times);

    return libstr_insert($str, $innerSubstr, $idxEnd);
}

/** @noinspection MoreThanThreeArgumentsInspection */
/**
 * Inserts given $substr $times times into the original $str before
 * the last occurrence of $needle.
 *
 * @param  string $str
 * @param  string $needle
 * @param  string $substr
 * @param  int    $times
 * @return string
 */
function libstr_beforeLast(string $str, string $needle, string $substr, int $times = 1): string
{
    $idx = libstr_indexOfLast($str, $needle);
    $innerSubstr = libstr_repeat($substr, $times);

    return libstr_insert($str, $innerSubstr, $idx);
}

/**
 * Splits the given $str in pieces by '@' delimiter and returns
 * true in case the resulting array consists of 2 parts.
 *
 * @param  string $str
 * @return bool
 */
function libstr_isEmail(string $str): bool
{
    $split = libstr_split($str, '@');

    return \count($split) === 2;
}

/**
 * Checks whether given $str is a valid ip v4.
 *
 * @param  string $str
 * @return bool
 */
function libstr_isIpV4(string $str): bool
{
    $regex = '\b((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)(\.|$)){4}\b';

    return libstr_matchesPattern($str, $regex);
}

/**
 * Checks whether given $str is a valid ip v6.
 *
 * @param  string $str
 * @return bool
 */
function libstr_isIpV6(string $str): bool
{
    $regex = '^\s*((([0-9A-Fa-f]{1,4}:){7}([0-9A-Fa-f]{1,4}|:))|(([0-9A-Fa-f]{1,4}:){6}(:[0-9A-Fa-f]{1,4}|((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){5}(((:[0-9A-Fa-f]{1,4}){1,2})|:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){4}(((:[0-9A-Fa-f]{1,4}){1,3})|((:[0-9A-Fa-f]{1,4})?:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){3}(((:[0-9A-Fa-f]{1,4}){1,4})|((:[0-9A-Fa-f]{1,4}){0,2}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){2}(((:[0-9A-Fa-f]{1,4}){1,5})|((:[0-9A-Fa-f]{1,4}){0,3}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){1}(((:[0-9A-Fa-f]{1,4}){1,6})|((:[0-9A-Fa-f]{1,4}){0,4}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(:(((:[0-9A-Fa-f]{1,4}){1,7})|((:[0-9A-Fa-f]{1,4}){0,5}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:)))(%.+)?\s*$';

    return libstr_matchesPattern($str, $regex);
}

/**
 * Generates a random string consisting of $possibleChars, if specified, of given $size or
 * random length between $size and $sizeMax.
 *
 * @param  int    $size          The desired length of the string
 * @param  string $possibleChars If given, specifies allowed characters to make the string of
 * @param  int    $sizeMax       If given and is > $size, the generated string will have random length
 *                               between $size and $sizeMax
 * @return string
 */
function libstr_random(int $size, int $sizeMax = -1, string $possibleChars = ''): string
{
    if ($size <= 0 || $sizeMax === 0) { return ''; }
    if ($sizeMax > 0 && $sizeMax < $size) { return ''; }

    $allowedChars = $possibleChars ?: 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    $maxLen = $sizeMax > 0 ? $sizeMax : $size;
    /** @noinspection RandomApiMigrationInspection */
    $actualLen = \rand($size, $maxLen);
    $allowedCharsLen = \mb_strlen($allowedChars) - 1;

    $result = '';

    while ($actualLen--) {
        /** @noinspection RandomApiMigrationInspection */
        $char = libstr_substr($allowedChars, \rand(0, $allowedCharsLen), 1);
        $result .= $char;
    }

    return $result;
}

/** @noinspection MoreThanThreeArgumentsInspection */
/**
 * Appends a random string consisting of $possibleChars, if specified, of given $size or
 * random length between $size and $sizeMax to the given $str.
 *
 * @param  string $str
 * @param  int    $size          The desired length of the string. Defaults to 4
 * @param  string $possibleChars If given, specifies allowed characters to make the string of
 * @param  int    $sizeMax       If given and is > $size, the generated string will have random length
 *                               between $size and $sizeMax
 * @return string
 */
function libstr_appendUniqueIdentifier(string $str, int $size = 4, int $sizeMax = -1, string $possibleChars = ''): string
{
    $identifier = libstr_random($size, $sizeMax, $possibleChars);

    return $str . $identifier;
}

/**
 * Splits whitespace, returning an array of strings corresponding to the words in the string.
 *
 * @param  string $str
 * @return array of strings
 */
function libstr_words(string $str): array
{
    return libstr_split($str, '[[:space:]]+');
}

/**
 * Wraps each word in the given $str with specified $quote.
 *
 * @param  string $str
 * @param  string $quote Defaults to ".
 * @return string
 */
function libstr_quote(string $str, string $quote = '"'): string
{
    $words = libstr_words($str);
    $result = [];

    foreach ($words as $word) {
        $result[] = $quote . $word . $quote;
    }

    return \implode(' ', $result);
}

/**
 * Unwraps each word in the given $str, deleting the specified $quote.
 *
 * @param  string $str
 * @param  string $quote Defaults to ".
 * @return string
 */
function libstr_unquote(string $str, string $quote = '"'): string
{
    $words = libstr_words($str);
    $result = [];

    foreach ($words as $word) {
        $result[] = libstr_trim($word, $quote);
    }

    return \implode(' ', $result);
}

/**
 * Cuts the given $str in pieces of $step size.
 *
 * @param  string $str
 * @param  int    $step
 * @return array
 */
function libstr_chop(string $str, int $step = 0): array
{
    $result = [];
    $len = \mb_strlen($str);

    if ($str === '' || $step <= 0) { return []; }

    if ($step >= $len) { return [$str]; }

    $startPos = 0;

    for ($i = 0; $i < $len; $i+=$step) {
        $result[] = libstr_substr($str, $startPos, $step);
        $startPos += $step;
    }

    return $result;
}

/**
 * Joins the original string with an array of other strings.
 *
 * @param string $str
 * @param  $separator
 * @param   $otherStrings
 *
 * @return string
 */
function libstr_join(string $str, string $separator, array $otherStrings = []): string
{
    if (empty($otherStrings)) { return $str; }

    foreach ($otherStrings as $otherString) {
        if ($otherString) {
            $str .= $separator . $otherString;
        }
    }

    return $str;
}

/**
 * Returns the substring of the original string from beginning to
 * the first occurrence of $delimiter.
 *
 * @param  string $str
 * @param  string $delimiter
 *
 * @return string
 */
function libstr_shift(string $str, string $delimiter): string
{
    if (!$str || !$delimiter) { return ''; }

    $idx = libstr_indexOf($str, $delimiter);

    if ($idx === -1) { return $str; }

    return libstr_substr($str, 0, $idx);
}

/**
 * Returns the substring of the original string from the first
 * occurrence of $delimiter to the end.
 *
 * @param  string $str
 * @param  string $delimiter
 *
 * @return string
 */
function libstr_shiftReversed(string $str, string $delimiter): string
{
    if (!$str || !$delimiter) { return ''; }

    $idx = libstr_indexOf($str, $delimiter) + 1;

    if ($idx === -1) { return $str; }

    return libstr_substr($str, $idx);
}

/**
 * Returns the substring of the original string from the last
 * occurrence of $delimiter to the end.
 *
 * @param  string $str
 * @param  string $delimiter
 *
 * @return string
 */
function libstr_pop(string $str, string $delimiter): string
{
    if (!$str || !$delimiter) { return ''; }

    $idx = libstr_indexOfLast($str, $delimiter) + 1;

    if ($idx === -1) { return $str; }

    return libstr_substr($str, $idx);
}


/**
 * Returns the substring of the original string from the beginning
 * to the last occurrence of $delimiter.
 *
 * @param  string $str
 * @param  string $delimiter
 *
 * @return string
 */
function libstr_popReversed(string $str, string $delimiter): string
{
    if (!$str || !$delimiter) { return ''; }

    $idx = libstr_indexOfLast($str, $delimiter);

    if ($idx === -1) { return $str; }

    return libstr_substr($str, 0, $idx);
}
