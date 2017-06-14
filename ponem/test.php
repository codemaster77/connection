<?php

include "Database/Connection.php";


$rec_limit = 5;
$conn = mysql_connect($localhost,$username,$password);

if(! $conn ) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('10');

/* Get total number of records */
$sql = "SELECT count(emp_id) FROM emp_master ";
$retval = mysql_query( $sql, $conn );

if(! $retval ) {
    die('Could not get data: ' . mysql_error());
}
$row = mysql_fetch_array($retval, MYSQL_NUM );
$rec_count = $row[0];

if( isset($_GET{'page'} ) ) {
    $page = $_GET{'page'} + 1;
    $offset = $rec_limit * $page ;
}else {
    $page = 0;
    $offset = 0;
}

$left_rec = $rec_count - ($page * $rec_limit);
$sql = "SELECT eid,ename, email, quali, gender, contactno, birthdate, joiningdate,CURDATE(), TIMESTAMPDIFF( YEAR, birthdate, CURDATE( ) ) AS age ".
    "FROM emp_master ".
    "LIMIT $offset, $rec_limit";

$retval = mysql_query( $sql, $conn );

if(! $retval ) {
    die('Could not get data: ' . mysql_error());
}


echo "<table border='1'>";
$i = 0;
while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {

    if ($i == 0) {
        $i++;
        echo "<tr>";
        foreach ($row as $key => $value) {
            echo "<th>" . $key . "</th>";
        }
        echo "</tr>";
    }
    echo "<tr>";
    foreach ($row as $value) {
        echo "<td>" . $value . "</td>";
    }
    echo "</tr>";

}
echo "</table>";

if( $page > 0 ) {
    $last = $page - 2;
    echo "<a href = \"$_PHP_SELF?page=$last\">Last 5 Records</a> | ";
    echo "<a href = \"$_PHP_SELF?page=$page\">Next 5 Records</a>";

}else if( $page == 0 ) {
    $page = $page + 0;
    echo "<a href = \"$_PHP_SELF?page=$page\">Next 5 Records</a>";

}else if( $left_rec < $rec_limit ) {

    $last = $page - 2;
    echo "<a href = \"$_PHP_SELF?page=$last\">Last 5 Records</a>";

}

mysql_close($conn);
php?>