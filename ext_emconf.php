<?php
/**
 * $EM_CONF
 *
 * @category Extension
 * @author   Tim Lochmüller
 */

/** @var $_EXTKEY string */
$EM_CONF[$_EXTKEY] = [
    'title'            => 'Shieldon',
    'description'      => 'Shieldon integration for TYPO3.',
    'version' => '0.1.0',
    'state'            => 'stable',
    'clearcacheonload' => 1,
    'author'           => 'Tim Lochmüller',
    'author_email'     => 'tim.lochmueller@hdnet.de',
    'author_company'   => 'hdnet.de',
    'constraints'      => [
        'depends' => [
            'php'   => '7.2.0-7.4.99',
            'typo3' => '10.4.0-10.4.99',
        ],
    ],
];
