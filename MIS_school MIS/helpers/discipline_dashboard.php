<?php
    include('helpers/styles.php');
?>

<!-- normal teacher interface -->

<div class="w3-container">
    <h2 class="w3-center"><?php echo "$usertype interface";?></h2>
</div>
<div>
    <div class="w3-row">
        <div class="w3-col m3">
            <div class="w3-bar-block">
                <button class="w3-bar-item w3-green-hover navitem w3-green" onclick="(navigateTabs(this))">your students</button>
                <button class="w3-bar-item w3-green-hover navitem" onclick="(navigateTabs(this))">fellow teachers</button>
                <button class="w3-bar-item w3-green-hover navitem" onclick="(navigateTabs(this))">all teachers</button>
                <button class="w3-bar-item w3-green-hover navitem" onclick="(navigateTabs(this))">all cases</button>
            </div>
        </div>
        <div class="w3-col m9 sidecontent w3-border">
            <div class="panels" id="mystudents">

                <h3>Showing students for <?php echo $userclass; ?> </h3>

                <?php
                    include('connect.php');
                    $pendingSql = "SELECT * FROM students WHERE student_class = '$userclass'";
                    $allstudents = $conn->query($pendingSql);

                    $rows = $allstudents -> num_rows;
                    echo "<span class=\"w3-tag w3-green\">$rows record(s)</span>";

                    if($allstudents){
                        echo '<table class="w3-table w3-bordered w3-light-grey">';
                        echo '
                        <tr class="w3-green">
                            <th>student ID</th><th>student name</th><th>assigned class</th><th>paid fees</th><th>total fees</th>
                        </tr>';

                        while ($row = $allstudents->fetch_assoc()) {
                            echo '<tr id="myStudentRecord'.$row['student_id'].'">';
                            echo '<td>' . $row['student_id'] . '</td>';
                            echo '<td>' . $row['student_name'] . '</td>';
                            echo '<td>' . $row['student_class'] . '</td>';
                            echo '<td>' . $row['student_fees'] . '</td>';
                            echo '<td>' . $row['student_required_fees'] . '</td>';
                            echo '</tr>';
                        }

                        echo '</table>';
                    } else {
                        echo "<div class=\"w3-center w3-padding-32\"><br><i>There was an error finding the students' records</i></div>";
                    }

                    echo '<div class="w3-padding-32"><h3>All students</h3></div>';
                    include('connect.php');
                    $pendingSql = "SELECT * FROM students";
                    $allstudents = $conn->query($pendingSql);

                    $rows = $allstudents -> num_rows;
                    echo "<span class=\"w3-tag w3-green\">$rows record(s)</span>";

                    if($allstudents){
                        echo '<table class="w3-table w3-bordered w3-light-grey">';
                        echo '
                        <tr class="w3-green">
                            <th>student ID</th><th>student name</th><th>assigned class</th><th>paid fees</th><th>total fees</th>
                        </tr>';

                        while ($row = $allstudents->fetch_assoc()) {
                            echo '<tr id="studentRecord'.$row['student_id'].'">';
                            echo '<td>' . $row['student_id'] . '</td>';
                            echo '<td>' . $row['student_name'] . '</td>';
                            echo '<td>' . $row['student_class'] . '</td>';
                            echo '<td>' . $row['student_fees'] . '</td>';
                            echo '<td>' . $row['student_required_fees'] . '</td>';
                            echo '<td><button onclick="reportstudent('.$row['student_id'].')" class="w3-button w3-green">report student</button></td>';
                            echo '</tr>';
                        }

                        echo '</table>';
                    } else {
                        echo "<div class=\"w3-center w3-padding-32\"><br><i>There was an error finding the students' records</i></div>";
                    }
                ?>
            </div>

            <div class="panels w3-hide">
                <h3>Showing teachers also assigned to <?php echo $userclass; ?> </h3>

                <?php
                    // users table has the fields (user_id 	user_name 	user_password 	user_type 	)
                    include('connect.php');
                    $pendingSql = "SELECT * FROM users WHERE user_class = '$userclass'";
                    $allteachers = $conn->query($pendingSql);

                    $rows = $allteachers -> num_rows;
                    echo "<span class=\"w3-tag w3-green\">$rows record(s)</span>";

                    if($allteachers){
                        echo '<table class="w3-table w3-bordered w3-light-grey">';
                        echo '
                        <tr class="w3-green">
                            <th>user ID</th><th>teacher name</th><th>assigned class</th><th>user type</th>
                        </tr>';

                        while ($row = $allteachers->fetch_assoc()) {
                            echo '<tr id="teacherRecord'.$row['user_id'].'">';
                            echo '<td>' . $row['user_id'] . '</td>';
                            echo '<td>' . $row['user_name'] . '</td>';
                            echo '<td>' . $row['user_class'] . '</td>';
                            echo '<td>' . $row['user_type'] . '</td>';
                            echo '</tr>';
                        }

                        echo '</table>';
                    } else {
                        echo "<div class=\"w3-center w3-padding-32\"><br><i>there are no teachers in your class</i></div>";
                    }
                ?>

            </div>

            <div class="panels w3-hide">

                <h3>Showing all registered teachers</h3>
                <?php
                    // users table has the fields (user_id 	user_name 	user_password 	user_type 	)
                    include('connect.php');
                    $pendingSql = "SELECT * FROM users";
                    $allteachers = $conn->query($pendingSql);

                    $rows = $allteachers -> num_rows;
                    echo "<span class=\"w3-tag w3-green\">$rows record(s)</span>";

                    if($allteachers){
                        echo '<table class="w3-table w3-bordered w3-light-grey">';
                        echo '
                        <tr class="w3-green">
                            <th>user ID</th><th>teacher name</th><th>assigned class</th>
                        </tr>';

                        while ($row = $allteachers->fetch_assoc()) {
                            echo '<tr id="teacherRecord'.$row['user_id'].'">';
                            echo '<td>' . $row['user_id'] . '</td>';
                            echo '<td>' . $row['user_name'] . '</td>';
                            echo '<td>' . $row['user_class'] . '</td>';
                            echo '</tr>';
                        }

                        echo '</table>';
                    } else {
                        echo "<div class=\"w3-center w3-padding-32\"><br><i>there are no teachers in your class</i></div>";
                    }
                ?>


            </div>

            <div class="panels w3-hide" id="thecases">
            <h3>Showing all pending cases</h3>
                <?php
                    // cases table has the fields (case_id 	student_id 	student_name 	case_description 	case_state)
                    include('connect.php');
                    $pendingSql = "SELECT * FROM cases WHERE case_state = 'pending'";
                    $allteachers = $conn->query($pendingSql);

                    $rows = $allteachers -> num_rows;
                    echo "<span class=\"w3-tag w3-green\">$rows record(s)</span>";

                    if($allteachers && $rows > 0){
                        echo '<table class="w3-table w3-bordered w3-light-grey">';
                        echo '
                        <tr class="w3-green">
                            <th>case ID</th><th>student id</th><th>description</th><th>state</th><th>extra actions</th>
                        </tr>';

                        while ($row = $allteachers->fetch_assoc()) {
                            echo '<tr id="caseRecord'.$row['case_id'].'">';
                            echo '<td>' . $row['case_id'] . '</td>';
                            echo '<td>' . $row['student_id'] . '</td>';
                            echo '<td>' . $row['case_description'] . '</td>';
                            echo '<td>' . $row['case_state'] . '</td>';
                            echo '<td><button onclick="resolvecase('.$row['case_id'].')" class="w3-button w3-green">mark as resolved</button></td>';
                            echo '</tr>';
                        }

                        echo '</table>';
                    } else {
                        echo "<div class=\"w3-center w3-padding-32\"><br><i>there are no cases so far</i></div>";
                    }

                    echo '<h3 class="w3-container w3-padding-32">all solved cases</h3>';

                    $pendingSql = "SELECT * FROM cases WHERE case_state = 'resolved'";
                    $allteachers = $conn->query($pendingSql);

                    $rows = $allteachers -> num_rows;
                    echo "<span class=\"w3-tag w3-green\">$rows record(s)</span>";

                    if($allteachers && $rows > 0){
                        echo '<table class="w3-table w3-bordered w3-light-grey">';
                        echo '
                        <tr class="w3-green">
                            <th>case ID</th><th>student id</th><th>description</th>
                            <th>state</th><th>punishment</th>
                        </tr>';

                        while ($row = $allteachers->fetch_assoc()) {
                            echo '<tr id="caseRecord'.$row['case_id'].'">';
                            echo '<td>' . $row['case_id'] . '</td>';
                            echo '<td>' . $row['student_id'] . '</td>';
                            echo '<td>' . $row['case_description'] . '</td>';
                            echo '<td>' . $row['case_state'] . '</td>';
                            echo '<td>' . $row['case_punishment'] . '</td>';
                            echo '</tr>';
                        }

                        echo '</table>';
                    } else {
                        echo "<div class=\"w3-center w3-padding-32\"><br><i>there are no resolved cases so far</i></div>";
                    }
                ?>
            </div>

            <div class="panels w3-hide" id="addcase">
                <h3>add case</h3>

                <form action="helpers/addcase.php">
                    <input type="hidden" name="student_id" value="0" placeholder="enter student_id">
                    <br><span>enter the student's name here</span><br>
                    <input type="text" name="student_name"value="" placeholder="enter student_name" required>
                    <br><span>enter the case description here</span><br>
                    <textarea type="text" name="case_description" value="" placeholder="enter case_description" required></textarea>
                    <br><span></span><br>
                    <button type="submit" class="w3-button w3-green w3-black-hover">add case</button>
                </form>
            </div>

            <div class="panels w3-hide" id="resolvecase">
                <form action="helpers/resolvecase.php">
                    <input type="hidden" name="case_id" value="0">
                    <br><span>what punishment was given?</span><br>
                    <textarea type="text" name="case_punishment" required></textarea>
                    <button type="submit" class="w3-button w3-green w3-black-hover">resolve case</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // for the changing tabs
    var navbuttons = document.querySelectorAll('.navitem');
    var navtabs = document.querySelectorAll('.panels');

    var studentSection = document.querySelector('#mystudents');
    var caseEditorform = document.querySelector('#addcase');
    var resolvesection = document.querySelector('#resolvecase');
    var casessection = document.querySelector('#thecases');

    function navigateTabs(item){
        let classes = '';
        for (let x = 0; x < navbuttons.length; x++) {
            classes = navbuttons[x].classList.toString();
            if(navbuttons[x] == item){
                navbuttons[x].classList.add("w3-green");
                navtabs[x].classList.remove("w3-hide");
            } else {
                navbuttons[x].classList.remove("w3-green");
                navtabs[x].classList.add("w3-hide");
            }
        }
    }

    // for the form that reports students (adds a case)
    function reportstudent(b){
        let therecord = document.querySelector("#studentRecord"+b);

        studentSection.classList.add("w3-hide");
        caseEditorform.classList.remove("w3-hide");

        document.forms[0].student_id.value = therecord.childNodes[0].innerText;     // get the record for id
        document.forms[0].student_name.value = therecord.childNodes[1].innerText;   // get the record for the name
        // document.forms[0].student_class.value = therecord.childNodes[2].innerText;  // get the record for the class
        // document.forms[0].student_fees.value = therecord.childNodes[3].innerText;  // get the record for the user type
    }

    function resolvecase(b) {
        let therecord = document.querySelector("#studentRecord"+b);

        casessection.classList.add("w3-hide");
        resolvesection.classList.remove("w3-hide");

        document.forms[1].case_id.value = b;
    }

</script>