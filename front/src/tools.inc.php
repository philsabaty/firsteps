<?php

function dumpEvents($db){

    $sql = 'SELECT * FROM events ORDER BY id ASC ';

    $req = mysqli_query($db, $sql) or die('Error : <br>'.$sql.'<br>'.mysqli_error($db));
    echo '<ul>';
    while($data = mysqli_fetch_assoc($req))
    {
        echo '<li>';
        echo '<b>'.$data['time'].'</b> : '.$data['desc'];
        echo '</li>';
    }
    echo '</ul>';
}

function createEvent($db, $desc){
    $sql = sprintf("INSERT INTO `events` (`id`, `desc`, `time`) VALUES (null, '%s', DEFAULT); ", $desc);
    $req = mysqli_query($db, $sql) or die('Error : <br>'.$sql.'<br>'.mysqli_error($db));
}

function deleteAllEvents($db){
    $sql = "DELETE FROM `events` WHERE 1; ";
    $req = mysqli_query($db, $sql) or die('Error : <br>'.$sql.'<br>'.mysqli_error($db));
}
