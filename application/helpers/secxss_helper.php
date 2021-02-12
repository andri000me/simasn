<?php

function lindungi($str){
    echo htmlentities($str, ENT_QUOTES, 'UTF-8');
}