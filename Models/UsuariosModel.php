<?php

class UsuarioModel
{
    private $db;
    private $usuario;

    public function __construct()
    {
        $this->db = Conectar::conexion();
        $this->usuario = array();
    }

    public function validarUsuario($correo, $contrasena)
    {
        $contrasena = md5($contrasena);

        $query = "SELECT * FROM usuarios inner join roles on usuarios.idRol = roles.idRol WHERE CorreoE = '$correo' AND Contraseña = '$contrasena'";
        $resultado = mysqli_query($this->db, $query);

        if (mysqli_num_rows($resultado) > 0) {
            return mysqli_fetch_array($resultado);
        }

        return false;
    }
}
