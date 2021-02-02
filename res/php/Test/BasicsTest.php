<?php

namespace SAO\Test;

use SAO\Modules;
use SAO\Modules\Basics\Error;
use SAO\Modules\Basics\Warning;
use SAO\Modules\Basics\Logger;
use PHPUnit\Framework\TestCase;

class BasicsTest extends TestCase {

    public function testBasicsCreation() {
        $Basics = new Modules\Basics();

        $this->assertInstanceOf(Error\ThrowableError::class, $Basics);
        $this->assertInstanceOf(Warning\ThrowableWarning::class, $Basics);
        $this->assertInstanceOf(Logger\Loggeable::class, $Basics);
    }

}
