<?php
class Control_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function log_in($usu,$pwd)
    {
        $this->db->where("usuario",$usu);//se compara en la tabla usuarios que exista el usuario que se digito
        $this->db->where("clave",$pwd);//se compara que conincida la clave con el usuario que se digito
        
        $resultado = $this->db->get("usuario");//se obtienen los valores del usuario y contraseña digitado si existen

        if($resultado->num_rows()>0)//compara que la consulta devuelva un registro para poder cargar las variables de sesion
        {
            return $resultado->row();//me devuelve los datos del usuario
        }
        else
        {
            return false;//niega el acceso
        }
    }

    //---------------------------------------------------------FUNCIONES DEL MODULO DE EMPRESA---------------------------------------------------------
    function multiple_insert($empre, $usempre)
    {
        $this->db->insert('usuario', $usempre); //se hace el insert a la tabla usuarios de los parametros recibidos en el array del controlador
        $usu_id = $this->db->insert_id(); //se almacena temporalmente el id del usuario para asignarlo a la empresa

        $empre['idusr'] = $usu_id; //se toma el id del usuario asociandolo a la empresa
        $this->db->insert('empresa', $empre); //se insertan los parametros del controlador a la tabla empresa
        return $insert_id = $this->db->insert_id(); //se asocian los id para asignarlo a la empresa
    }

    function countCateg()
    {
        //funcion para obtener el total de registros de categorias de perfiles
        $this->db->select();
        $this->db->from('categoria');
        $q = $this->db->get();
        return $q->num_rows();
    }

    function pagCateg($pag_size, $offset)
    {
        //funcion para mostrar las categorias registradas y delimitar la paginacion
        $this->db->select();
        $this->db->from('categoria');
        $this->db->limit($pag_size, $offset);
        $q = $this->db->get()->result();
        return $q;
    }

    function getCategoria()
    {
        //obtener el listado de las categorias registradas
        return $this->db->query("SELECT * 
                                    FROM categoria")->result_array();
    }

    function getPerfiles(int $id)
    {
        //obtener el listado de las categorias registradas
        return $this->db->query("SELECT * 
                                    FROM candidato as C
                                    INNER JOIN academico  AS A ON C.idcandidato = A.idcandidato
                                    INNER JOIN carrera AS CR ON A.idcarrera = CR.idcarrera
                                    WHERE C.idcategoria = $id")->result();
    }

    function getCompPerfiles(int $id)
    {
        return $this->db->query("SELECT *
                                    FROM categoria WHERE idcategoria = $id")->row();
    }

    function perfilCand(int $idCnd)
    {
        return $this->db->query("SELECT * 
                                    FROM candidato as cn
                                    LEFT JOIN repositorio AS rep ON cn.idcandidato = rep.idcandidato
                                    INNER JOIN academico AS ac ON cn.idcandidato = ac.idcandidato
                                    INNER JOIN carrera AS cr ON ac.idcarrera = cr.idcarrera
                                    INNER JOIN facultad AS fc ON cr.idfacultad = fc.idfacultad
                                    INNER JOIN universidad AS un ON fc.iduniv = un.iduniv
                                    INNER JOIN categoria AS cat ON cn.idcategoria = cat.idcategoria
                                    WHERE cn.idcandidato = $idCnd")->row();
    }

    function vacantesEmp(int $idemp)
    {
    return $this->db->query("SELECT *
                                FROM vacante WHERE idempresa = $idemp")->result();
    }

    function vacante(int $idvac)
    {
    return $this->db->query("SELECT n_vacante
                                FROM vacante WHERE idvacante = $idvac")->row();
    }

    function postulante(int $idVac)
    {
        return $this->db->query("SELECT *
                                    FROM postulacion AS po
                                    INNER JOIN candidato AS ca ON po.idcandidato = ca.idcandidato
                                    INNER JOIN categoria AS ct ON ca.idcategoria = ct.idcategoria
                                    WHERE po.idvacante =$idVac")->result();
    }

    function upd_revision(int $idVacante,int $idCandi)
    {
        return $this->db->query("UPDATE postulacion
                                    SET revision = 1 WHERE idvacante= $idVacante AND idcandidato = $idCandi");
    }

    function upd_final(int $idVacante,int $idCandi)
    {
        return $this->db->query("UPDATE postulacion
                                    SET entrevista = 1 WHERE idvacante= $idVacante AND idcandidato = $idCandi");
    }

    function upd_PerfilEmp(int $idEmp,int $tel,$correo)
    {
        return $this->db->query("UPDATE empresa 
                                    SET telefono = '$tel', correo_emp = '$correo'
                                    WHERE idempresa = $idEmp");
    }

    function upd_telEmp(int $idEmp,int $tel)
    {
        return $this->db->query("UPDATE empresa 
                                    SET telefono = '$tel'
                                    WHERE idempresa = $idEmp");
    }

    function upd_correoEmp(int $idEmp,$correo)
    {
        return $this->db->query("UPDATE empresa 
                                    SET correo_emp = '$correo'
                                    WHERE idempresa = $idEmp");
    }

    function del_vacante(int $id)
    {
        //ELIMINAR REGISTRO DE USUARIO
        $this->db->query("DELETE FROM postulacion
                                    WHERE idvacante = {$id}");
        
        return $this->db->query("DELETE FROM vacante 
                                    WHERE idvacante = {$id}");
    }
    //---------------------------------------------------------FUNCIONES DEL MODULO DE CANDIDATOS O EGRESADOS---------------------------------------------------------
    function countEmp()
    {
        //funcion para obtener el total de registros de empresas
        $this->db->select();
        $this->db->from('empresa');
        $q = $this->db->get();
        return $q->num_rows();
    }

    function pagEmp($pag_size, $offset)
    {
        //funcion para mostrar las empresas registradas y delimitar la paginacion
        $this->db->select();
        $this->db->from('empresa');
        $this->db->limit($pag_size, $offset);
        $q = $this->db->get()->result();
        return $q;
    }

    function getUniv()
    {
        //obtener el listado de las universidades registradas
        return $this->db->query("SELECT * 
                                    FROM universidad")->result_array();
    }

    function ft_facultad($iduniv)
    {
        $this->db->where('iduniv', $iduniv); //seleccionar facultad segun universidad
        $this->db->order_by('n_facultad', 'ASC'); //ordenar listado segun el nombre
        $query = $this->db->get('facultad'); //ejecutar la consulta para obtener los valores de las tablas
        $output = '<option value="">Selecciona tu facultad</option>'; //asignar el primer valor del dropdown list
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->idfacultad . '">' . $row->n_facultad . '</option>'; //listar los valores obtenidos de la tabla
        }
        return $output;
    }

    function ft_carrera($idfacultad)
    {
        $this->db->where('idfacultad', $idfacultad);
        $this->db->order_by('n_carrera', 'ASC');
        $query = $this->db->get('carrera');
        $output = '<option value="">Selecciona tu carrera</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->idcarrera . '">' . $row->n_carrera . '</option>';
        }
        return $output;
    }

    function insert_candidato($candi, $uscandi, $academico, $reposi)
    {
        $this->db->insert('usuario', $uscandi); //se hace el insert a la tabla usuarios de los parametros recibidos en el array del controlador
        $usu_id = $this->db->insert_id(); //se almacena temporalmente el id del usuario para asignarlo a la empresa

        $candi['idusr'] = $usu_id; //se toma el id del usuario asociandolo a la empresa
        $this->db->insert('candidato', $candi); //se insertan los parametros del controlador a la tabla empresa
        $can_id = $this->db->insert_id();

        $academico['idcandidato'] = $can_id;
        $this->db->insert('academico', $academico);

        $reposi['idcandidato'] = $can_id;
        $this->db->insert('repositorio', $reposi);

        return $usu_id;
    }

    function getIdEmpresa(int $id)
    {
        //se ejecuta la consulta a la base de datos para poder devolver el id del candidato segun el usuario que esta en sesion
        $q = $this->db->query("SELECT idempresa
                                    FROM empresa as e
                                    INNER JOIN usuario as u On e.idusr = u.idusr
                                    WHERE e.idusr = $id")->row();
        
        return $q; //retorna el resultado de la ejecucion de la consulta
    }

    function getEmpresa(int $idEmp)
    {
        $q = $this->db->query("SELECT * FROM empresa WHERE idusr = $idEmp")->row();
        return $q;
    }

    function getVacante(int $id)
    {
        //obtener el listado de las categorias registradas
        return $this->db->query("  SELECT *
                                    FROM vacante AS v
                                    INNER JOIN empresa AS emp ON v.idempresa = emp.idempresa 
                                    INNER JOIN categoria as cat ON v.idcategoria = cat.idcategoria
                                    where v.idempresa = $id")->result();
    }

    function getCompVacante(int $id)
    {
        return $this->db->query("SELECT *
                                    FROM empresa WHERE idempresa = $id")->row();
    }

    function getPublicVacante()
    {
        //obtener el listado de las categorias registradas
        return $this->db->query("  SELECT *
                                    FROM vacante AS v
                                    INNER JOIN empresa AS emp ON v.idempresa = emp.idempresa 
                                    INNER JOIN categoria as cat ON v.idcategoria = cat.idcategoria")->result();
    }

    function insert_Postu($postulacion)
    {
        //ELIMINAR REGISTRO DE USUARIO
        return $this->db->insert('postulacion',$postulacion);
    }

    function getPostulacion(int $idCnd)
    {
        return $this->db->query("SELECT * FROM postulacion AS pos
                                    INNER JOIN vacante AS vac ON pos.idvacante = vac.idvacante
                                    INNER JOIN empresa AS emp ON vac.idempresa = emp.idempresa
                                    WHERE idcandidato = $idCnd ")->result();
    }

    function getProceso(int $usuario)
    {
        //se ejecuta la consulta a la base de datos para poder devolver el id del candidato segun el usuario que esta en sesion
        $q = $this->db->query("SELECT idcandidato
                                    FROM candidato as c 
                                    INNER JOIN usuario as u On c.idusr = u.idusr
                                    WHERE c.idusr = $usuario")->row();
        
        return $q; //retorna el resultado de la ejecucion de la consulta
    }

    function upd_foto(int $idCand, $rutaFoto)
    {
        //ACTUALIZAR LOS DATOS DE UN USUARIO
        return $this->db->query("UPDATE candidato
                                    SET foto_cnd= '$rutaFoto' WHERE idcandidato = $idCand");
    }

    function upd_perfil(int $idCnd,int $tel,$correo, $ciclo)
    {
        return $this->db->query(" UPDATE candidato as c 
                                INNER JOIN academico AS a ON c.idcandidato = a.idcandidato
                                SET c.c_telefono = '$tel', c.correo = '$correo', a.ciclo = '$ciclo' 
                                WHERE c.idcandidato = $idCnd");
    }

    function upd_correo_tel_Cnd(int $idCnd,$correo,int $tel)
    {
        return $this->db->query("UPDATE candidato as c 
                                SET c.correo = '$correo', c.c_telefono = '$tel' 
                                WHERE c.idcandidato = $idCnd");
    }

    function upd_correo_ciclo_Cnd(int $idCnd, $correo, $ciclo)
    {
        return $this->db->query("UPDATE candidato as c 
                                INNER JOIN academico AS a ON c.idcandidato = a.idcandidato
                                SET c.correo = '$correo', a.ciclo = '$ciclo' 
                                WHERE c.idcandidato = $idCnd");
    }

    function upd_correoCnd(int $idCnd,$correo)
    {
        return $this->db->query("UPDATE candidato as c 
                                SET c.correo = '$correo' 
                                WHERE c.idcandidato = $idCnd");
    }

    function upd_tel_ciclo_Cnd(int $idCnd,int $tel, $ciclo)
    {
        return $this->db->query("UPDATE candidato as c 
                                INNER JOIN academico AS a ON c.idcandidato = a.idcandidato
                                SET c.c_telefono = '$tel', a.ciclo = '$ciclo' 
                                WHERE c.idcandidato = $idCnd");
    }

    function upd_telCnd(int $idCnd,int $tel)
    {
        return $this->db->query("UPDATE candidato as c 
                                SET c.c_telefono = '$tel' 
                                WHERE c.idcandidato = $idCnd");
    }

    function upd_cicloCnd(int $idCnd, $ciclo)
    {
        return $this->db->query("UPDATE academico as a
                                SET a.ciclo = '$ciclo' 
                                WHERE a.idcandidato = $idCnd");
    }

    function repCand(int $idCnd)
    {
    return $this->db->query("SELECT *
                                FROM repositorio WHERE idcandidato = $idCnd")->result();
    }

    function del_repo(int $id)
    {
        //ELIMINAR REGISTRO DE USUARIO
        return $this->db->query("DELETE FROM repositorio 
                                    WHERE idrepositorio = {$id}");
    }
}
