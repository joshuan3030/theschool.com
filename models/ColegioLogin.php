<?php   
class ColegioLogin extends Conectar
{       

    public function guardarCredenciales($usuario, $contrasena)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO `colegios-login` (`usuario`,`contrasena`) VALUES ('" . $usuario . "','" . $contrasena . "')";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizarColegio($idUsuario, $nombre_institucion, $nit, $tel, $correo, $ubicacion, $introduccion, $especialidades, $convenios, $exigencias, $requisitos, $inf_economia, $inf_deportiva, $ciudad, $calendario, $caracter, $horarios, $nivel, $img_principal, $img_secundarias_1, $img_secundarias_2, $img_secundarias_3, $img_secundarias_4)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE `colegios-login` SET `nombre_colegio` = '$nombre_institucion', `nit` = '$nit', `tel` = '$tel', `correo` = '$correo', `inf_ubicacion` = '$ubicacion', `introduccion` = '$introduccion', `inf_especialidades` = '$especialidades',`ciudad` = '$ciudad', `calendario` = '$calendario', `caracter` = '$caracter' , `horarios` = '$horarios', `nivel` = '$nivel', `inf_convenios` = '$convenios', `inf_exigencias` = '$exigencias', `inf_requisitos` = '$requisitos' , `inf_economia` = '$inf_economia', `inf_deporte` = '$inf_deportiva',`img_principal` = '$img_principal',`img_secundarias_1` = '$img_secundarias_1',`img_secundarias_2` = '$img_secundarias_2',`img_secundarias_3` = '$img_secundarias_3',`img_secundarias_4` = '$img_secundarias_4' WHERE `colegios-login`.`id` = '$idUsuario'; ('" . $nombre_institucion . "','" . $nit . "','" . $tel . "','" . $correo . "','" . $ubicacion . "','" . $introduccion . "','" . $especialidades . "','" . $convenios . "','" . $exigencias . "','" . $requisitos . "','" . $inf_economia . "','" . $inf_deportiva . "','" . $img_principal . "','" . $img_secundarias_1 . "','" . $img_secundarias_2 . "','" . $img_secundarias_3 . "','" . $img_secundarias_4 . "')";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function verificarLogin($usuario, $contrasena)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM `colegios-login` WHERE usuario='" . $usuario . "' AND `contrasena`='" . $contrasena . "';";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerTodosColegios()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT `id`,`nombre_colegio`,`tel`,`correo`,`inf_ubicacion`,`introduccion`,`img_principal`,`img_secundarias_1`,`img_secundarias_2`,`img_secundarias_3`,`img_secundarias_4` FROM `colegios-login`;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function encontrarColegioPorId($idColegio)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT `id`,`nombre_colegio`,`tel`,`correo`,`inf_ubicacion`,`introduccion`,`ciudad`,`caracter`,`calendario`,`horarios`,`nivel`,`inf_especialidades`,`inf_convenios`,`inf_exigencias`,`inf_requisitos`,`inf_deporte`,`nivel`,`nit`,`inf_economia`,`img_principal`,`img_secundarias_1`,`img_secundarias_2`,`img_secundarias_3`,`img_secundarias_4` FROM `colegios-login`  WHERE id='" . $idColegio . "';";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function filtrarColegios($ciudad, $caracter, $calendario, $horario, $nivel)
    {

        $conectar = parent::conexion();
        parent::set_names();

        $filtro = "";
        if ($ciudad != "-") {
            $filtro = " ciudad='" . $ciudad . "' ";
        }
        if ($caracter != "privado-publico") {
            if ($filtro != "") {
                $filtro .= "  and  ";
            }
            $filtro = $filtro . " caracter='" . $caracter . "' ";
        }

        if ($calendario != "a-b") {
            if ($filtro != "") {
                $filtro .= "  and  ";
            }
            $filtro = $filtro . " calendario like '%" . $calendario . "%' ";
        }

        if ($horario != "mañana-tarde") {
            if ($filtro != "") {
                $filtro .= "  and  ";
            }
            $filtro = $filtro . " horarios like '%" . $horario . "%' ";
        }

        if ($nivel != "primaria-secundaria") {
            if ($filtro != "") {
                $filtro .= "  and  ";
            }
            $filtro = $filtro . " nivel like '%" . $nivel . "%' ";
        }

        if ($filtro != "") {
            $filtro = " WHERE " . $filtro;
        }

        $sql = "SELECT `id`,`nombre_colegio`,`tel`,`correo`,`inf_ubicacion`,`introduccion`,`ciudad`,`caracter`,`calendario`,`horarios`,`nivel`,`img_principal`,`img_secundarias_1`,`img_secundarias_2`,`img_secundarias_3`,`img_secundarias_4` FROM `colegios-login` " . $filtro;
        $sql;
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
