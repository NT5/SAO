<?php

namespace SAO\Modules\App;

use SAO\Modules\Extended\ExtendedExtended;

/**
 * Description of Asignaturas
 *
 * @author Mayte
 */
class Asignaturas extends ExtendedExtended {
    
    public function getListaAsignaturas() {
        $db = $this->Extended()->Database();
        $stmt = $db->prepare("SELECT Id_Asignatura, Nombre, Cod_Interno FROM asignaturas");
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
