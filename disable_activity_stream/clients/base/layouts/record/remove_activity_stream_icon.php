<?php

$module = '{MODULENAME}';

if(!empty($viewdefs[$module]['base']['layout']['record']['components']['0']['layout']['components']['0']['layout']['components']['2']['layout']['availableToggles'])) {
    foreach($viewdefs[$module]['base']['layout']['record']['components']['0']['layout']['components']['0']['layout']['components']['2']['layout']['availableToggles'] as $key => $val) {
        if(!empty($val['name']) && in_array($val['name'], array('subpanels', 'list', 'activitystream'))) {
            $viewdefs[$module]['base']['layout']['record']['components']['0']['layout']['components']['0']['layout']['components']['2']['layout']['availableToggles'][$key]['disabled'] = true;
            $viewdefs[$module]['base']['layout']['record']['components']['0']['layout']['components']['0']['layout']['components']['2']['layout']['availableToggles'][$key]['css_class'] = 'disabled';
        }
    }
}
