<?php
namespace Xety\Arrayor;

class Arrayor
{

    /**
     * Camelize all index keys in the first level.
     *
     * Passed :
     * $array = [
     *     'Index key' => 1,
     *     'key_index' => 2
     * ];
     *
     * Return :
     * $array = [
     *     'indexKey' => 1,
     *     'keyIndex' => 2
     * ];
     *
     * @param array $array The array to be camelized.
     * @param string $delimiter The delimiter in the input string.
     *
     * @return bool|array
     */
    public static function camelizeIndex($array, $delimiter = '_')
    {
        if (!is_array($array)) {
            return false;
        }

        $array = array_combine(
            array_map(
                function ($key) use ($delimiter) {
                    return lcfirst(static::_camelize($key, $delimiter));
                },
                array_keys($array)
            ),
            array_values($array)
        );

        return $array;
    }

    /**
     * Implode an array into a string by both key and value.
     *
     * Passed :
     * $array = [
     *     'key-index' => 1,
     *     'key index' => 'value'
     * ];
     *
     * Return :
     * $string = 'key-index : 1 | key index : value';
     *
     * @param array $array The associative array.
     * @param string $glue The glue used for pairs of key/values.
     * @param string $separator The glue used to join pairs of key/values.
     *
     * @return string Imploded associative array
     */
    public static function implodeRecursive($array = [], $glue = ' : ', $separator = ' | ')
    {
        $keyArray = array_map(
            function ($val) use ($glue) {
                return implode($glue, $val);
            },
            array_map(null, array_keys($array), array_values($array))
        );

        return implode($separator, $keyArray);
    }

    /**
     * Returns the input lower_case_delimited_string as a CamelCasedString.
     *
     * @param string $string String to camelize.
     * @param string $delimiter The delimiter in the input string.
     *
     * @return string CamelizedStringLikeThis.
     */
    protected static function _camelize($string, $delimiter = '_')
    {
        $result = explode(' ', str_replace($delimiter, ' ', $string));

        foreach ($result as &$word) {
            $word = mb_strtoupper(mb_substr($word, 0, 1)) . mb_substr($word, 1);
        }
        $result = implode(' ', $result);

        $result = str_replace(' ', '', $result);

        return $result;
    }
}
