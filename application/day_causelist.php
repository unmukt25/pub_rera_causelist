<?php
include "lib_session_mgr.php";
include_once 'lib_dbConnection.php';

if (isset($_GET['signout']))
  logout_clear_session();

validate_or_redirect();

// if (isset($_GET['view'])) {
//   // after submit edit the records
//   //  delete function
//   $asso_array['tableName'] = 'causelist_data';
//   $asso_array['condition'] = 'bench_name=\'' . $_GET["bench_name"] . "\'and next_date='". $_GET["next_date"] ."'";
//   $ret_val = getTableData($asso_array);
//   if ($ret_val > 0)
//     header('Location: ' . 'modifylist.php?success');
// }

?>

<!doctype html>
<html lang="en">
<!-- ****************** page header *************** -->
<?php
include "_page_header.html";
?>
<!-- *******************end page header************* -->

<body>
  <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <?php include("_left_nav.html") ?>
    <main class="mdl-layout__content mdl-color--grey-100">
      <div class="mdl-grid demo-content">
        <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
          <!-- this class can be used for css checkbox in table tag:- mdl-data-table--selectable   -->
          <!-- ***************page action message is success or error*************** -->
          <?php
          if (isset($_GET['success'])) {
            ?>
            <link rel="stylesheet" href="css/alert_message.css">
            <div class="alert success">
              <input type="checkbox" id="alert2" />
              <label class="close" title="close" for="alert2">
                <i class="icon-remove"></i>
              </label>
              <p class="inner">
                Case Deleted successfully.
              </p>
            </div>
            <script>setTimeout(function () { document.querySelectorAll('#alert2')[0].click(); }, 4000)</script>
            <?php
          }
          ?>
          <!-- ***********************end message part******************************** -->
          <div
            class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
            <div class="title-bar mdl-card__title mdl-card--expand mdl-color--teal-300">
              <h2 class="mdl-card__title-text"> <i class="mdl-color-text--blue-grey-400 material-icons"
                  role="presentation">info</i>&nbsp; Causelist for Date : <?php echo date_format(date_create($_GET['next_date']),"d-F-Y")?> </h2>
            </div>
            <div class="mdl-card__supporting-text mdl-color-text--grey-800">

              <!-- working pane - modify case data form -->
              <form action="" method="POST" onchange="validate_form()" onsubmit="return validate_form()">
                <!--url to get jquery based paging table : https://datatables.net/ -->
                <!-- pager table -->
                <!-- css and js files has been defined under _page_header.html -->
                <script>
                  $(document).ready(function () {
                    $('#causelistTable').DataTable();
                  });

                  function deleteConfirm(id, caseno) {
                    return confirm("You are about to delete case no: " + caseno + " ; \n Are you sure!");
                  }
                </script>

                <table id="causelistTable" class="display" style="width:100%">
                  <thead>
                    <tr>
                      <th>SNo</th>
                      <th>Case No.</th>
                      <th>Applicant Name</th>
                      <th>Respondent Name</th>
                      <th>Hearing Date</th>
                      <th>Bench Name</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $table_name = 'causelist_data , (SELECT @a:= 0) AS a';
                    $field_names = '@a:=@a+1 `srno`, `id`, `next_date`, `bench_name`, `case_number`, `applicant_name`, `respondent_name` ';
                    $condition = '  bench_name=\'' . $_GET["bench_name"] . "' and next_date='". $_GET["next_date"] ."'";
                    $result = getTableData($table_name, $field_names, $condition);

                    if ($result->num_rows > 0) {
                      // output data of each row
                      while ($row = $result->fetch_assoc()) {

                        echo "<tr>
                      <td>" . $row['srno'] . "</td>
                      <td>" . $row['case_number'] . "</td>
                      <td>" . $row['applicant_name'] . "</td>
                      <td>" . $row['respondent_name'] . "</td>
                      <td>" . $row['next_date'] . "</td>
                      <td>" . $row['bench_name'] . "</td>
                      </tr>";
                        // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                      }
                    } else {
                      echo "0 results";
                    }
                    ?>

                  </tbody>

                </table>

                <div class="mdl-card__actions mdl-card--border">
                 
                </div>
              </form>

            </div>

          </div>
        </div>
      </div>
    </main>
  </div>
</body>

</html>