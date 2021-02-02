<?php

namespace SAO\Modules\App\Users\Database;

use SAO\Modules\App\Users\UserEntry;

trait registerUser {

    /**
     * @return \SAO\Modules\Extended
     */
    public abstract function Extended();

    /**
     * 
     * @param int $id
     * @return UserEntry
     */
    public abstract function getUser($id);

    /**
     * 
     * @param string $username
     * @param string $password
     * @return UserEntry
     */
    public function registerUser(string $username, string $password) {
        $db = $this->Extended()->Database();

        $stmt = $db->prepare("INSERT INTO User_Entries (User_Name, User_Password) VALUES(?, MD5(?))");
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();

        if ($stmt->errno) {
            return null;
        } else {
            $id = $db->getLastId();
            return $this->getUser($id);
        }
    }

}
