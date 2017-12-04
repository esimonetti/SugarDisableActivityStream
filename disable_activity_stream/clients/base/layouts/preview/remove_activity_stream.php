<?php

$module = '{MODULENAME}';

if(!empty($viewdefs[$module]['base']['layout']['preview']['components'])) {
    foreach($viewdefs[$module]['base']['layout']['preview']['components'] as $key => $val) {
        if(!empty($val['layout']) && $val['layout'] == 'preview-activitystream') {
            unset($viewdefs[$module]['base']['layout']['preview']['components'][$key]);
        }
    }
}
