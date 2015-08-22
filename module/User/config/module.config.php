<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'User\Controller\Index' => 'User\Controller\IndexController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'user' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/user',
                    'defaults' => array(
                        '__NAMESPACE__' => 'User\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                    ),
                ),

                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(),
                        ),
                    ),
                ),

            ),

        ),

    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'user' => __DIR__.'/../view',
        ),
    ),

);