<?php
$config['widgets'][] = array(
    'name'     => 'tpls/widgets/widget.Idea.tpl',
    'wgroup'   => 'right',
    'plugin'   => 'idea',
    'priority' => 999,
    'on'       => array(
        'index',
    ),
);