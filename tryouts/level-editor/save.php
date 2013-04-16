<?php

if(isset($_POST['name']))
{
    $name = $_POST['name'];
    $filename = strtolower(str_replace(' ', '-', $name));


    $data = stripslashes($_POST['json']);

    if(file_put_contents('levels/'.$filename.'.json', $data))
    {
        echo '1';
    } else {
        echo '-1';
    }
} else {
    echo '-1';
}
 
