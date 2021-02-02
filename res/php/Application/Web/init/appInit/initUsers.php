<?php

namespace SAO\Application\Web\init\appInit;

use SAO\Modules\Extended;
use SAO\Modules\App\Users;

/**
 * 
 */
trait initUsers {

    /**
     *
     * @var Users 
     */
    private $Users;

    /**
     * 
     * @return Users
     */
    public abstract function getUsers();

    /**
     * 
     * @return Extended
     */
    public abstract function getExtended();

    /**
     * 
     */
    public function initUsers() {
        $Ex = $this->getExtended();
        $this->Users = new Users($Ex);
    }

}
