<?php

include_once 'lib_dbConnection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RERA Cause List</title>
    <link rel="stylesheet" href="css/styles.css">

    <style>
        @media print {

            .list-heading .center,
            .list-heading .right {
                font-size: 20px;
            }

            .list-heading {
                height: 80px;
                display: flex;
                justify-content: space-between;
                padding: 0px;
            }

            .mdl-data-table {
                border-collapse: collapse;
            }

            .mdl-data-table .heading {
                font-size: large;
                font-weight: 600;
                border-bottom: solid 2px gray;
                background-color: rgb(11, 156, 156);
                color: black;
                letter-spacing: 1px;
            }

            .mdl-data-table td {
                border-bottom: solid black 1px;
                padding: 7px 1px 7px 10px;
            }

        }
    </style>
</head>

<body>
    <?php

    if (isset($_GET['next_date'])) {

        $result = getTableData("causelist_data", "*", "next_date='".$_GET['next_date']."' and bench_name='" . $_GET['bench_name'] . "'");

        $type_def = array("p" => "PROJECT", "a" => "AGENT", "c" => "COMPLAINT");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // reseting the pointer to first row for displaying data in the following list table
            $result->data_seek(0);

            $list_type = $type_def[$row['case_type']];
        } else {
            die("No list is published for this screen.");
        }
    } else {
        die("next_date is not defined; Please define it in url");
    }
    ?>
    <div class="list-heading">
        <div class="left"><img width="150px" src="images\rera_logo.png" alt="" /></div>
        <div class="center">
            <div class="list_title">PUBLIC CAUSE LIST :
                <?php echo $row['next_date'] ?> (
                <?php echo $list_type ?> )
            </div>
            <div class="bench_name">BEFORE
                <?php echo $row['bench_name'] ?>
            </div>
        </div>
        <div class="right"><b>
                <!-- convert Court-1  to सुनवाई कक्ष क्र.1-->
                <?php
                $courtName = array("Court-1" => "सुनवाई कक्ष क्र.1", "Court-2" => "सुनवाई कक्ष क्र.2", "Court-3" => "सुनवाई कक्ष क्र.3", "Court-4" => "सुनवाई कक्ष क्र.4");
                echo $courtName[$row['court_num']];
                ?>
            </b></div>
    </div>

    <?php
    if (strtolower(substr($list_type, 0, 1)) == 'p') {
        ?>

        <table class="mdl-data-table">

            <tbody class="data">
                <?php
                $srno = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $srno++ . "</td>
                            <td>" . $row['case_number'] . "<span class='publish_time' style='display:none;color:red'>" . $row['publish_time'] . "</span></td>
                            <td>" . $row['applicant_name'] . "</td>
                            <td>" . $row['project_name'] . "</td>
                            <td>" . $row['case_brief'] . "</td>
                            </tr>";
                }
                ?>

            </tbody>

            <thead>
                <tr class="heading">
                    <td width="30px">Sr.</td>
                    <td width="175px">Case No.</td>
                    <td width="">Applicant Name</td>
                    <td width="">Project Name</td>
                    <td width="150px">Hearing For</td>
                </tr>
            </thead>
        </table>
        <?php
    }
    ?>
    <?php
    if (strtolower(substr($list_type, 0, 1)) == 'c') {
        ?>

        <table class="mdl-data-table">
            <thead>
                <tr class="heading">
                    <td width="30px">Sr.</td>
                    <td width="175px">Case No.</td>
                    <td width="">Applicant Name</td>
                    <td width="">Respondent Name</td>
                    <td width="">Project Name</td>
                    <td width="150px">Hearing For</td>
                </tr>
            </thead>
            <tbody class="data">
                <?php
                $srno = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $srno++ . "</td>
                            <td>" . $row['case_number'] . "<span class='publish_time' style='display:none;color:red'>" . $row['publish_time'] . "</span></td>
                            <td>" . $row['applicant_name'] . "</td>
                            <td>" . $row['respondent_name'] . "</td>
                            <td>" . $row['project_name'] . "</td>
                            <td>" . $row['case_brief'] . "</td>
                            </tr>";
                }
                ?>

            </tbody>

        </table>
        <?php
    }
    ?>
    <?php
    if (strtolower(substr($list_type, 0, 1)) == 'a') {
        ?>

        <table class="mdl-data-table">
            <thead>
                <tr class="heading">
                    <td width="30px">Sr.</td>
                    <td width="175px">Case No.</td>
                    <td width="">Applicant Name</td>
                    <td width="150px">Hearing For</td>
                </tr>
            </thead>
            <tbody class="data">
                <?php
                $srno = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $srno++ . "</td>
                            <td>" . $row['case_number'] . "<span class='publish_time' style='display:none;color:red'>" . $row['publish_time'] . "</span></td>
                            <td>" . $row['applicant_name'] . "</td>
                            <td>" . $row['case_brief'] . "</td>
                            </tr>";
                }
                ?>

            </tbody>

        </table>
        <?php
    }
    ?>

</body>

</html>