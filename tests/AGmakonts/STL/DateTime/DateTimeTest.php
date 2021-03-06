<?php
/**
 * Created by IntelliJ IDEA.
 * User: Radek Adamiec<radek@procreative.eu>
 * Date: 13.01.15
 * Time: 17:58
 */
use \AGmakonts\STL\Number\Integer;


/**
 * @coversDefaultClass \AGmakonts\STL\DateTime\DateTime
 */
class DateTimeTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers ::__construct
     */
    public function test__construct()
    {
        $testClass1 = \AGmakonts\STL\DateTime\DateTime::get(Integer::get(1));
        $testClass2 = \AGmakonts\STL\DateTime\DateTime::get();

        $this->assertInstanceOf(\AGmakonts\STL\DateTime\DateTime::class, $testClass1);
        $this->assertInstanceOf(\AGmakonts\STL\DateTime\DateTime::class, $testClass2);
    }

    /**
     * @covers ::value()
     */
    public function testValue()
    {
        $testClass = \AGmakonts\STL\DateTime\DateTime::get(Integer::get(1));
        $this->assertEquals((new DateTime())->setTimestamp(1)
                                            ->format(\AGmakonts\STL\DateTime\DateTime::DATETIME_FORMAT),
                            $testClass->value());
    }

    /**
     * @covers ::value()
     */
    public function testValueWithFormat()
    {
        $testClass = \AGmakonts\STL\DateTime\DateTime::get(Integer::get(1));
        $this->assertEquals((new DateTime())->setTimestamp(1)
                                            ->format('d'),
                            $testClass->value('d'));
    }

    /**
     * @covers ::__toString()
     */
    public function test__toString()
    {
        $testClass = \AGmakonts\STL\DateTime\DateTime::get(Integer::get(1));
        $this->assertEquals((new DateTime())->setTimestamp(1)
                                            ->format(\AGmakonts\STL\DateTime\DateTime::DATETIME_FORMAT),
                            $testClass->__toString());
        $this->assertTrue(is_string($testClass->value()));
    }

    /**
     * @covers ::extractedValue
     */
    public function testExtractedValue()
    {
        $testClass = \AGmakonts\STL\DateTime\DateTime::get(Integer::get(1));
        $this->assertTrue(is_string($testClass->extractedValue()));
    }


    /**
     * @covers ::get
     */
    public function testGet()
    {
        $testClass1 = \AGmakonts\STL\DateTime\DateTime::get(Integer::get(1));
        $this->assertInstanceOf(\AGmakonts\STL\DateTime\DateTime::class, $testClass1);
    }

    /**
     * @covers ::getTimestamp()
     */
    public function testGetTimestamp()
    {
        $testClass1 = \AGmakonts\STL\DateTime\DateTime::get(Integer::get(1));
        $this->assertInstanceOf(Integer::class, $testClass1->getTimestamp());
        $this->assertEquals(1, $testClass1->getTimestamp()->value());
    }


    /**
     * @covers ::getFromFormat()
     */
    public function testGetFromFormat()
    {
        $testClass1 = \AGmakonts\STL\DateTime\DateTime::getFromFormat(\AGmakonts\STL\String\Text::get("2005-08-15T15:52:01+0000"), \AGmakonts\STL\String\Text::get('Y-m-d\TH:i:sO'));
        
        $this->assertInstanceOf(\AGmakonts\STL\DateTime\DateTime::class, $testClass1);
        $this->assertSame(1124121121, $testClass1->getTimestamp()->value());
    }
}
