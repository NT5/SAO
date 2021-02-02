<?php

namespace SAO\Test\Extended\Database;

use SAO\Modules\Basics\Error;
use SAO\Modules\Extended\Database;
use PHPUnit\Framework\TestCase;

class DatabaseConnectionTest extends TestCase {

    /**
     *
     * @var Database\DatabaseConnection
     */
    private $dbc;

    protected function setUp() {
        if (!extension_loaded('mysqli')) {
            $this->markTestSkipped(
                    'The MySQLi extension is not available.'
            );
        }

        $this->dbc = new Database\DatabaseConnection(Database\DatabaseConfig::fromIniFile(), FALSE);
    }

    public function testDatabaseConnection() {
        $conn = $this->dbc;

        $conn->connect();

        $this->assertFalse($conn->Basics()->hasError(Error\ErrorCodes::CANT_CONNECT_MYSQLI_LINK));
    }

}
