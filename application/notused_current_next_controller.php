<?php
include "lib_session_mgr.php";

validate_or_redirect(); // validating user or redirecting to login page

if (isset($_GET['logout'])) // logout button pressed !
    logout_clear_session();

if (isset($_GET['getdata'])) {
    include 'lib_dbConnection.php';

    $sql = "SELECT `day_sr`, `cmp_number`, `cmp_applicant`, `cmp_nonApplicant`, `curr_next` FROM `comp_causelist` where `court_num`='" . $_GET['court_num'] . "' and `list_date`='" . $_GET['list_date'] . "'  order by `day_sr` ";
    $result = $conn->query($sql);

    $datalist = "";
    $arr_of_arr = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $arr_of_arr[] = $row;
        }
        echo json_encode($arr_of_arr);
    }
    exit;
}

if (isset($_GET['setdata'])) {
    include 'lib_dbConnection.php';


    if (isset($_GET['next']))
        $curr_next = 2;
    if (isset($_GET['current']))
        $curr_next = 1;



    $sql = "UPDATE `comp_causelist` SET `curr_next`='' WHERE `court_num`='" . $_GET['court_num'] . "' and `list_date`='" . $_GET['list_date'] . "' and curr_next=" . $curr_next;
    $conn->query($sql);


    $sql = "UPDATE `comp_causelist` SET `curr_next`='" . $curr_next . "' WHERE `court_num`='" . $_GET['court_num'] . "' and `list_date`='" . $_GET['list_date'] . "' and `day_sr`=" . $_GET['srno'];

    $conn->query($sql);

    header('Location:current_next_controller.php');
    // header("HTTP/1.1 404 Not Found");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current Next Setter</title>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        .td_action {
            width: 140px;
        }


        td .action.Next {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 5px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 3px;
        }

        td .action.Current {
            background-color: #f18e27;
            /* Green */
            border: none;
            color: white;
            padding: 5px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 3px;
        }

        td a.action {
            padding: 5px 15px;
            text-decoration: none;
            font-size: 14px;
            color: black;
        }

        .button.logout {
            background-color: #ed0a0a;
            /* Green */
            border: none;
            color: white;
            padding: 5px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 3px;
            float: right;
        }

        .userid {
            text-transform: capitalize;
            padding: 4px;
            background-color: #3394f7;
            color: white;
            font-weight: bold;
            letter-spacing: 1px;
            border-radius: 4px;
            float: right;
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <span class='userid'>
        <?php echo $_SESSION['user_id'] ?>
    </span>
    <a href="current_next_controller.php?logout=yes" class="button logout">Log out </a>
    <table id="customers">
        <tr>
            <th>Sr.No</th>
            <th>Complaint Number</th>
            <th>Applicant</th>
            <th>Non Applicant</th>
            <th>Action</th>
        </tr>

        <tbody id="tableData">
            <!--to fill the data with jquery-->
        </tbody>

    </table>

    <script>


        var dt = new Date();
        dt = dt.getFullYear() + '-' + (dt.getMonth() + 1) + '-' + dt.getDate();
        var court_num = "<?php
        switch ($_SESSION["user_id"]) {
            case 'court1':
                echo 'court-1';
                break;
            case 'court2':
                echo 'court-2';
                break;
            case 'court3':
                echo 'court-3';
                break;
            case 'court4':
                echo 'court-4';
                break;
        }
        ?> ";

        var jsonData;
        var tdlist;
        var trlist;
        var cur_next_obj = {};
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                jsonData = JSON.parse(this.responseText);

                trlist = "";
                for (let i = 0; i < jsonData.length; i++) {

                    tdlist = "";
                    for (k in jsonData[i]) {
                        if (k == 'curr_next') {
                            cur_next_obj['current'] = cur_next_obj['next'] = '';

                            cur_next_obj['current'] = (jsonData[i][k] == 1) ? 'Current' : '';
                            cur_next_obj['next'] = (jsonData[i][k] == 2) ? 'Next' : '';

                            tdlist = tdlist + "<td class='td_action'>" +

                                "<a href='current_next_controller.php?setdata&current&srno=" + jsonData[i]['day_sr'] + "&court_num=" + court_num + "&list_date=" + dt + "' class='action " + cur_next_obj['current'] + "'>Current</a> <a href='current_next_controller.php?setdata&next&srno=" + jsonData[i]['day_sr'] + "&court_num=" + court_num + "&list_date=" + dt + "' class='action " + cur_next_obj['next'] + "'>Next</a>" + "</td>"; //to replace last column ie reply and argument with action buttons

                            continue;
                        }
                        tdlist = tdlist + "<td>" + jsonData[i][k] + "</td>";
                    }
                    trlist = trlist + "<tr>" + tdlist + "</tr>";
                }

                document.getElementById("tableData").innerHTML = trlist;
            }
        };


        xhttp.open("GET", "current_next_controller.php?getdata&court_num=" + court_num + "&list_date=" + dt, false);
        xhttp.send();
        /***********************end data fetching*********************************************/
    </script>

</body>

</html>