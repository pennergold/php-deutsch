<?php

/**
 * if
 */
function Wenn(/* args */)
{
    $args = func_get_args();

    $cond = array_shift($args);
    $trueClosure = array_shift($args);
    $elseClosure = array_pop($args);
    
    $elseIfClosures = $args;
    
    if($cond)
    {
        if(is_callable($trueClosure))
        {
            $result = $trueClosure();
            return $result;
        }
    }
    
    if(is_array($elseIfClosures) && count($elseIfClosures) > 0)
    {
        foreach($elseIfClosures as $cl)
        {
            if( is_callable($cl) )
            {
                return $cl();
            }
        }
    }
    
    if($elseClosure !== null && is_callable($elseClosure))
    {
        return $elseClosure();
    }
    
    return false;
}

/**
 * elseif
 */
function Ansonsten(/* args */)
{
    return call_user_func_array(
        'Wenn', 
        func_get_args()
    );
}

/**
 * else
 */
function Sonst($closure)
{
    if(is_callable($closure))
    {
        return $closure();
    }

    return false;
}