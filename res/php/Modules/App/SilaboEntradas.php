<?php

namespace SAO\Modules\App;

use SAO\Modules\Extended\ExtendedExtended;

class SilaboEntradas extends ExtendedExtended {

    public function agregarEntrada(
            $IdPed,
            $IdCarrera,
            $IdAsignatura,
            $CodGrupo,
            $CodAsignatura,
            $AnioCarrera,
            $HorasCalse,
            $HorasPrecenciales,
            $HorasIndependientes,
            $Modalidad,
            $Trimestre,
            $TipoEvaluacion,
            $AnioLectivo,
            $Facilitador
    ) {
        // Aqui se guardaa la conexion de la base de datos
        $db = $this->Extended()->Database();
        $sql = "INSERT INTO silabo_entradas
	(Id_Ped, Id_Carrera, Id_Asignatura, CodigoGrupo, CodAsignatura, AnioCarrera, HorasClase, HorasPrecenciales, HorasIndependientes, Modalidad, Trimestre, TipoEvaluacion, AnioLectivo, Facilitador)
	VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $prodecimento = $db->prepare($sql);
        $prodecimento->bind_param("iiissiiiisisss",
                $IdPed,
                $IdCarrera,
                $IdAsignatura,
                $CodGrupo,
                $CodAsignatura,
                $AnioCarrera,
                $HorasCalse,
                $HorasPrecenciales,
                $HorasIndependientes,
                $Modalidad,
                $Trimestre,
                $TipoEvaluacion,
                $AnioLectivo,
                $Facilitador
        );
        $prodecimento->execute();
        if ($prodecimento->errno) {
            var_dump($prodecimento);
            return false;
        } else {
            return true;
        }
    }

    public function obtenerSilabo(int $id) {
        $db = $this->Extended()->Database();
        $sql = "SELECT 
se.*, 
car.Nombre AS nombreCarrera,
asi.Nombre AS nombreAsignatura,
pd.Nombre AS nombrePed
FROM silabo_entradas AS se 
INNER JOIN carreras AS car ON se.Id_Carrera = car.Id_Carrera
INNER JOIN asignaturas AS asi ON se.Id_Asignatura = asi.Id_Asignatura 
INNER JOIN peds AS pd ON se.Id_Ped = pd.Id_Ped
where se.Id_Silabo = $id";

        $prodecimento = $db->query($sql);
        $datos = $prodecimento->fetch_assoc();
        return $datos;
    }

    public function obtenerListaDeSilabos() {
        $db = $this->Extended()->Database();

        $sql = "SELECT 
            se.*,
            asig.Nombre AS nombreAsignatura
            FROM silabo_entradas AS se 
            INNER JOIN asignaturas AS asig
            ON se.Id_Asignatura = asig.Id_Asignatura";

        $prodecimento = $db->query($sql);
        $datos = $prodecimento->fetch_all(MYSQLI_ASSOC);
        return $datos;
    }

    public function agregarDatosSilabo(
            int $id_silabo,
            int $n_encuentro,
            string $fecha_encuentro,
            string $unidad,
            string $objetivos_unidad,
            string $contenidos_tematicos,
            string $formas_ensenanzas,
            string $metodologias,
            int $h_precenciales,
            int $h_estudio_independiente,
            string $evaluacion,
            string $observaciones
    ) {
        $db = $this->Extended()->Database();

        $sql = "INSERT INTO silabo_datos 
	(
            id_silabo, 
            n_encuentro, 
            fecha_encuentro, 
            unidad, 
            objetivos_unidad, 
            contenidos_tematicos, 
            formas_ensenanzas, 
            metodologias, 
            h_precenciales, 
            h_estudio_independiente, 
            evaluacion, 
            observaciones
        ) 
	VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $prodecimento = $db->prepare($sql);
        $prodecimento->bind_param(
                "iissssssiiss",
                $id_silabo,
                $n_encuentro,
                $fecha_encuentro,
                $unidad,
                $objetivos_unidad,
                $contenidos_tematicos,
                $formas_ensenanzas,
                $metodologias,
                $h_precenciales,
                $h_estudio_independiente,
                $evaluacion,
                $observaciones
        );
        $prodecimento->execute();
        if ($prodecimento->errno) {
            var_dump($prodecimento);
            return false;
        } else {
            return true;
        }
    }

    public function obtenerDatosSilabo(int $id_silabo) {
        $db = $this->Extended()->Database();
        $sql = "SELECT * FROM silabo_datos WHERE id_silabo = $id_silabo";

        $prodecimento = $db->query($sql);
        $datos = $prodecimento->fetch_all(MYSQLI_ASSOC);
        return $datos;
    }

}
