<?php
include_once 'lib_dbConnection.php';

if (isset($_GET['court_num'])) {
    $result = getTableData("causelist_data", "*", "is_published='1' and court_num='" . $_GET['court_num'] . "'");
    if ($result->num_rows > 0) {
        $rows=array();
        while ($row = $result->fetch_assoc()) {
            if ($row['publish_time'] == $_GET['publish_time']) {
                echo 'false';
                return;
            }
            $rows[] = $row;
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($rows);
    }
}
?>