<?php
include "lib_session_mgr.php";
include_once 'lib_dbConnection.php';

if (isset($_GET['signout']))
  logout_clear_session();

validate_or_redirect();

if (isset($_POST['submit'])) {
  $_POST['user_id'] = $_SESSION['user_id'];
  if (insertq("causelist_data", $_POST))
    header('Location: ' . 'addnewcase.php?success');
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
                Case Added For Hearing successfully.
              </p>
            </div>
            <script>setTimeout(function () { document.querySelectorAll('#alert2')[0].click(); }, 4000)</script>
            <?php
          }
          ?>
          <div
            class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
            <div class="title-bar mdl-card__title mdl-card--expand mdl-color--teal-300">
              <h2 class="mdl-card__title-text"> <i class="mdl-color-text--blue-grey-400 material-icons"
                  role="presentation">add</i> Add New Case Into Causelist </h2>
            </div>
            <div class="mdl-card__supporting-text mdl-color-text--grey-800">

              <!-- ******* form handling javascript / validations ********** -->
              <script>
                function case_type_change(val) {
                  // for condition input fields based on type of case ie project agent complaint
                  // uniform the state of both the textboxes
                  document.querySelectorAll(".respondent_name")[0].style.display = "inline-block";
                  document.querySelectorAll(".project_name")[0].style.display = "inline-block";

                  if (val == "p") {
                    document.querySelectorAll(".respondent_name")[0].style.display = "none";
                    document.forms[0].elements[6].value='';
                  }

                  if (val == "a") {
                    document.querySelectorAll(".respondent_name")[0].style.display = "none";
                    document.forms[0].elements[6].value='';
                    document.querySelectorAll(".project_name")[0].style.display = "none";
                    document.forms[0].elements[7].value=''
                  }

                }

                function validate_form() {

                  for (i = 0; i < document.forms[0].elements.length; i++) {
                    if (document.forms[0].elements[i].name == "submit")
                      continue;

                    if (document.forms[0].elements[i].value == "" && document.forms[0].elements[i].parentElement.style.display!="none")
                      document.querySelectorAll("div." + document.forms[0].elements[i].name)[0].classList.add("is-invalid");
                    else
                      document.querySelectorAll("div." + document.forms[0].elements[i].name)[0].classList.remove("is-invalid");
                  }

                  document.forms[0].setAttribute("onchange","validate_form()")

                  if (document.querySelectorAll('div.is-invalid').length > 0)
                    return false;
                  else
                    return true;
                }
              </script>

              <!-- auto complete code -->
              <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
              <!-- following lib is already defined in page_header -->
              <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
              <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
              <script>
                $(function () {
                  var availableTags = [
                    "ActionScript",
                    "AppleScript",
                    "Asp",
                    "BASIC",
                    "C",
                    "C++",
                    "Clojure",
                    "COBOL",
                    "ColdFusion",
                    "Erlang",
                    "Fortran",
                    "Groovy",
                    "Haskell",
                    "Java",
                    "JavaScript",
                    "Lisp",
                    "Perl",
                    "PHP",
                    "Python",
                    "Ruby",
                    "Scala",
                    "Scheme"
                  ];
                  $("#applicant_name").autocomplete({
                    source: availableTags
                  });
                });
              </script>
              <!-- end auto complete code -->

              <!-- New case data entry form -->
              <form action="" method="POST" onsubmit="return validate_form()">

                <div class="case_type mdl-textfield is-dirty mdl-textfield--floating-label">
                  <select name="case_type" tabindex="1" id="case_type" onchange="case_type_change(this.value)">
                    <option value="p">Project</option>
                    <option value="a">Agent</option>
                    <option value="c" selected>Complaint</option>
                  </select>
                  <label class="mdl-textfield__label" for="bench_name">Case Type</label>
                  <span class="mdl-textfield__error">Cannot Left Blank</span>
                </div>

                <div class="bench_name mdl-textfield is-dirty mdl-textfield--floating-label">
                  <select tabindex="1"  name="bench_name" id="bench_name">
                    <option value="">--Select Bench Name--</option>
                    <option value="RERA Authority">Real Estate Regulatory Authority</option>
                    <option value="Enforcement Committee">Enforcement Committee</option>
                    <option value="Registration Committee">Registration Committee</option>
                    <option value="Shri S.S. Rajput">Hon'ble Member (Shri S.S. Rajput)</option>
                    <option value="Shrimati Rashmi Agrawal">Hon'ble Member (Smt. Rashmi Agrawal)</option>
                    <option value="Adjudicating Officer(Shri S.K. Srivastava)">Adjudicating Officer(Shri S.K. Srivastava)</option>
                    <option value="Adjudicating Officer(Shri Y.K. Gupta)">Adjudicating Officer(Shri Y.K. Gupta)</option>
                    <option value="Shri Neeraj Dubey">Secretary RERA</option>
                    <option value="Shri H.P. Verma">Dept. Secretary Complaint</option>
                  </select>
                  <label class="mdl-textfield__label" for="bench_name">Hearing In Front Of</label>
                  <span class="mdl-textfield__error">Cannot Left Blank</span>
                </div>

                <div class="court_num mdl-textfield is-dirty mdl-textfield--floating-label">
                  <select tabindex="1"  name="court_num" id="court_num">
                    <option value="">--Select Court--</option>
                    <option value="Court-1">Court-1 (सुनवाई कक्ष क्र.1)</option>
                    <option value="Court-2">Court-2 (सुनवाई कक्ष क्र.2)</option>
                    <option value="Court-3">Court-3 (सुनवाई कक्ष क्र.3)</option>
                    <option value="Court-4">Court-4 (सुनवाई कक्ष क्र.4)</option>
                  </select>
                  <label class="mdl-textfield__label" for="court_num">Court Number</label>
                  <span class="mdl-textfield__error">Cannot Left Blank</span>
                </div>

                <div class="next_date mdl-textfield mdl-textfield--floating-label is-dirty">
                  <!-- <span>Hearing Date</span> -->
                  <input tabindex="1"  class="mdl-textfield__input" name="next_date" type="date" id="next_date">
                  <label class="mdl-textfield__label" for="next_date">Next Hearing Date</label>
                </div>

                <div class="case_number mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input tabindex="1"  class="mdl-textfield__input" name="case_number" type="text" pattern=".{3,20}"
                    id="case_number">
                  <label class="mdl-textfield__label" for="case_number">
                    Case No.</label>
                  <span class="mdl-textfield__error">Enter Valid RERA Number (2545256584 / M-BPL-19-201 /
                    EX-M-BPL-19-201)</span>
                </div>

                <div class="applicant_name mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input tabindex="1"  class="mdl-textfield__input" name="applicant_name" type="text" pattern="[A-Za-z0-9.\-\(\) ]{4,50}"
                    id="applicant_name">
                  <label class="mdl-textfield__label" for="applicant_name">Applicant Name</label>
                  <span class="mdl-textfield__error">Enter Valid String For Name</span>
                </div>

                <div class="respondent_name mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input tabindex="1"  class="mdl-textfield__input" name="respondent_name" type="text" pattern="[A-Za-z0-9.,\-/\\()& ]{4,50}"
                    id="respondent_name">
                  <label class="mdl-textfield__label" for="respondent_name">Respondent Name</label>
                  <span class="mdl-textfield__error">Enter Valid String For Name</span>
                </div>

                <div class="project_name mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input tabindex="1"  class="mdl-textfield__input" name="project_name" type="text" pattern="[A-Za-z0-9.,\-/\\()& ]{4,50}"
                    id="project_name">
                  <label class="mdl-textfield__label" for="project_name">Project Name</label>
                  <span class="mdl-textfield__error">Enter Valid String For Name</span>
                </div>

                <div class="case_brief mdl-textfield is-dirty mdl-textfield--floating-label">
                  <select tabindex="1"  name="case_brief" id="case_brief">
                    <option value="">--Select--</option>
                    <option value="Reply">Reply</option>
                    <option value="Argument">Argument</option>
                    <option value="Reply & Argument">Reply & Argument</option>
                    <option value="Final Argument">Final Argument</option>
                    <option value="Reserve For Final Order">Reserve For Final Order</option>
                    <option value="Document Submission">Document Submission</option>
                    <option value="Appearance of Non Applicant">Appearance of Non Applicant</option>
                    <option value="Appearance of Applicant">Appearance of Applicant</option>
                    <option value="Appearance of the Parties">Appearance of the Parties</option>
                  </select>
                  <label class="mdl-textfield__label" for="case_brief">Brief of Case</label>
                  <span class="mdl-textfield__error">Cannot Left Blank</span>
                </div>

                <div class="mdl-card__actions mdl-card--border">
                  <input tabindex="1"  name="submit" type="submit" class="mdl-button mdl-button--raised mdl-button--accent"
                    value="Save">
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