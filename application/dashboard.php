<?php
include "lib_session_mgr.php";
include_once 'lib_dbConnection.php';

if (isset($_GET['signout']))
  logout_clear_session();

validate_or_redirect();

if (isset($_POST['submit'])) {
  // after submit edit the records
}
if (isset($_GET['success'])) {
  ?>
  <link rel="stylesheet" href="css/alert_message.css">
  <div class="alert success">
    <input type="checkbox" id="alert2" />
    <label class="close" title="close" for="alert2">
      <i class="icon-remove"></i>
    </label>
    <p class="inner">
      Case Edited successfully.
    </p>
  </div>
  <script>setTimeout(function () { document.querySelectorAll('#alert2')[0].click(); }, 4000)</script>
  <?php
}
?>

<!doctype html>
<html lang="en">

<?php
include "_page_header.html";
?>

<body>
  <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <?php include("_left_nav.html") ?>
    <main class="mdl-layout__content mdl-color--grey-100">
      <div class="mdl-grid demo-content">
        <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
          <!-- this class can be used for css checkbox in table tag:- mdl-data-table--selectable   -->
          <div
            class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
            <div class="title-bar mdl-card__title mdl-card--expand mdl-color--teal-300">
              <h2 class="mdl-card__title-text"> <i class="mdl-color-text--blue-grey-400 material-icons"
                  role="presentation">info</i>&nbsp; Number Of Cases Listed On Various Dates </h2>
            </div>
            <div class="mdl-card__supporting-text mdl-color-text--grey-800">

              <!-- working pane - modify case data form -->
              <form action="" method="POST">
                <!--url to get jquery based paging table : https://datatables.net/ -->
                <!-- pager table -->
                <!-- css and js files has been defined under _page_header.html -->
                <script>
                  $(document).ready(function () {
                    $('#causelistTable').DataTable();
                  });

                </script>

                <table id="causelistTable" class="display" style="width:100%">
                  <thead>
                    <tr>
                      <th>Sr.No.</th>
                      <th>Bench Name</th>
                      <th>Court Number</th>
                      <th>Hearing Date</th>
                      <th>Case Count</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $table_name = ' causelist_data , (SELECT @a:= 0) AS a';
                    $field_names = ' @a:=@a+1 `srno`,`bench_name`,`next_date`,`court_num`, COUNT(*) `case_count`';
                    $condition = " 1 GROUP BY `bench_name`,`next_date`";
                    $result = getTableData($table_name, $field_names, $condition);

                    if ($result->num_rows > 0) {
                      // output data of each row
                      while ($row = $result->fetch_assoc()) {

                        echo "<tr>
                      <td>" . $row['srno'] . "</td>
                      <td>" . $row['bench_name'] . "</td>
                      <td>" . $row['court_num'] . "</td>
                      <td>" . $row['next_date'] . "</td>
                      <td>" . $row['case_count'] . "</td>
                      <td><a title='View Causelist' href='day_causelist.php?bench_name=" . $row['bench_name'] . "&next_date=" . $row['next_date'] . "'><i class=\"mdl-color-text--blue-500 material-icons\" role=\"presentation\">search</i></a>
                      <a title='Print' href='javascript:printlist(\"" . $row['next_date'] . "\",\"" . $row['bench_name'] . "\")'><i class=\"mdl-color-text--blue-500 material-icons\" role=\"presentation\">print</i></a></td>
                      </tr>";
                      }
                    } else {
                      echo "0 results";
                    }
                    ?>

                  </tbody>

                </table>


              </form>

            </div>

          </div>
        </div>
      </div>
    </main>
  </div>
  <iframe src="" id="printarea" style="display:none"></iframe>
  <script>
    function printlist(listdate, bench_name) {
      document.querySelectorAll("#printarea")[0].src = "print_causelist.php?bench_name="+bench_name+"&next_date="+listdate+"";
      // setTimeout(function () { document.querySelectorAll("#printarea")[0].contentWindow.print(); }, 100);
      document.querySelectorAll("#printarea")[0].onload=function(){document.querySelectorAll("#printarea")[0].contentWindow.print();}
    }
  </script>
</body>

</html>