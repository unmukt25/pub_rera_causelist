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
    <link rel="stylesheet" href="css/animation.css">
</head>

<body>
    <?php

    if (isset($_GET['court_num'])) {

        $result = getTableData("causelist_data", "*", "next_date>=CURDATE() and is_published='1' and court_num='" . $_GET['court_num'] . "'");

        $type_def = array("p" => "PROJECT", "a" => "AGENT", "c" => "COMPLAINT");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // reseting the pointer to first row for displaying data in the following list table
            $result->data_seek(0);

            $list_type = $type_def[$row['case_type']];
        } else {
            die("<script>setTimeout( ()=>{location.reload()},15000)</script>No list is published for this screen.</body></html>");
        }
    } else {
        die("Court Number is not defined; Please define it in url");
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
                <button onClick="window.location.reload();">Refresh</button>
                <button onClick="openfullscreen();">fullscreen</button>
                <?php
                $courtName = array("Court-1" => "सुनवाई कक्ष क्र.1", "Court-2" => "सुनवाई कक्ष क्र.2", "Court-3" => "सुनवाई कक्ष क्र.3", "Court-4" => "सुनवाई कक्ष क्र.4");
                echo $courtName[$row['court_num']];
                ?>
            </b></div>
    </div>

    <!-- empty container for populating table headers only on runtime -->
    <div class="headeronly"></div>
    <!-- scrollable div start-->
    <div class="bodydiv">

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
                        <td width="220px">Hearing For</td>
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
                        <td width="220px">Hearing For</td>
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
                        <td width="220px">Hearing For</td>
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



    </div>

    <!-- end scrollable div -->
    <script>
        //following function is called when the number of row is more then screen space
        if (document.querySelectorAll(".bodydiv .data")[0].clientHeight >= 418)
            marqueeWhenRequired();

        function marqueeWhenRequired() {
            h = document.querySelectorAll(".bodydiv .data")[0].clientHeight;
            document.querySelectorAll(".bodydiv .data")[0].style.animation = "scrollvertical 5s infinite linear";
            document.querySelectorAll(".bodydiv .data")[0].style.animationDuration = h * .033 + "s";
        }

        // *********** Ajax Data feching module***********************
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                jsonData = JSON.parse(this.responseText);
                // console.log(jsonData);

                // if jsonData has rows to update then following part will update the html table and heading of the list
                if (jsonData != false) {
                    //***********heading updation part */
                    var case_type = { "p": "PROJECT", "c": "COMPLAINT", "a": "AGENT" };
                    document.querySelectorAll('.list_title')[0].innerText = "PUBLIC CAUSE LIST :  " + jsonData[0].next_date + " ( " + case_type[jsonData[0].case_type] + " )";
                    document.querySelectorAll('.bench_name')[0].innerText = "BEFORE " + jsonData[0].bench_name;
                    // ************ end heading updation part ****************

                    // ********** if the data is for project then *****************
                    if (jsonData[0].case_type == 'p') {
                        document.querySelectorAll('.bodydiv tr.heading')[0].innerHTML = '<td width="30px">Sr.</td>\
                        <td width="175px">Case No.</td>\
                        <td width="">Applicant Name</td>\
                        <td width="">Project Name</td>\
                        <td width="220px">Hearing For</td>';
                        var trtd = "";
                        var srno = 1;
                        jsonData.forEach(function (item) {
                            trtd += "<tr> \
                                    <td>"+ srno++ + "</td>\
                                    <td>"+ item.case_number + "<span class=\"publish_time\" style=\"display:none;color:red\">" + item.publish_time + "</span></td>\
                                    <td>"+ item.applicant_name + "</td>\
                                    <td>"+ item.project_name + "</td>\
                                    <td>"+ item.case_brief + "</td>\
                                </tr>";
                        })
                        document.querySelectorAll('.bodydiv tbody.data')[0].innerHTML = trtd;
                    }
                    //**************end project updation part*********** */

                    // ********** if the data is for complaint then *****************
                    if (jsonData[0].case_type == 'c') {
                        document.querySelectorAll('.bodydiv tr.heading')[0].innerHTML = '<td width="30px">Sr.</td>\
                        <td width="175px">Case No.</td>\
                        <td width="">Applicant Name</td>\
                        <td width="">Respondent Name</td>\
                        <td width="">Project Name</td>\
                        <td width="220px">Hearing For</td>';
                        var trtd = "";
                        var srno = 1;
                        jsonData.forEach(function (item) {
                            trtd += "<tr> \
                                    <td>"+ srno++ + "</td>\
                                    <td>"+ item.case_number + "<span class=\"publish_time\" style=\"display:none;color:red\">" + item.publish_time + "</span></td>\
                                    <td>"+ item.applicant_name + "</td>\
                                    <td>"+ item.respondent_name + "</td>\
                                    <td>"+ item.project_name + "</td>\
                                    <td>"+ item.case_brief + "</td>\
                                </tr>";
                        })
                        document.querySelectorAll('.bodydiv tbody.data')[0].innerHTML = trtd;
                    }
                    //**************end complaint updation part*********** */

                    // ********** if the data is for Agent then *****************
                    if (jsonData[0].case_type == 'a') {
                        document.querySelectorAll('.bodydiv tr.heading')[0].innerHTML = '<td width="30px">Sr.</td>\
                        <td width="175px">Case No.</td>\
                        <td width="">Applicant Name</td>\
                        <td width="220px">Hearing For</td>';
                        var trtd = "";
                        var srno = 1;
                        jsonData.forEach(function (item) {
                            trtd += "<tr> \
                                    <td>"+ srno++ + "</td>\
                                    <td>"+ item.case_number + "<span class=\"publish_time\" style=\"display:none;color:red\">" + item.publish_time + "</span></td>\
                                    <td>"+ item.applicant_name + "</td>\
                                    <td>"+ item.case_brief + "</td>\
                                </tr>";
                        })
                        document.querySelectorAll('.bodydiv tbody.data')[0].innerHTML = trtd;
                    }
                    //**************end agent updation part*********** */

                    //repeating table header over the top of the screen 
                    document.querySelectorAll(".headeronly")[0].innerHTML = document.querySelectorAll(".bodydiv")[0].innerHTML;

                    //following function is called when the number of row is more then screen space
                    if (document.querySelectorAll(".bodydiv .data")[0].clientHeight >= 418)
                        marqueeWhenRequired();
                    else
                        document.querySelectorAll(".bodydiv .data")[0].style.animation = "none";

                    console.log('updated successfully');
                }

            }
        }
        function Ajax_updateData() {
            var publish_time = document.querySelectorAll('.publish_time')[0].innerText;
            xhttp.open("GET", "get_causelist_data.php?court_num=<?php echo $_GET['court_num'] ?>&publish_time=" + publish_time, false);
            xhttp.send();
            setTimeout(Ajax_updateData, (60 * 1000));  // min * sec * one sec
        }


        Ajax_updateData();
        // *********** End Ajax Data feching module***********************


        /************************************************ */
        //reapiting table header over the top of the screen 
        document.querySelectorAll(".headeronly")[0].innerHTML = document.querySelectorAll(".bodydiv")[0].innerHTML;

        // for changing the screen mode into full screen on clicking one the fullscreen button
        function openfullscreen() {

            var elem = document.documentElement;

            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.webkitRequestFullscreen) { /* Safari */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) { /* IE11 */
                elem.msRequestFullscreen();
            }
        }
    </script>

</body>

</html>