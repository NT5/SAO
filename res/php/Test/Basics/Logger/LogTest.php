<?php

namespace SAO\Test\Basics\Logger;

use SAO\Modules\Basics\Logger;
use PHPUnit\Framework\TestCase;

class LogTest extends TestCase {

    private $Log;

    protected function setUp() {
        $this->Log = new Logger\Log(self::class, 'foo', 'foo', 0, 0, 0, 'foo');
    }

    public function testLogGetters() {
        $Log = new Logger\Log(self::class, 'foo', 'foo', 0, 0, 0, 'foo');

        $this->assertEquals(self::class, $Log->getClass());
        $this->assertEquals('foo', $Log->getFunction());
        $this->assertEquals('foo', $Log->getFile());
        $this->assertEquals(0, $Log->getLine());
        $this->assertEquals(0, $Log->getMicrotime());
        $this->assertEquals(0, $Log->getDate());
        $this->assertEquals('foo', $Log->getText());
    }

}
