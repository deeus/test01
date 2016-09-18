<?php
header('Content-type: text/html; charset=utf-8');

//error_reporting(E_ALL);
include('db_connect.php');
// Обработчик для опережающего ввода с клавиатуры (страны)
$term = $_GET['term'];//retrieve the search term that autocomplete sends
$qstring = "SELECT `name` FROM `country` WHERE `name` LIKE '".$term."%'";

$result = mysql_query($qstring);//query the database for entries containing the term

$new_array = array();
while($row = mysql_fetch_array($result,MYSQL_ASSOC))
{
    foreach ($row as $key => $value)
    {
        $new_array[] = $value;
    }
}
echo json_encode($new_array);
//$pattern = '/^'.preg_quote($term).'/iu';
		
//echo json_encode(preg_grep($pattern, $row));

?>