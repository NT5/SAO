<?php

namespace SAO\Modules\App;

use SAO\Modules\Extended\ExtendedExtended;

class Municipios extends ExtendedExtended {

    public function getListaMunicipios() {
        $db = $this->Extended()->Database();
        $stmt = $db->prepare("SELECT Id_Ped, Nombre FROM peds");
        $stmt->execute();
        $result = $stmt->get_result();
        $list = [];
        while ($row = $result->fetch_assoc()) {
            $list[] = $row;
        }
        return $list;
    }

    //put your code here
}
