<?php

namespace SAO\Modules\App\Users\Database;

use SAO\Modules\App\Users\UserEntry;
use SAO\Modules\Util\Functions;

/**
 * 
 */
trait getUser {

    /**
     * @return \SAO\Modules\Extended
     */
    public abstract function Extended();

    /**
     * 
     * @param int $id
     * @return UserEntry
     */
    public function getUser($id) {

        $db = $this->Extended()->Database();

        $user_id = NULL;
        $user_type = NULL;
        $user_name = NULL;
        $user_createat = NULL;

        $stmt = $db->prepare("SELECT User_Id, User_Type, User_Name, Create_at FROM User_Entries WHERE User_Id = ?");

        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->bind_result($user_id, $user_type, $user_name, $user_createat);
        $stmt->store_result();
        $stmt->fetch();
        $stmt->free_result();
        $stmt->close();

        if (!Functions::mis_null($user_id, $user_type, $user_name, $user_createat)) {
            return new UserEntry($user_id, $user_type, $user_name, $user_createat);
        }

        return NULL;
    }

}
