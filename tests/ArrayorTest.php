<?php
use Xety\Arrayor\Arrayor;

class ArrayorTest extends PHPUnit_Framework_TestCase
{

    /**
     * test camelizeIndex
     *
     * @return void
     */
    public function testCamelizeIndex()
    {
        $expected = ['keyIndex' => 1];

        $this->assertEquals($expected, Arrayor::camelizeIndex(['key index' => 1]));
        $this->assertEquals($expected, Arrayor::camelizeIndex(['key  index' => 1]));
        $this->assertEquals($expected, Arrayor::camelizeIndex(['key_index' => 1]));

        $expected = [
            'keyIndex' => 1,
            'indexKey' => 'index value'
        ];

        $this->assertEquals($expected, Arrayor::camelizeIndex(['key index' => 1, 'index key' => 'index value']));

        $expected = [
            'keyIndex' => [
                'index test' => 'value 2',
                'index 2' => 'value 1'
            ]
        ];

        $this->assertEquals($expected, Arrayor::camelizeIndex(['key index' => ['index test' => 'value 2', 'index 2' => 'value 1']]));
    }

    /**
     * test camelizeIndexDelimiter
     *
     * @return void
     */
    public function testCamelizeIndexDelimiter()
    {
        $expected = ['keyIndex' => 1];
        $this->assertEquals($expected, Arrayor::camelizeIndex(['key-index' => 1], '-'));

        $expected = ['kYIndX' => 1];
        $this->assertEquals($expected, Arrayor::camelizeIndex(['key index' => 1], 'e'));
    }

    /**
     * test camelizeIndexFailed
     *
     * @return void
     */
    public function testCamelizeIndexFailed()
    {
        $this->assertFalse(Arrayor::camelizeIndex(null));
        $this->assertFalse(Arrayor::camelizeIndex(false));
        $this->assertFalse(Arrayor::camelizeIndex('key index'));
    }

    /**
     * test implodeRecursive
     *
     * @return void
     */
    public function testImplodeRecursive()
    {
        $expected = 'key-index : 1';
        $this->assertEquals($expected, Arrayor::implodeRecursive(['key-index' => 1]));

        $expected = 'key-index : 1 | key index : value';
        $this->assertEquals($expected, Arrayor::implodeRecursive(['key-index' => 1, 'key index' => 'value']));
    }
}
