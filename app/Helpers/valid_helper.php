<?php

function display_error($validation, $field)
{
    
    if(!empty($validation->hasError($field)))
    {
        return $validation->getError($field);
    }
    else
    {
        return false;
    }
}