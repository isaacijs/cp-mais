<?php

if (!empty($_COOKIE['pag404'])):
    header("location: " . $_COOKIE['pag404']);
else:
    header("location: ../");
endif;

die("ACESSO RESTRITO");
