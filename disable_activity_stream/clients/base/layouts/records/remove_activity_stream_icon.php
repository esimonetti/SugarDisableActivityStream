<?php

$module = '{MODULENAME}';

if(!empty($viewdefs[$module]['base']['layout']['records']['components']['0']['layout']['components']['0']['layout']['components']['1']['layout']['availableToggles'])) {
    foreach($viewdefs[$module]['base']['layout']['records']['components']['0']['layout']['components']['0']['layout']['components']['1']['layout']['availableToggles'] as $key => $val) {
        if(!empty($val['name']) && in_array($val['name'], array('list', 'activitystream'))) {
            $viewdefs[$module]['base']['layout']['records']['components']['0']['layout']['components']['0']['layout']['components']['1']['layout']['availableToggles'][$key]['disabled'] = true;
            $viewdefs[$module]['base']['layout']['records']['components']['0']['layout']['components']['0']['layout']['components']['1']['layout']['availableToggles'][$key]['css_class'] = 'disabled';
        }
    }
}
