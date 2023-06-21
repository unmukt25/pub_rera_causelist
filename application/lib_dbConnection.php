<?php

$servername = "localhost";
$username = "ci4";
$password = "";
$dbname = "rera_causelist2";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");
/********************End Conection Part***********************************************/

/******************functions summary **********************/
// functions list
// getTableData($table, $fields, $condition)
// insertq($tableName, $values)
/*********************end function summery************* */



// data operation
/**********************************/
// Select Query to get sub set (part of table ; or full table)
// call example : -> $result=getTableData("mytable","name,age","city='bhopal'")
function getTableData($table, $fields, $condition)
{
  global $conn;
  $sql = "select " . $fields . " from " . $table . " where " . $condition;
  // echo $sql;
  // die;
  $result = $conn->query($sql);
  return $result;
}

// insert query builder  insertq('employees',$_GET)
function insertq($tableName, $values)
{

  $sql_q = "";
  $sql_q = "INSERT INTO " . $tableName . "(" . field_list($values) . ") VALUES(" . value_list($values) . ")";

  return exec_no_query($sql_q);
}

// exec_no_query() function execute query with no return values; intent to run as subfunction of insertq()
// exec_no_query('insert into std(`name`,`age`,`city`) values(\'per_name\',\'25\',\'bhopal\')');
function exec_no_query($sql)
{
  global $conn;
  $ret = $conn->query($sql);
  return $ret;
}

// to get the list of fields from $_GET or $_POST  or any associative array
function field_list($arr)
{
  $field = "";

  foreach ($arr as $k => $v) {
    if ($k == "submit")
      continue;

    if ($field == "")
      $field .= "`$k`";
    else
      $field .= ",`$k`";
  }

  return $field;
}

// to get the list of values from $_GET or $_POST or any associative array
function value_list($arr)
{
  $values = "";
  foreach ($arr as $k => $v) {
    if ($k == "submit")
      continue;

    if ($values == "")
      $values .= "'$v'";
    else
      $values .= ",'$v'";
  }
  return $values;
}

//  update function
//  $RoT['tableName']='table_name';
//  $RoT['update_fields']='field_name="newvalue" ';
//  $RoT['condition']=' field>value';
//  $ret_val = updateq($RoT);            //!!!!!!!!! calling
function updateq($RoT)
{
  global $conn; // as the $conn is declaired outside this function it has to redeclare with global keyword

  $sql = "update " . $RoT['tableName'] . " set ".$RoT['update_fields'] . ((strlen($RoT['condition']))? " where ".$RoT['condition']:"");
  // echo $sql;
  // die;
  $result = $conn->query($sql); // !!!!!!! Executing query

  $r = $conn->affected_rows;
  return $r;

}

//  delete function
//  $RoT['tableName']='file_details';
//  $RoT['condition']='srno='.$_GET["del_srno"];
//  $ret_val=deleteR($RoT)            //!!!!!!!!! calling
function deleteR($RoT)
{
  global $conn; // as the $conn is declaired outside this function it has to redeclare with global keyword

  $sql = "delete FROM " . $RoT['tableName'] . ((strlen($RoT['condition']))? " where ".$RoT['condition']:"");
  
  $result = $conn->query($sql); // !!!!!!! Executing query

  $r = $conn->affected_rows;
  return $r;

}

//  row count function
//  $RoT['tableName']='file_details';
//  $RoT['condition']='where srno='.$_GET["del_srno"];
//  $ret_val=rowCount($RoT)            // !!!!!!!!!!!!!!   calling syntax
function rowCount($RoT)
{
  global $conn; // as the $conn is declaired outside this function it has to redeclare with global keyword

  $sql = "select count(*) numrow FROM " . $RoT['tableName'] . " " . $RoT['condition'];

  $result = $conn->query($sql); // !!!!!!! Executing query

  $r = $result->fetch_assoc();

  return $r['numrow'];
}

//  get rows function
//  $RoT['tableName']='file_details';
//  $RoT['condition']='where srno='.$_GET["del_srno"];
//  $ret_val=getRows($RoT)            // !!!!!!!!!!!!!!   calling syntax
function getRows($RoT)
{
  global $conn; // as the $conn is declaired outside this function it has to redeclare with global keyword

  $sql = "select * FROM " . $RoT['tableName'] . " " . $RoT['condition'];

  $result = $conn->query($sql); // !!!!!!! Executing query

  return $result;
}


//  get next id function
//  $ret_id=getNextDispId()            // !!!!!!!!!!!!!!   calling syntax
function getNextDispId()
{
  global $conn; // as the $conn is declaired outside this function it has to redeclare with global keyword

  $sql = "SELECT MAX(LEFT(`dispatch_no`,3)) `next_id` FROM `file_details`";
  $result = $conn->query($sql); // !!!!!!! Executing query
  $row = $result->fetch_assoc();
  return $row["next_id"] + 1;
}

?>