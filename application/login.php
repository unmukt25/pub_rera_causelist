<?php
include "lib_session_mgr.php";

//validate_or_redirect(); // function defied in "lib_session_mgr.php"
check_and_createsession(); // if user press submit this function will check whether user id and password is correct
?>
<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<?php
include "_page_header.html";
?>
<script>document.querySelectorAll("title")[0].innerHTML = "CLMS Login Page";</script>

<body>
  <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <header class="stretch100 demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
      <div class="mdl-layout__header-row mdl-color-text--teal-300">
        <span class="material-icons">calendar_today</span>
        <span class="mdl-layout-title ">RERA Cause List Management System</span>
        <div class="mdl-layout-spacer"></div>

      </div>
    </header>

    <main class="stretch100 mdl-layout__content mdl-color--grey-100">
      <div class="mdl-grid demo-content">
        <div class="demo-cards mdl-grid mdl-grid--no-spacing">
          <div class="demo-updates mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
              <span class="material-icons">lock</span>
              <h2 class="vrtl-mdl mdl-card__title-text">
                User Login</h2>
            </div>
            <div class="mdl-card__supporting-text mdl-color-text--grey-600">
              <!-- Numeric Textfield with Floating Label -->
              <form action="login.php" method="POST">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input tabindex="4" class="mdl-textfield__input" type="text" pattern="-?[a-zA-Z0-9@]*?" id="user_id"
                    name="user_id">
                  <label class="mdl-textfield__label" for="user_id">UserID</label>
                  <span class="mdl-textfield__error">Invalid Character Input</span>
                </div>

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input tabindex="5" class="mdl-textfield__input" type="password" pattern="-?[a-zA-Z0-9@]*?" id="user_pwd"
                    name="user_pwd">
                  <label class="mdl-textfield__label" for="user_pwd">Password</label>
                  <span class="mdl-textfield__error">Invalid Character Input</span>
                </div>

                <div class="mdl-typography--text-right mdl-card__actions">
                  <!-- Colored raised button -->
                  <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-color--teal-300 ">
                    Sign In
                  </button>
                </div>
              </form>
              <span class="login-footer-heading">Presently Published Causelist</span>
              <div class="login-footer">
              <a tabindex="1" href="screen_layout.php?court_num=court-1" class="screen mdl-button ">Court-1 screen</a>
              <a tabindex="1" href="screen_layout.php?court_num=court-4" class="screen mdl-button ">Court-4 screen</a>
              <a tabindex="2" href="screen_layout.php?court_num=court-2" class="screen mdl-button ">Court-2 screen</a>
              <a tabindex="3" href="screen_layout.php?court_num=court-3" class="screen mdl-button ">Court-3 screen</a>
                <script>
                  // this code is to put focus on button for the purpose of tv screen remote operation
                  document.querySelectorAll(".screen.mdl-button")[0].focus();
                </script>
              </div>
            </div>

          </div>
          <div class="demo-separator mdl-cell--1-col">
          </div>
            
          </div>
        </div>
    </main>
  </div>

</body>

</html>