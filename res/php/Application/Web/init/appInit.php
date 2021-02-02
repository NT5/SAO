<?php

namespace SAO\Application\Web\init;

use SAO\Application\Web\init\appInit;

/**
 * 
 */
trait appInit {

    use appInit\initUsers;

    /**
     * 
     */
    public function appInit() {
        $this->initUsers();
    }

}
