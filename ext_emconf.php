<?php
$EM_CONF[$_EXTKEY] = array (
    'title' => 'Engage',
    'description' => 'This extension that allows you to create more engagement for your Website',
    'category' => 'Frontend',
    'version' => '0.0.1',
    'state' => 'alpha',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearcacheonload' => 0,
    'author' => 'Bernhard Wendt',
    'author_email' => 'bw@bernhardwendt.com',
    'author_company' => 'bwd2',
    'constraints' =>
        array (
            'depends' =>
                array (
                    'typo3' => '8.6.0-8.6.99',
                ),
            'conflicts' =>
                array (
                ),
            'suggests' =>
                array (
                ),
        ),
    'autoload' => array(
        'psr-4' => array('Bwd2\\Engage\\' => 'Classes/')
    ),
);

