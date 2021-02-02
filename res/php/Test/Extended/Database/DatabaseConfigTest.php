<?php

namespace SAO\Test\Extended\Database;

use SAO\Modules\Basics\Warning;
use SAO\Modules\Extended\Database\DatabaseConfig;
use PHPUnit\Framework\TestCase;

class DatabaseConfigTest extends TestCase {

    /**
     *
     * @var DatabaseConfig
     */
    private $dbc;

    protected function setUp() {
        $this->dbc = new DatabaseConfig();
    }

    public function testDatabaseConfigBasics() {
        $Basics = $this->dbc->Basics();

        $Basics->setLog("foo");

        $this->assertEquals(2, $Basics->getLogCount());
        $this->assertEquals(0, count($Basics->getWarnings()));
        $this->assertEquals(0, count($Basics->getErrors()));
    }

    public function testDatabaseConfigGettersSetters() {
        $dbc = $this->dbc;

        $this->assertEquals($dbc->setServer("foo"), $dbc->getServer());
        $this->assertEquals($dbc->setUserName("foo"), $dbc->getUserName());
        $this->assertEquals($dbc->setPassword("bar"), $dbc->getPassword());
        $this->assertEquals($dbc->setDatabase("bar"), $dbc->getDatabase());
    }

    public function testDatabaseConfigfromIniFile() {
        $iniFile = 'config.ini';
        $this->assertFileExists($iniFile);
        $dbc = DatabaseConfig::fromIniFile(NULL, $iniFile);

        $this->assertEquals("hendell.pw", $dbc->getServer());
        $this->assertEquals("uml", $dbc->getUserName());
        $this->assertEquals("uml", $dbc->getPassword());
        $this->assertEquals("uml_sao", $dbc->getDatabase());
    }

    public function testDatabaseConfigWarnings() {
        $w = $this->dbc->Basics();

        $this->assertFalse($w->hasWarning(Warning\WarningCodes::DATABASE_CONFIGURATION_INVALID_FORMAT));
        $this->assertFalse($w->hasWarning(Warning\WarningCodes::CANT_LOAD_DATABASE_CONFIGURATION_FILE));
    }

}
