<?php

namespace SAO\Application\Web\Pages;

use SAO\Modules\Extended;
use SAO\Modules\WebPage\Page;
use SAO\Modules\App\Users;

/**
 * Description of UserTest
 *
 * @author Hendell
 */
class UserTest extends Page {

    /**
     *
     * @var Users
     */
    private $Users;

    /**
     * 
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended, "User test", "pages/usertest.twig");

        $this->Users = new Users($this->Extended());
        $this->initVars();
    }

    public function initVars() {
        $u = $this->getUsers();

        $this->setVar('sao.page.title', 'User test');
        $this->setVar('sao.debug.user', $u->getUser(1));
    }

    /**
     * 
     * @return User
     */
    private function getUsers() {
        return $this->Users;
    }

}
