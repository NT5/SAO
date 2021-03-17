<?php

namespace SAO\Modules\App;

use SAO\Modules\Extended\ExtendedExtended;

/**
 * Description of Carreras
 *
 * @author Mayte
 */
class Carreras extends ExtendedExtended {

    public function getListaCarreras() {
        $db = $this->Extended()->Database();
        $stmt = $db->prepare("SELECT Id_Carrera, Nombre FROM carreras");
        $stmt->execute();
        $result = $stmt->get_result();
        $list = [];
        while ($row = $result->fetch_assoc()) {
            $list[] = $row;
        }
        return $list;
    }

}
