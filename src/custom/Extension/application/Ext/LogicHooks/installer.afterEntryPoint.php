<?php

// Enrico Simonetti
// enricosimonetti.com
// custom/Extension/application/Ext/LogicHooks/installer.afterEntryPoint.php

$hook_version = 1;
$hook_array['after_entry_point'][] = array(
    1,
    'Disable activity stream on after entry point hook',
    'custom/logichooks/application/afterEntryPoint.php',
    'afterEntryPoint',
    'disableActivityStream',
);
