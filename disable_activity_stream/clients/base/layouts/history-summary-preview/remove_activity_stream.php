<?php

$module = '{MODULENAME}';

if(!empty($viewdefs[$module]['base']['layout']['history-summary-preview']['components'])) {
    foreach($viewdefs[$module]['base']['layout']['history-summary-preview']['components'] as $key => $val) {
        if(!empty($val['layout']) && $val['layout'] == 'preview-activitystream') {
            unset($viewdefs[$module]['base']['layout']['history-summary-preview']['components'][$key]);
        }
    }
}
