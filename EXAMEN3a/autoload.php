<?php

function autoload($clase) {
    require_once 'clases/' . $clase . '.php';
}

spl_autoload_register('autoload');