<?php
$config = [
    /*Andres*/
    'login' => [
        [
            'field' => 'username',
            'label' => 'Nombre de usuario',
            'rules' => 'trim|required'
        ],
        [
            'field' => 'password',
            'label' => 'Contrase&ntilde;a',
            'rules' => [
                'trim',
                'required',
                'min_length[5]',
                'max_length[40]',
                [
                    'check_account_callable',
                    function( $password ) {
                        $CI =& get_instance();
                        $username = $CI->input->post('username');
                        return $CI->user->is_valid($username, $password);
                    }
                ]
            ]
        ]
    ],
    'create_nacionalidad' => [
        [
            'field' => 'nombre',
            'label' => 'Nombre',
            'rules' => 'trim|required|is_unique[nacionalidad.nombre]'
        ]
    ],
    'update_nacionalidad' => [
        [
            'field' => 'nombre',
            'label' => 'Nombre',
            'rules' => [
                'trim',
                'required',
                [
                    'check_nombre_nac',
                    function($nombre) {
                        $CI =& get_instance();
                        $id = $CI->input->post('id');
                        $nac = $CI->nacionalidad->get($id);
                        if(($nac->nombre === $nombre)) {
                            return TRUE;
                        } else {
                            return $CI->form_validation->is_unique($nombre, 'nacionalidad.nombre');
                        }
                    }
                ]
            ],
            'errors' => [
                'check_nombre_nac' => 'El %s ya se encuentra en uso.'
            ]
        ]
    ],
    'registration' => [
        [
            'field' => 'jugador[]',
            'label' => 'Jugadores',
            'rules' => [
                'trim',
                'required',
                [
                    'check_jugadores',
                    function() {
                        $CI =& get_instance();
                        $jugadores = $CI->input->post('jugador[]');
                        $id = $CI->uri->segment(3);
                        $equipo = $CI->equipos->get($id);
                        if ( ! empty($equipo) ) {
                            switch ($equipo->modalidad) {
                                case 'Dobles masculino':
                                    if (count($jugadores) != 2) {
                                        return FALSE;
                                    } else {
                                        $jugadorA = $CI->jugadores->get($jugadores[0]);
                                        $jugadorB = $CI->jugadores->get($jugadores[1]);
                                        if ( ( ! isset($jugadorA->genero) ||  ! isset($jugadorB->genero) ) || $jugadorA->genero !== 'masculino' || $jugadorB->genero !== 'masculino' ) {
                                            return FALSE;
                                        }
                                    }
                                    break;
                                case 'Individual masculino':
                                    if (count($jugadores) != 1 ) {
                                        return FALSE;
                                    } else {
                                        $jugador = $CI->jugadores->get($jugadores[0]);
                                        if ( ! isset($jugador->genero) || $jugador->genero !== 'masculino' ) {
                                            return FALSE;
                                        }
                                    }
                                    break;
                                case 'Dobles femenino':
                                    if (count($jugadores) != 2) {
                                        return FALSE;
                                    } else {
                                        $jugadorA = $CI->jugadores->get($jugadores[0]);
                                        $jugadorB = $CI->jugadores->get($jugadores[1]);
                                        if ( ( ! isset($jugadorA->genero) ||  ! isset($jugadorB->genero) ) || $jugadorA->genero !== 'femenino' || $jugadorB->genero !== 'femenino' ) {
                                            return FALSE;
                                        }
                                    }
                                    break;
                                case 'Individual femenino':
                                    if (count($jugadores) != 1 ) {
                                        return FALSE;
                                    } else {
                                        $jugador = $CI->jugadores->get($jugadores[0]);
                                        if ( ! isset($jugador->genero) || $jugador->genero !== 'femenino' ) {
                                            return FALSE;
                                        }
                                    }
                                    break;
                                case 'Dobles mixto':
                                    if (count($jugadores) != 2) {
                                        return FALSE;
                                    } else {
                                        $jugadorA = $CI->jugadores->get($jugadores[0]);
                                        $jugadorB = $CI->jugadores->get($jugadores[1]);
                                        if ( ( ! isset($jugadorA->genero) ||  ! isset($jugadorB->genero) ) || ($jugadorA->genero === 'femenino' && $jugadorB->genero === 'femenino') || ($jugadorA->genero === 'masculino' && $jugadorB->genero === 'masculino')) {
                                            return FALSE;
                                        }
                                    }
                                    break;
                            }
                        } else {
                            return FALSE;
                        }
                        return TRUE;
                    }
                ]
            ],
            'errors' => [
                'check_jugadores' => 'Jugadores no válidos'
            ]
        ]
    ],
    /*Fin Andres*/
    /*Juanpi*/
    'create_arbitro' => [
        [
            'field' => 'nombre',
            'label' => 'Nombre arbitro',
            'rules' => 'trim|required|alpha_spanish_space'
        ],
        [
            'field' => 'apellido',
            'label' => 'Apellido arbitro',
            'rules' => 'trim|required|alpha_spanish_space'
        ],
    ],
    'create_entrenador' => [
        [
            'field' => 'nombre',
            'label' => 'Nombre entrenador',
            'rules' => 'trim|required|alpha_spanish_space'
        ],
        [
            'field' => 'apellido',
            'label' => 'Apellido entrenador',
            'rules' => 'trim|required|alpha_spanish_space'
        ],
    ],
    'create_inscripcion' => [
        [
            'field' => 'jugador',
            'label' => 'Nombre jugador',
            'rules' => 'trim|required'
        ],
        [
            'field' => 'equipo',
            'label' => 'Nombre de equipo',
            'rules' => 'trim|required'
        ],
    ],
    'create_fase' => [
        [
            'field' => 'nombre',
            'label' => 'Nombre arbitro',
            'rules' => 'trim|required|alpha_spanish_space'
        ],
        [
            'field' => 'premioconsuelo',
            'label' => 'premio consuelo',
            'rules' => 'trim|required|numeric'
        ],
    ],
    'create_jugador' => [
        [
            'field' => 'nombre',
            'label' => 'Nombre',
            'rules' => 'trim|required|alpha_spanish_space'
        ],
        [
            'field' => 'apellido',
            'label' => 'Apellido',
            'rules' => 'trim|required|alpha_spanish_space'
        ],
        [
            'field' => 'fecha_nac',
            'label' => 'Fecha Nacimiento',
            'rules' => 'trim|required|valid_date[-]'
        ],
        [
            'field' => 'genero',
            'label' => 'genero',
            'rules' => 'trim|required|in_list[masculino,femenino]'
        ],
    ],
    'create_torneo' => [
        [
            'field' => 'nombre',
            'label' => 'Nombre',
            'rules' => 'trim|required|alpha_spanish_space'
        ],
        [
            'field' => 'premio',
            'label' => 'Premio',
            'rules' => 'trim|required|numeric'
        ],
        [
            'field' => 'gestion',
            'label' => 'Gestion',
            'rules' => 'trim|required|numeric|max_length[4]|min_length[4]'
        ],
        [
            'field' => 'pais',
            'label' => 'pais',
            'rules' => 'trim|required|in_list[Gran Bretaña,Estados Unidos,Francia,Australia]'
        ],
    ],
    'create_equipo' => [
        [
            'field' => 'nombre',
            'label' => 'nombre',
            'rules' => 'trim|required|is_unique[equipo.nombre]'
        ],
        [
            'field' => 'nacionalidad',
            'label' => 'Nacionalidad',
            'rules' => 'trim|required'
        ],
        [
            'field' => 'torneo',
            'label' => 'Torneo',
            'rules' => 'trim|required'
        ],
        [
            'field' => 'modalidad',
            'label' => 'Modalidad',
            'rules' => 'trim|required|in_list[Individual masculino,Individual femenino,Dobles masculino,Dobles femenino,Dobles mixto]'
        ],
        [
            'field' => 'entrenador',
            'label' => 'Entrenador',
            'rules' => 'trim|required'
        ],
    ],
    'create_partido' => [
        [
            'field' => 'fase',
            'label' => 'Fase',
            'rules' => 'trim|required'
        ],
        [
            'field' => 'modalidad',
            'label' => 'Modalidad',
            'rules' => 'trim|required|in_list[Individual masculino,Individual femenino,Dobles masculino,Dobles femenino,Dobles mixto]'
        ],
        [
            'field' => 'arbitro',
            'label' => 'arbitro',
            'rules' => 'trim|required'
        ],
    ],
    'add_team' => [
        [
            'field' => 'equipo_1',
            'label' => 'Equipo 1',
            'rules' => 'trim|required|differs[equipo_2]'
        ],
        [
            'field' => 'equipo_2',
            'label' => 'Equipo 2',
            'rules' => 'trim|required|differs[equipo_1]'
        ],
    ],
    'win' => [
        [
            'field' => 'equipo',
            'label' => 'Ganador',
            'rules' => 'trim|required'
        ],
        [
            'field' => 'resultado',
            'label' => 'Resultado',
            'rules' => 'trim|required'
        ],
    ],
    /*Fin Juanpi*/
];