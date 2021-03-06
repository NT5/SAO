<?php

namespace SAO\Application\Api\Areas\User;

use SAO\Modules\Extended;
use SAO\Application\Api\Area;
use SAO\Modules\App\Users;

/**
 * 
 */
class checkUser extends Area {

    /**
     *
     * @var Users
     */
    private $Users;

    /**
     *
     * @var boolean
     */
    private $UserExist = false;

    /**
     *
     * @var string
     */
    private $UserName;

    /**
     * 
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended);
    }

    public function setUp() {
        $this->Users = new Users($this->Extended());
    }

    public function CheckPost() {
        $u = $this->Users;

        $post_user = filter_input(INPUT_POST, 'name');
        if ($post_user) {
            $this->UserName = $post_user;
            $this->UserExist = $u->userNameExist($this->UserName);
        } else {
            $this->UserName = "No name variable";
        }
    }

    public function initVars() {
        $this->setVars([
            'user.name' => $this->UserName,
            'user.exist' => $this->UserExist
        ]);
    }

}
