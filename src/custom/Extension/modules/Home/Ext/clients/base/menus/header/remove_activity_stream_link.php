<?php

if(!empty($viewdefs['Home']['base']['menu']['header'])) {
    foreach($viewdefs['Home']['base']['menu']['header'] as $key => $val) {
        if(!empty($val['route']) && $val['route'] == '#activities') {
            unset($viewdefs['Home']['base']['menu']['header'][$key]);
        }
    }
}
