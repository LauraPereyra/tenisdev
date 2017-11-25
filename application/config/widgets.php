<?php

$config['sidebar'] = [
    'items' => [
        [
            'id'    => 1,
            'label' => 'Arbitros',
            'link'  => '#',
            'icon'  => 'md md-people',
            'key'   => '',
            'submenu' => [
                [
                    'id'    => 1,
                    'label' => 'Listado',
                    'link'  => site_url('arbitros'),
                    'key'   => ''
                ],
                [
                    'id'    => 2,
                    'label' => 'Agregar',
                    'link'  => site_url('arbitros/create'),
                    'key'   => ''
                ],
            ]
        ],
        [
            'id'    => 2,
            'label' => 'Fases',
            'link'  => '#',
            'icon'  => 'md md-view-carousel',
            'key'   => '',
            'submenu' => [
                [
                    'id'    => 1,
                    'label' => 'Listado',
                    'link'  => site_url('fases'),
                    'key'   => ''
                ],
                [
                    'id'    => 2,
                    'label' => 'Agregar',
                    'link'  => site_url('fases/create'),
                    'key'   => ''
                ],
            ]
        ],
        [
            'id'    => 3,
            'label' => 'Jugadores',
            'link'  => '#',
            'icon'  => 'md md-people-outline',
            'key'   => '',
            'submenu' => [
                [
                    'id'    => 1,
                    'label' => 'Listado',
                    'link'  => site_url('jugadores'),
                    'key'   => ''
                ],
                [
                    'id'    => 2,
                    'label' => 'Agregar',
                    'link'  => site_url('jugadores/create'),
                    'key'   => ''
                ],
            ]
        ],
        [
            'id'    => 4,
            'label' => 'Torneos',
            'link'  => '#',
            'icon'  => 'md md-style',
            'key'   => '',
            'submenu' => [
                [
                    'id'    => 1,
                    'label' => 'Listado',
                    'link'  => site_url('torneos'),
                    'key'   => ''
                ],
                [
                    'id'    => 2,
                    'label' => 'Agregar',
                    'link'  => site_url('torneos/create'),
                    'key'   => ''
                ],
            ]
        ],
        [
            'id'    => 5,
            'label' => 'Países',
            'link'  => '#',
            'icon'  => 'md md-public',
            'key'   => '',
            'submenu' => [
                [
                    'id'    => 1,
                    'label' => 'Listado',
                    'link'  => site_url('nacionalidades'),
                    'key'   => ''
                ],
                [
                    'id'    => 2,
                    'label' => 'Agregar',
                    'link'  => site_url('nacionalidades/create'),
                    'key'   => ''
                ],
            ]
        ],
        /*[
            'id'    => 6,
            'label' => 'Inscripciones',
            'link'  => '#',
            'icon'  => 'md md-group-work',
            'key'   => '',
            'submenu' => [
                [
                    'id'    => 1,
                    'label' => 'Listado',
                    'link'  => site_url('inscripciones'),
                    'key'   => ''
                ],
                [
                    'id'    => 2,
                    'label' => 'Agregar',
                    'link'  => site_url('inscripciones/create'),
                    'key'   => ''
                ],
            ]
        ],*/
        [
            'id'    => 7,
            'label' => 'Partidos',
            'link'  => '#',
            'icon'  => 'md md-games',
            'key'   => '',
            'submenu' => [
                [
                    'id'    => 1,
                    'label' => 'Listado',
                    'link'  => site_url('partidos'),
                    'key'   => ''
                ],
                [
                    'id'    => 2,
                    'label' => 'Agregar',
                    'link'  => site_url('partidos/create'),
                    'key'   => ''
                ],
            ]
        ],
        [
            'id'    => 8,
            'label' => 'Entrenador',
            'link'  => '#',
            'icon'  => 'md md-person',
            'key'   => '',
            'submenu' => [
                [
                    'id'    => 1,
                    'label' => 'Listado',
                    'link'  => site_url('entrenador'),
                    'key'   => ''
                ],
                [
                    'id'    => 2,
                    'label' => 'Agregar',
                    'link'  => site_url('entrenador/create'),
                    'key'   => ''
                ],
            ]
        ],
        [
            'id'    => 9,
            'label' => 'Equipos',
            'link'  => '#',
            'icon'  => 'md md-group-add',
            'key'   => '',
            'submenu' => [
                [
                    'id'    => 1,
                    'label' => 'Listado',
                    'link'  => site_url('equipos'),
                    'key'   => ''
                ],
                [
                    'id'    => 2,
                    'label' => 'Agregar',
                    'link'  => site_url('equipos/create'),
                    'key'   => ''
                ],
            ]
        ],
    ]
];
