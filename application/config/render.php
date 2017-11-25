<?php

$config['controllers'] = [
    /*Andres*/
    'users' => [
        'login' => [
            'title'             => 'Iniciar sesión',
            'template'          => 'public',
            'sidebar_active'    => 0,
        ]
    ],
    'nacionalidades' => [
        'read' => [
            'title'             => 'Nacionalidades',
            'template'          => 'private',
            'sidebar_active'    => 5,
        ],
        'create' => [
            'title'             => 'Crear Nacionalidad',
            'template'          => 'private',
            'sidebar_active'    => 5,
        ],
        'update' => [
            'title'             => 'Modificar Nacionalidad',
            'template'          => 'private',
            'sidebar_active'    => 5,
        ]

    ],
    /*fin andres*/
    /*Juanpi*/
    'arbitros' => [
        'read' => [
            'title'             => 'Arbitros',
            'template'          => 'private',
            'sidebar_active'    => 1,
        ],
        'create' => [
            'title'             => 'Crear Arbitro',
            'template'          => 'private',
            'sidebar_active'    => 1,
        ],
        'update' => [
            'title'             => 'Modificar Arbitro',
            'template'          => 'private',
            'sidebar_active'    => 1,
        ]

    ],
    'fases' => [
        'read' => [
            'title'             => 'Fases',
            'template'          => 'private',
            'sidebar_active'    => 2,
        ],
        'create' => [
            'title'             => 'Crear Fase',
            'template'          => 'private',
            'sidebar_active'    => 2,
        ],
        'update' => [
            'title'             => 'Modificar Fase',
            'template'          => 'private',
            'sidebar_active'    => 2,
        ]
    ],
    'jugadores' => [
        'read' => [
            'title'             => 'Jugadores',
            'template'          => 'private',
            'sidebar_active'    => 3,
        ],
        'create' => [
            'title'             => 'Crear Jugador',
            'template'          => 'private',
            'sidebar_active'    => 3,
        ],
        'update' => [
            'title'             => 'Modificar Jugador',
            'template'          => 'private',
            'sidebar_active'    => 3,
        ]
    ],
    'torneos' => [
        'read' => [
            'title'             => 'Torneos',
            'template'          => 'private',
            'sidebar_active'    => 4,
        ],
        'create' => [
            'title'             => 'Crear Torneos',
            'template'          => 'private',
            'sidebar_active'    => 4,
        ],
        'update' => [
            'title'             => 'Modificar Torneos',
            'template'          => 'private',
            'sidebar_active'    => 4,
        ]
    ],
    'inscripciones' => [
        'read' => [
            'title'             => 'inscritos',
            'template'          => 'private',
            'sidebar_active'    => 6,
        ],
        'create' => [
            'title'             => 'Inscripciones',
            'template'          => 'private',
            'sidebar_active'    => 6,
        ],
    ],
    'entrenador' => [
        'read' => [
            'title'             => 'Entrenador',
            'template'          => 'private',
            'sidebar_active'    => 8,
        ],
        'create' => [
            'title'             => 'Crear Entrenador',
            'template'          => 'private',
            'sidebar_active'    => 8,
        ],
        'update' => [
            'title'             => 'Modificar Entrenador',
            'template'          => 'private',
            'sidebar_active'    => 8,
        ]
    ],
    'equipos' => [
        'read' => [
            'title'             => 'Equipo',
            'template'          => 'private',
            'sidebar_active'    => 9,
        ],
        'create' => [
            'title'             => 'Crear Equipo',
            'template'          => 'private',
            'sidebar_active'    => 9,
        ],
        'registration' => [
            'title'             => 'Inscribir jugadores',
            'template'          => 'private',
            'sidebar_active'    => 9,
        ]
    ],
    'partidos' => [
        'read' => [
            'title'             => 'Partidos',
            'template'          => 'private',
            'sidebar_active'    => 7,
        ],
        'create' => [
            'title'             => 'Crear Partido',
            'template'          => 'private',
            'sidebar_active'    => 7,
        ],
        'add_team' => [
            'title'             => 'Agregar equipo',
            'template'          => 'private',
            'sidebar_active'    => 7,
        ],
        'win' => [
            'title'             => 'Agregar resultado',
            'template'          => 'private',
            'sidebar_active'    => 7,
        ]
    ],
    /*Fin juanpi*/
];