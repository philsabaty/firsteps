<?php
require_once ('tools.inc.php');
//
$mysqlHost = getenv('MYSQL_HOST_1STEPS') or "172.17.0.1";
$db = mysqli_connect($mysqlHost, "root", "root", "first_steps", 3307);
if($_SERVER['REQUEST_METHOD']=='POST'){
    if( isset($_POST['desc']) && $_POST['desc']!='' ){
        createEvent($db, $_POST['desc']);
    }
    elseif( isset($_POST['delete']) && $_POST['delete']!='1' ){
        deleteAllEvents($db);
    }
    header('Location: '.$_SERVER['REQUEST_URI']);
    die();
}
?>
<html>
<head>
    <title>First Steps v0.2</title>
</head>
<body>
    <h1>First Steps</h1>
    <h2>New event</h2>
    <form action="." method="POST">
        <input type="text" name="desc"/>
        <input type="submit" value="OK"/>
    </form>
    <h2>Log</h2>
    <?php dumpEvents($db); ?>
    <h2>Clear logs</h2>
    <form action="." method="POST">
        <input type="hidden" name="delete" value="1"/>
        <input type="submit" value="Delete all"/>
    </form>
</body>
</html>
<?php mysqli_close($db); ?>


