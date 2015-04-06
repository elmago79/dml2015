<?php

/**
 * Initialize variables output
 *
 */

// Para poblar las variables del sitio
$site = $pages->get('/');
//Para llamar a todos los foros
$foros = $pages->get('/foros/')->children;
// Para llamar a todas las actividades
$semblanzas = $pages->get('/semblanzas/')->children;

