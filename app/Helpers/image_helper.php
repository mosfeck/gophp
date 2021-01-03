<?php

function src($fileName, $type = "full")
{
    $path = WRITEPATH.'uploads';

    if($type != 'full')
        $path .= $type . '/';

    return $path . $fileName;    
}