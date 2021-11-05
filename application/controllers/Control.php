<?php


class Control extends CI_Controller
{
    //FUNCION PARA CARGAR LA VISTA PRINCIPAL (HOME PAGE)
    public function index()
    {
        $this->load->view('index');
    }

    //FUNCION PARA DAR ACCESO AL SISTEMA Y ESTABLECER VARIABLES DE SESION
    public function Login($usuario = null, $clave = null)
    {
        $this->load->model('Control_model'); //SE INSTANCIA EL MODELO

        //SE OBTIENEN LOS VALORES ESCRITOS POR EL USUARIO
        $usuario = $this->input->POST('usuario');
        $clave = md5($this->input->POST('clave'));

        //SE INSTANCIA LA FUNCION DEL MODELO PARA COMPARAR SI EXISTE EL USUARIO
        $res = $this->Control_model->log_in($usuario, $clave);

        //VALIDANDO EL ACCESO
        if ($res) {
            
            //ARREGLO PARA AGRUPAR Y SETEAR LAS VARIABLES DE SESION
            $data = array(
                'idusr' => $res->idusr,
                'usuario' => $res->usuario,
                'idtipo' => $res->idtipo,
                'login' => TRUE
            );

            //SE ESTABLECEN LAS VARIABLES DE SESION
            $this->session->set_userdata($data);
            redirect(base_url(''));
        }

        //REDIRECCIONA AL HOME SI SE VALIDAN LAS CREDENCIALES DE LO CONTRARIO LO MANTIENE EN EL LOGIN
        if ($this->session->userdata('login')) {
            redirect(base_url(''));
        }
        $this->load->view('Login');
    }

    //FUNCION PARA CERRAR Y DESTRUIR LA SESION ACTIVADA
    public function Log_out()
    {
        //SE DESTRUYE LA SESION Y REDIRECCIONA AL HOME
        $this->session->sess_destroy();
        redirect(base_url(''));
    }

    //-------------------------------------------------------FUNCIONES PARA EL MODULO  DE CANDIDATOS EGRESADOS-------------------------------------------------------//

    //FUNCION PARA CARGAR LA VISTA DE CANDIDATO
    public function VistaCandidato($pag = 1)
    {
        $this->load->model('Control_model', 'Cmodel');//SE CARGA EL MODELO

        $pag--;//VARIABLE PARA LA PAGINACION SEGUN EL NUMERO DE REGISTROS

        if ($pag < 0) {
            $pag = 0;
        }

        $page_size = 10;
        $offset = $pag * $page_size;

        $data['VistaCandidato'] = $this->Cmodel->pagEmp($page_size, $offset);//SE CARGA LA FUNCION PARA VER LAS EMPRESAS REGISTRADAS
        $data['current_pag'] = $pag++;
        $data['last_page'] = ceil($this->Cmodel->countEmp() / $page_size);
        $this->load->view('VistaCandidato', $data);
    }

    public function RegCandidato()
    {
        $this->load->model('Control_model', 'Cmodel'); //se carga el modelo

        if (isset($_POST['regis'])) {

            $rutaCV = "";
            $rutaFoto = "no_photo.png";

            if (empty($_FILES['rutaCV']['name'])) {
                echo "<script type='text/javascript'>alert('Es necesario adjuntar tu hoja de vida (CV)');</script>";
            } else {
                $config['upload_path'] = "cvCandidatos/"; //variable de cofiguracion para direccionar la imagen a una carpeta
                $config['allowed_types'] = "pdf"; //variable de configuracion para delimitar el tipo de archivo
                $this->load->library('upload', $config); // se asignan las configuraciones a la libreria upload

                if ($this->upload->do_upload('rutaCV')) //valida que se haya carfado la imagen a la carpeta asignada
                {
                    $rutaCV =  $this->upload->data('file_name'); //si se carga la imagen se captura el nombre del archivo
                } else {
                    echo $this->upload->display_errors(); //si no se cargo la imagen a la carpeta se envia un mensaje de error 
                }
            }


            //ARREGLOS PARA DISTRIBUIR LOS DATOS SEGUN LAS TABLAS
            $userCndi_input = array();
            $candi_input = array();
            $academi_input = array();
            $reposi_input = array();

            //DATOS PARA LA TABLA USUARIO
            $userCndi_input['usuario'] = $this->input->POST('usuario');
            $userCndi_input['clave'] = md5($this->input->POST('pwd'));
            $userCndi_input['idtipo'] = 1;

            //DATOS PARA LA TABLA CANDIDATO
            $candi_input['nombre'] = $this->input->POST('nombre');
            $candi_input['apellido'] = $this->input->POST('apellido');
            $candi_input['nacimiento'] = $this->input->POST('nacimiento');
            $candi_input['c_telefono'] = $this->input->POST('telef');
            $candi_input['correo'] = $this->input->POST('correo');
            $candi_input['pdf_cv'] = $rutaCV;
            $candi_input['idcategoria'] = $this->input->POST('categ');
            $candi_input['foto_cnd'] = $rutaFoto;

            //DATOS PARA LA TABLA ACADEMICO
            $academi_input['idcarrera'] = $this->input->POST('carrera');
            $academi_input['ingreso'] = $this->input->POST('ingre');
            $academi_input['ciclo'] = $this->input->POST('ciclo');

            //DATOS DE REPOSITORIO
            $reposi_input['enlace'] = $this->input->POST('enlace');
            $reposi_input['rep_descrip'] = $this->input->POST('descrip');


            $cor = $this->db->query('SELECT * FROM candidato WHERE correo = ?', $_POST['correo'])->result_array(); //consulta para verificar si existe el correo de la empresa registrado
            $usu = $this->db->query('SELECT * FROM usuario WHERE usuario = ?', $_POST['usuario'])->result_array(); //consulta para verificar si existe un usuario con el mismo nombre

            if (empty($cor)) {
                if (empty($usu)) {

                    if ($this->input->POST('pwd') == $this->input->POST('cpwd')) {
                        //SE CARGA LA FUNCION multiple_insert ESTABLECIDA EN EL MODELO PARA LA INSERCION A LA BASE DE DATOS
                        $checking_insert = $this->Cmodel->insert_candidato($candi_input, $userCndi_input, $academi_input, $reposi_input);
                        json_encode($checking_insert);
                        //VALIDACION PARA CONFIRMAR QUE LA CONSULTA DE INSERT SE EJECUTA y GUARDA LOS DATOS EN LA BDO
                        if ($checking_insert > 0) {
                            $this->session->set_flashdata('msj_cnd', 'Cuenta registrada con exito');
                            redirect("Control/RegCandidato", "refresh");
                        } else {
                            $this->session->set_flashdata('msj_cnd', 'No fue posible registrar tu cuenta');
                            redirect("Control/RegCandidato", "refresh");
                        }
                    } else {
                        $this->session->set_flashdata('msj_cnd', 'Asegurese que las contraseñas coincidan.');
                    }
                } else {
                    $this->session->set_flashdata('msj_cnd', 'El nombre de usuario que intenta registrar ya esta siendo ocupado.');
                }
            } else {
                $this->session->set_flashdata('msj_cnd', 'Ya exite una cuenta asociada con el correo que intenta registrar.');
            }
        }
        $dt['getCategoria'] = $this->Cmodel->getCategoria();
        $dt['getUniv'] = $this->Cmodel->getUniv();
        $this->load->view('RegCandidato', $dt);
    }

    function ft_facultad() //funcion para obtener el listado de facultades segun la universidad seleccionada
    {
        $this->load->model('Control_model', 'Cmodel'); //se carga el modelo
        if ($this->input->post('iduniv')) {
            echo $this->Cmodel->ft_facultad($this->input->post('iduniv')); //se obtiene iduniv para mostrar las facultades que posee la universidad seleccinada
        }
    }

    function ft_carrera() //funcion para obtener el listado de carreras segun la facultad seleccionada
    {
        $this->load->model('Control_model', 'Cmodel'); //se carga el modelo
        if ($this->input->post('idfacultad')) {
            echo $this->Cmodel->ft_carrera($this->input->post('idfacultad')); //se obtiene idfacultad para mostrar las carreras que posee la facultad seleccionada
        }
    }

    public function PublicacionesV()
    {
        if ($this->session->userdata('idtipo') == 2) {
            redirect('Control');
        }
        $this->load->model('Control_model', 'Cmodel'); //se carga el modelo
        $dt['getPublicVacante'] = $this->Cmodel->getPublicVacante();

        $this->load->view('PublicacionesV', $dt);
    }

    public function Vacantes($id = null)
    {
        $this->load->model('Control_model', 'Cmodel'); //se carga el modelo
        if ($id !== null) {
            $id = $this->db->escape((int)$id);
            $dt['getVacante'] = $this->Cmodel->getVacante($id);
            $dt['getCompVacante'] = $this->Cmodel->getCompVacante($id);
            $this->load->view('Vacantes', $dt);
        }
    }

    public function insert_postulacion(int $idVac, int $idEmp)
    {
        $this->load->model('Control_model', 'Cmodel'); //se carga el modelo para poder usar las funciones 

        $usuario = $this->session->userdata('idusr'); //se obtiene el id del usuario en sesion
        $idCnd = $this->Cmodel->getProceso($usuario); //se obtiene el id del candidato segun el usuario en sesion

        //arreglo para la insercion de datos
        $postulacion = array();

        //variables para insertar los datos
        $postulacion['idvacante'] = $idVac;
        $postulacion['idcandidato'] = $idCnd->idcandidato;
        $postulacion['postular'] = 1;

        //consulta para saber si ya existe una postulacion en dicha vacante
        $qVerificacion = $this->db->query('SELECT * FROM postulacion WHERE idcandidato = ? AND idvacante = ?', array($idCnd->idcandidato, $idVac))->result_array();

        //si no existe ningun registro, se procede a ejecutar la postulacion
        if (empty($qVerificacion)) {
            if ($this->Cmodel->insert_Postu($postulacion)) {
                $this->session->set_flashdata("MSJ_POSTU", "SE REGISTRO CORRECTAMENTE A LA VACANTE");
                redirect('Control/PublicacionesV');
            }
        }
        //si existe ya un registro para esa vacante el candidato logeado no se permite volver a inscribir
        else {
            $this->session->set_flashdata("MSJ_POSTU", "NO PUEDES REGISTRARTE DOS VECES A LA MISMA VACANTE");
            redirect('Control/PublicacionesV');
        }
    }


    public function ProgresoPostu()
    {

        if ($this->session->userdata('idtipo') == 1) {
            $this->load->model('Control_model', 'Cmodel'); //se carga el modelo
            $usuario = $this->session->userdata('idusr'); //se toma el valor del id del usuario para poder extraer el id del candidato 
            $idCnd = $this->Cmodel->getProceso($usuario); //se ejecuta la funcion que me devulve el id del candidato segun su id de usuario
            $dt['getPostulacion'] = $this->Cmodel->getPostulacion($idCnd->idcandidato); //carga las póstulaciones por candidato
            $this->load->view('ProgresoPostu', $dt);
        } else {
            redirect('Control');
        }
    }

    public function MiPerfil($idCnd = null)
    {
        if ($this->session->userdata('idtipo') == 1) {
            $this->load->model('Control_model', 'Cmodel'); //se carga el modelo
            $usuario = $this->session->userdata('idusr');
            $idCnd = $this->Cmodel->getProceso($usuario);

            if ($idCnd->idcandidato !== null) {
                $dt['perfilCand'] = $this->Cmodel->perfilCand($idCnd->idcandidato);
                $dt['repCand'] = $this->Cmodel->repCand($idCnd->idcandidato);
                $this->load->view('MiPerfil', $dt);
            } else {
                $this->load->view('MiPerfil');
            }
        } else {
            redirect('Control');
        }
    }

    public function Update_foto()
    {
        $this->load->model('Control_model', 'Cmodel'); //se carga el modelo
        $usuario = $this->session->userdata('idusr');
        $idCnd = $this->Cmodel->getProceso($usuario);

        $rutaFoto = "";

        //echo "<script type='text/javascript'>alert('$rutaFoto');</script>";

        if (empty($_FILES['rutaFoto']['name'])) {
            redirect('Control/MiPerfil');
        } else {
            $config['upload_path'] = "fotoCnd/"; //variable de cofiguracion para direccionar la imagen a una carpeta
            $config['allowed_types'] = "jpg|png|jpeg"; //variable de configuracion para delimitar el tipo de archivo
            $this->load->library('upload', $config); // se asignan las configuraciones a la libreria upload

            if ($this->upload->do_upload('rutaFoto')) //valida que se haya carfado la imagen a la carpeta asignada
            {
                $rutaFoto =  $this->upload->data('file_name'); //si se carga la imagen se captura el nombre del archivo
            } else {
                echo $this->upload->display_errors(); //si no se cargo la imagen a la carpeta se envia un mensaje de error 
            }
        }

        if (!empty($rutaFoto)) {
            if ($this->Cmodel->upd_foto($idCnd->idcandidato, $rutaFoto)) {
                $this->session->set_flashdata("MSJ_UPD_USR", "Datos actualizados correctamente");
                redirect('Control/MiPerfil');
            } else {
                $this->session->set_flashdata("MSJ_UPD_USR", "No se pudieron actualizar los datos");
            }
        }
    }

    public function Update_perfil()
    {
        $this->load->model('Control_model', 'Cmodel'); //se carga el modelo
        $usuario = $this->session->userdata('idusr');
        $idCnd = $this->Cmodel->getProceso($usuario);

        //valores que se actualizaran
        $input_correo = $this->input->post('correo');
        $input_tel = $this->input->post('telefono');
        $input_ciclo = $this->input->post('ciclo');

        if(!empty($input_correo)&& !empty($input_tel) && empty($input_ciclo))
        {
            $this->Cmodel->upd_correo_tel_Cnd($idCnd->idcandidato, $input_correo, $input_tel);
            echo "<script type='text/javascript'>alert('Su correo y telefono han sido actualizados correctamente'); 
                        window.location.assign('".base_url("index.php/Control/MiPerfil")."') 
                  </script>";
        } else if (!empty($input_correo) && empty($input_tel) && !empty($input_ciclo)) {

            $this->Cmodel->upd_correo_ciclo_Cnd($idCnd->idcandidato,$input_correo, $input_ciclo);
            echo "<script type='text/javascript'>alert('Su correo y ciclo han sido actualizados correcatamente'); 
                        window.location.assign('".base_url("index.php/Control/MiPerfil")."') 
                  </script>";
        } else if (!empty($input_correo) && empty($input_tel) && empty($input_ciclo)) {

            $this->Cmodel->upd_correoCnd($idCnd->idcandidato, $input_correo);
            echo "<script type='text/javascript'>alert('Su correo ha sido actualizado correctamente'); 
                        window.location.assign('".base_url("index.php/Control/MiPerfil")."') 
                  </script>";
        } else if (empty($input_correo) && !empty($input_tel) && !empty($input_ciclo)) {

            $this->Cmodel->upd_tel_ciclo_Cnd($idCnd->idcandidato, $input_tel, $input_ciclo);
            echo "<script type='text/javascript'>alert('Su telefono y ciclo han sido actualizados correctamente'); 
                        window.location.assign('".base_url("index.php/Control/MiPerfil")."') 
                  </script>";
        } else if (empty($input_correo) && !empty($input_tel) && empty($input_ciclo)) {

            $this->Cmodel->upd_telCnd($idCnd->idcandidato, $input_tel);
            echo "<script type='text/javascript'>alert('Su telefono ha sido actualizado correctamente'); 
                        window.location.assign('".base_url("index.php/Control/MiPerfil")."') 
                  </script>";
        } else if (empty($input_correo) && empty($input_tel) && !empty($input_ciclo)) {

            $this->Cmodel->upd_cicloCnd($idCnd->idcandidato,$input_ciclo);
            echo "<script type='text/javascript'>alert('Su ciclo ha sido actualizado correctamente'); 
                        window.location.assign('".base_url("index.php/Control/MiPerfil")."') 
                  </script>";
        } else if (!empty($input_correo) && !empty($input_tel) && !empty($input_ciclo)) {

            $this->Cmodel->upd_perfil($idCnd->idcandidato, $input_tel, $input_correo, $input_ciclo);
            echo "<script type='text/javascript'>alert('Sus datos han sido actualizados correctamente'); 
                        window.location.assign('".base_url("index.php/Control/MiPerfil")."') 
                  </script>";
        } 
        echo "<script type='text/javascript'>alert('No hay datos para actualizar'); 
                        window.location.assign('".base_url("index.php/Control/MiPerfil")."') 
                  </script>";
    }

    public function add_repositorio()
    {
        $this->load->model('Control_model', 'Cmodel'); //se carga el modelo
        $usuario = $this->session->userdata('idusr');
        $idCnd = $this->Cmodel->getProceso($usuario);

        $dt_repo = array();

        $dt_repo['idcandidato'] = $idCnd->idcandidato;
        $dt_repo['enlace'] = $this->input->POST('enlace');
        $dt_repo['rep_descrip'] = $this->input->POST('descripcion');

        $this->db->insert('repositorio', $dt_repo);

        redirect('Control/MiPerfil');
    }

    public function del_repositorio(int $id)
    {
        $this->load->model('Control_model', 'Cmodel');

        if ($this->Cmodel->del_repo($id)) {
            redirect('Control/MiPerfil');
        }
    }

    //-------------------------------------------------------FUNCIONES PARA EL MODULO  DE EMPRESA-------------------------------------------------------//
    public function VistaEmpresa($pag = 1)
    {
        $this->load->model('Control_model', 'cmodel');

        $pag--;

        if ($pag < 0) {
            $pag = 0;
        }

        $page_size = 10;
        $offset = $pag * $page_size;

        $data['VistaEmpresa'] = $this->cmodel->pagCateg($page_size, $offset);
        $data['current_pag'] = $pag++;
        $data['last_page'] = ceil($this->cmodel->countCateg() / $page_size);
        $this->load->view('VistaEmpresa', $data);
    }

    public function RegEmpresa()
    {
        $this->load->library('form_validation'); //cargar libreria para validar formularios

        if (isset($_POST['registrar'])) {
            //VALIDACION DE CAMPOS PARA CONFIRMACION DE CONTRASEÑA
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('representante', 'Representante', 'required');
            $this->form_validation->set_rules('telefono', 'Telefono', 'required');
            $this->form_validation->set_rules('correo_emp', 'Correo de la empresa', 'required');
            $this->form_validation->set_rules('usuario', 'Usuario', 'required');
            $this->form_validation->set_rules('clave', 'Clave', 'required|min_length[5]');
            $this->form_validation->set_rules('conf_clave', 'Confirmacion de clave', 'required|min_length[5]|matches[clave]');

            //CARGAR EL MODELO Y RENOMBRAR
            $this->load->model('Control_model', 'cmodel', true);

            //COMPROBAR SI CUMPLE LA VALIDACION
            if ($this->form_validation->run() == TRUE) {
                $foto = ""; //VARIABLE PARA GUARDAR IMAGEN

                //METODO PARA INSERTAR Y GUARDAR LA IMAGEN EN LA BASE DE DATOS
                if (empty($_FILES['rutaimg']['name'])) //['rutaimg'] = name del imput donde se carga la imagen
                {
                    //valida si existe un archivo cargado, si no lo hay se asigna el siguiente nombre que es una imagen predeterminada
                    $foto = "no-photo.png";
                } else {
                    $config['upload_path'] = "logEmpresa/"; //variable de cofiguracion para direccionar la imagen a una carpeta
                    $config['allowed_types'] = "png|jpg"; //variable de configuracion para delimitar el tipo de archivo
                    $this->load->library('upload', $config); // se asignan las configuraciones a la libreria upload

                    if ($this->upload->do_upload('rutaimg')) //valida que se haya carfado la imagen a la carpeta asignada
                    {
                        $foto =  $this->upload->data('file_name'); //si se carga la imagen se captura el nombre del archivo
                    } else {
                        echo $this->upload->display_errors(); //si no se cargo la imagen a la carpeta se envia un mensaje de error 
                    }
                }
                //DECLARACION DE ARREGLOS DISTRIBUIR LOS DATOS QUE SE INGRESARAN POR TABLA A LA BASE DE DATOS
                $usemp_input = array();
                $emp_input = array();

                //ESTABLECER LOS DATOS QUE SE INGRESARAN A LA TABLA USUARIO
                $usemp_input['usuario'] = $this->input->post('usuario');
                $usemp_input['clave'] = md5($this->input->post('clave'));
                $usemp_input['idtipo'] = 2; //ID ESTABLECIDO POR DEFECTO PARA TIPO DE USUARIO EMPRESA

                //ESTABLECER LOS DATOS QUE SE INGRESARAN A LA TABLA EMPRESA
                $emp_input['foto_emp'] = $foto;
                $emp_input['nombre'] = $this->input->post('nombre');
                $emp_input['representante'] = $this->input->post('representante');
                $emp_input['telefono'] = $this->input->post('telefono');
                $emp_input['correo_emp'] = $this->input->post('correo_emp');

                $cor = $this->db->query('SELECT * FROM empresa WHERE correo_emp = ?', $_POST['correo_emp'])->result_array(); //consulta para verificar si existe el correo de la empresa registrado
                $usu = $this->db->query('SELECT * FROM usuario WHERE usuario = ?', $_POST['usuario'])->result_array(); //consulta para verificar si existe un usuario con el mismo nombre

                if (empty($cor)) {
                    if (empty($usu)) {
                        //SE CARGA LA FUNCION multiple_insert ESTABLECIDA EN EL MODELO PARA LA INSERCION A LA BASE DE DATOS
                        $checking_insert = $this->cmodel->multiple_insert($emp_input, $usemp_input);

                        //VALIDACION PARA CONFIRMAR QUE LA CONSULTA DE INSERT SE EJECUTA y GUARDA LOS DATOS EN LA BDO
                        if ($checking_insert) {
                            $this->session->set_flashdata('MSJ', 'Cuenta registrada con exito');
                            redirect("Control/RegEmpresa", "refresh");
                        } else {
                            $this->session->set_flashdata('MSJ', 'No se ha podido registrar la cuenta correctamente');
                        }
                    } else {
                        $this->session->set_flashdata('MSJ', 'El nombre de usuario que intenta registrar ya esta siendo ocupado.');
                    }
                } else {
                    $this->session->set_flashdata('MSJ', 'Ya exite una cuenta asociada con el correo que intenta registrar.');
                }
            }
        }
        $this->load->view('RegEmpresa', 'refresh');
    }

    public function VistaPerfilesCateg($id = null)
    {
        $this->load->model('Control_model', 'Cmodel'); //se carga el modelo

        if ($id !== null) {
            $id = $this->db->escape((int)$id);
            $dt['getPerfiles'] = $this->Cmodel->getPerfiles($id);
            $dt['getCompPerfiles'] = $this->Cmodel->getCompPerfiles($id);
            $this->load->view('VistaPerfilesCateg', $dt);
        }
    }

    public function IndividualCandidato($idCnd = null)
    {
        if ($this->session->userdata('idtipo') == 2) {
            $this->load->model('Control_model'); //se carga el modelo

            if ($idCnd !== null) {
                $idCnd = $this->db->escape((int)$idCnd);
                $dt['perfilCand'] = $this->Control_model->perfilCand($idCnd);
                $dt['repCand'] = $this->Control_model->repCand($idCnd);
                $this->load->view('IndividualCandidato', $dt);
            }
        } else {
            redirect('Control');
        }
    }

    public function RegVacante()
    {
        if ($this->session->userdata('idtipo') == 2) {

            $this->load->model('Control_model', 'Cmodel'); //cargar el modelo
            $idusr = $this->session->userdata('idusr');
            $dt['getEmpresa'] = $this->Cmodel->getEmpresa($idusr); //cargar funcion para obtener categoria

            if (isset($_POST['regis_v'])) {
                //Arreglo para adjuntar los campos que iran a la tabla vacante
                $vacante = array();

                //Asignacion de valores que se ingresan
                $vacante['n_vacante'] = $this->input->POST('n_vacante');
                $vacante['idempresa'] = $dt['getEmpresa']->idempresa;
                $vacante['idcategoria'] = $this->input->POST('categ');
                $vacante['des_vacante'] = $this->input->POST('des_vacante');
                $vacante['requerimiento'] = $this->input->POST('requerimiento');
                $vacante['contrato'] = $this->input->POST('contrato');
                $vacante['entrada'] = $this->input->POST('entrada');
                $vacante['salida'] = $this->input->POST('salida');
                $vacante['salario'] = $this->input->POST('salario');

                $inVacante = $this->db->insert('vacante', $vacante);

                if ($inVacante) {
                    echo "<script type='text/javascript'>alert('REGISTRO CORRECTO');</script>";
                } else {
                    echo "<script type='text/javascript'>alert('NO SE REGISTRO');</script>";
                }
            }

            $dt['getCategoria'] = $this->Cmodel->getCategoria(); //cargar funcion para obtener categoria
            $this->load->view('RegVacante', $dt); //cargar vista con [$dt (funciones)]
        } else {
            redirect('Control');
        }
    }

    public function PerfilEmp()
    {
        if ($this->session->userdata('idtipo') == 2) {
            $this->load->model('Control_model', 'Cmodel'); //cargar el modelo
            $idusr = $this->session->userdata('idusr'); //obtener el id del usuario logeado
            $idemp = $this->Cmodel->getIdEmpresa($idusr);

            $dt['getEmpresa'] = $this->Cmodel->getEmpresa($idusr); //cargar funcion para obtener datos de la empresa
            $dt['vacantesEmp'] = $this->Cmodel->vacantesEmp($idemp->idempresa);

            $this->load->view('PerfilEmp', $dt);
        } else {
            redirect('Control');
        }
    }

    public function Postulante($idVacante = null)
    {
        if ($this->session->userdata('idtipo') == 2) {

            $this->load->model('Control_model', 'Cmodel'); //cargar el modelo

            if ($idVacante !== null) {
                $idusr = $this->session->userdata('idusr'); //obtener el id del usuario logeado
                $idemp = $this->Cmodel->getIdEmpresa($idusr);
                $idVacante = $this->db->escape((int)$idVacante);

                $dt['getEmpresa'] = $this->Cmodel->getEmpresa($idusr); //cargar funcion para obtener datos de la empresa
                $dt['vacante'] = $this->Cmodel->vacante($idVacante);
                $dt['vacantesEmp'] = $this->Cmodel->vacantesEmp($idemp->idempresa);
                $dt['postulante'] = $this->Cmodel->postulante($idVacante);

                $this->load->view('Postulante', $dt);
            } else {
                $this->load->view('Control');
            }
        } else {
            redirect('Control');
        }
    }

    public function Update_revision($idVac, $idCand)
    {
        $this->load->model('Control_model', 'Cmodel'); //se carga el modelo
        $idVac = $this->db->escape((int)$idVac);
        $this->Cmodel->upd_revision($idVac, $idCand);

        redirect('Control/IndividualCandidato/'.$idCand);
    }

    public function Update_final($idVac, $idCand)
    {
        $this->load->model('Control_model', 'Cmodel'); //se carga el modelo
        $idVac = $this->db->escape((int)$idVac);
        $this->Cmodel->upd_final($idVac, $idCand);

        echo "<script type='text/javascript'>alert('Se aprovo correctamente la solicitud, comunicate con el postulante para coordinar el siguiente paso');
        window.location.assign('".base_url("index.php/Control/Postulante/".$idVac)."')</script>";
        // redirect('Control/Postulante/'.$idVac, 'refresh');
    }

    public function Upd_PerfilEmp()
    {
        $this->load->model('Control_model', 'Cmodel'); //se carga el modelo
        $idusr = $this->session->userdata('idusr'); //obtener el id del usuario logeado
        $idemp = $this->Cmodel->getIdEmpresa($idusr);

        //valores que se actualizaran
        $input_correo = $this->input->post('txt_correo');
        $input_tel = $this->input->post('txt_tel');

        if (!empty($input_tel) && empty($input_correo)) {
            $this->Cmodel->upd_telEmp($idemp->idempresa, $input_tel);
            echo "<script type='text/javascript'>alert('Su telefono fue actualizado exitosamente'); 
            window.location.assign('".base_url("index.php/Control/PerfilEmp")."') </script>";
        } else if (empty($input_tel) && !empty($input_correo)) {
            $this->Cmodel->upd_correoEmp($idemp->idempresa,$input_correo);
            echo "<script type='text/javascript'>alert('Su correo electronico fue actualizado exitosamente'); 
            window.location.assign('".base_url("index.php/Control/PerfilEmp")."') </script>";
        } else {
            $this->Cmodel->upd_PerfilEmp($idemp->idempresa, $input_tel, $input_correo);
            echo "<script type='text/javascript'>alert('Su telefono y correo electronico fueron actualizados exitosamente'); 
            window.location.assign('".base_url("index.php/Control/PerfilEmp")."') </script>";
        }

        // redirect('Control/PerfilEmp');
    }

    public function del_vacante(int $id)
    {
        $this->load->model('Control_model', 'Cmodel');

        if ($this->Cmodel->del_vacante($id)) {
            redirect('Control/PerfilEmp');
        }
    }
}
