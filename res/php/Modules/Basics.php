<?php

namespace SAO\Modules;

use SAO\Modules\Basics;
use SAO\Modules\Basics\Logger;
use SAO\Modules\Basics\Warning;
use SAO\Modules\Basics\Error;

/**
 * @todo Documentacion
 */
class Basics implements Logger\Loggeable, Error\ThrowableError, Warning\ThrowableWarning {

    use Basics\BasicsTrait;
}
