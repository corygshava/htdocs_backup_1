<?php
include('styles.php');
?>
<div class="w3-container">
    <h2 class="w3-center"><?php echo "$usertype interface";?></h2>
</div>
<div>
    <div class="w3-row">
        <div class="w3-col m3">
            <div class="w3-bar-block">
                <button class="w3-bar-item w3-blue-hover navitem w3-blue" data-tab="admissions" onclick="navigateTabs(this)" id="mainbtn">Admissions</button>
                <button class="w3-bar-item w3-blue-hover navitem" data-tab="students" onclick="navigateTabs(this)">students</button>
                <button class="w3-bar-item w3-blue-hover navitem" data-tab="teachers" onclick="navigateTabs(this)">teachers</button>
                <button class="w3-bar-item w3-blue-hover navitem" data-tab="teachers" onclick="navigateTabs(this)">cases</button>
            </div>
        </div>
        <div class="w3-col m9 sidecontent w3-border">
            <div class="panels" id="admissions">
                <h3>admit a new student</h3>
                <p>the student's records will be updated in case they already exist</p>
                <form action="helpers/admitstudent.php" method="post">
                    <input type="text" name="student_name" placeholder="enter the student's name here" required>
                    <select name="student_class" required onchange="changefee(this.value);">
                        <option value="form 1" name="item1" data-price="15000" selected>form 1</option>
                        <option value="form 2" name="item2" data-price="20000">form 2</option>
                        <option value="form 3" name="item3" data-price="25000">form 3</option>
                        <option value="form 4" name="item4" data-price="30000">form 4</option>
                    </select>
                    <input type="number" name="student_fees" placeholder="how much fees has the student paid?" required>
                    <input type="hidden" name="student_total_fees" placeholder="how much fees has the student paid?" required>
                    <input type="number" name="student_total_fees2" placeholder="how much fees for the chosen class" required disabled>
                    <button type="submit" class="w3-button w3-grey w3-hover-blue">admit student / modify details</button>
                </form>
            </div>

            <div class="panels w3-hide" id="students">
                <?php
                    // students table has the fields (student_id	student_name	student_class	student_fees	student_required_fees 	)
                    // echo "<h3>records of all students</h3>";
                    include('connect.php');
                    $pendingSql = "SELECT * FROM students";
                    $allstudents = $conn->query($pendingSql);

                    $rows = $allstudents -> num_rows;
                    echo "<h3>records of all students</h3><span class=\"w3-tag w3-blue\">$rows record(s)</span>";

                    if($allstudents){
                        echo '<table class="w3-table w3-bordered w3-light-grey">';
                        echo '
                        <tr class="w3-blue">
                            <th>student ID</th><th>student name</th><th>assigned class</th><th>paid fees</th><th>total fees</th>
                        </tr>';

                        while ($row = $allstudents->fetch_assoc()) {
                            echo '<tr id="studentRecord'.$row['student_id'].'">';
                            echo '<td>' . $row['student_id'] . '</td>';
                            echo '<td>' . $row['student_name'] . '</td>';
                            echo '<td>' . $row['student_class'] . '</td>';
                            echo '<td>' . $row['student_fees'] . '</td>';
                            echo '<td>' . $row['student_required_fees'] . '</td>';
                            echo '<td><button onclick="editstudent('.$row['student_id'].')" class="w3-button w3-blue">edit details</button></td>';
                            echo '</tr>';
                        }

                        echo '</table>';
                    } else {
                        echo "<div class=\"w3-center w3-padding-32\"><br><i>There was an error finding the students' records</i></div>";
                    }
                ?>
            </div>

            
            <div class="panels w3-hide" id="teachers">
                <?php
                    // users table has the fields (user_id 	user_name 	user_password 	user_type 	)
                    include('connect.php');
                    $pendingSql = "SELECT * FROM users";
                    $allteachers = $conn->query($pendingSql);

                    $rows = $allteachers -> num_rows;
                    echo "<h3>records of all teachers</h3><span class=\"w3-tag w3-blue\">$rows record(s)</span>";

                    if($allteachers){
                        echo '<table class="w3-table w3-bordered w3-light-grey">';
                        echo '
                        <tr class="w3-blue">
                            <th>user ID</th><th>teacher name</th><th>assigned class</th><th>user type</th><th>xtra actions</th>
                        </tr>';

                        while ($row = $allteachers->fetch_assoc()) {
                            echo '<tr id="teacherRecord'.$row['user_id'].'">';
                            echo '<td>' . $row['user_id'] . '</td>';
                            echo '<td>' . $row['user_name'] . '</td>';
                            echo '<td>' . $row['user_class'] . '</td>';
                            echo '<td>' . $row['user_type'] . '</td>';
                            echo '<td><button onclick="editteacher('.$row['user_id'].')" class="w3-button w3-blue">edit details</button></td>';
                            echo '</tr>';
                        }

                        echo '</table>';
                    } else {
                        echo "<div class=\"w3-center w3-padding-32\"><br><i>There are no teachers records available</i></div>";
                    }
                ?>
            </div>

            <div class="panels w3-hide">
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
                            <th>user ID</th><th>teacher name</th><th>assigned class</th>
                        </tr>';

                        while ($row = $allteachers->fetch_assoc()) {
                            echo '<tr id="teacherRecord'.$row['user_id'].'">';
                            echo '<td>' . $row['case_id'] . '</td>';
                            echo '<td>' . $row['student_id'] . '</td>';
                            echo '<td>' . $row['case_description'] . '</td>';
                            echo '<td>' . $row['case_state'] . '</td>';
                            echo '</tr>';
                        }

                        echo '</table>';
                    } else {
                        echo "<div class=\"w3-center w3-padding-32\"><br><i>there are no cases so far</i></div>";
                    }

                    echo '<h3>all solved cases</h3>';

                    $pendingSql = "SELECT * FROM cases WHERE case_state = 'resolved'";
                    $allteachers = $conn->query($pendingSql);

                    $rows = $allteachers -> num_rows;
                    echo "<span class=\"w3-tag w3-green\">$rows record(s)</span>";

                    if($allteachers && $rows > 0){
                        echo '<table class="w3-table w3-bordered w3-light-grey">';
                        echo '
                        <tr class="w3-green">
                            <th>user ID</th><th>student id</th><th>description</th>
                            <th>state</th><th>punishment</th>
                        </tr>';

                        while ($row = $allteachers->fetch_assoc()) {
                            echo '<tr id="teacherRecord'.$row['user_id'].'">';
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

            <div class="panels w3-hide" id="teacheditor">
                <button class="w3-right w3-button w3-red" onclick="hideteacheditor()">X</button>
                <h3>Edit teacher details</h3>
                <p>Change the values below to whichever you want</p>

                <form action="helpers/editteacher.php" method="post">
                    <input type="hidden" name="teacher_id" placeholder="enter the teacher's userid">
                    <br><span>teacher's name</span><br>
                    <input type="text" name="teacher_name" placeholder="enter the teacher's name here" required>
                    <br><span>teacher's class</span><br>
                    <select name="teacher_class" required>
                        <option value="form 1" name="item1" selected>form 1</option>
                        <option value="form 2" name="item2">form 2</option>
                        <option value="form 3" name="item3">form 3</option>
                        <option value="form 4" name="item4">form 4</option>
                    </select>
                    <br><span>teacher's type</span><br>
                    <select name="teacher_type" required>
                        <option value="teacher" name="item1" selected>teacher</option>
                        <option value="admin" name="item2">admin</option>
                        <option value="disciplineMaster" name="item3">disciplineMaster</option>
                    </select>
                    <button type="submit" class="w3-button w3-grey w3-hover-blue">submit data</button>
                </form>
            </div>

            <div class="panels w3-hide" id="studeditor">
                <button class="w3-right w3-button w3-red" onclick="hideteacheditor()">X</button>
                <h3>Edit student details</h3>
                <form action="helpers/editstudent.php" method="post">
                    <input type="hidden" name="student_id" value="0">

                    <br><span>the student's name :</span><br>
                    <input type="text" name="student_name" placeholder="enter the student's name here" required>

                    <br><span>the class :</span><br>
                    <select name="student_class" required onchange="changefee2(this.value,document.forms[2].student_total_fees);changefee2(this.value,document.forms[2].student_total_fees2)">
                        <option value="form 1" selected>form 1</option>
                        <option value="form 2">form 2</option>
                        <option value="form 3">form 3</option>
                        <option value="form 4">form 4</option>
                    </select>

                    <br><span>fees paid :</span><br>
                    <input type="number" name="student_fees" placeholder="how much fees has the student paid?" required>
                    <input type="hidden" name="student_total_fees" placeholder="how much fees has the student paid?" required>
                    
                    <br><span>total fees :</span><br>
                    <input type="number" name="student_total_fees2" placeholder="how much fees for the chosen class (change class to update)" required disabled>
                    <button type="submit" class="w3-button w3-grey w3-hover-blue">save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // get elements from the form
    var totalfees = document.forms[0].student_total_fees;
    var totalfees2 = document.forms[0].student_total_fees2;
    var options = document.forms[0].student_class.querySelectorAll('option');
    var selectInput = document.forms[0].student_class;

    // for the changing tabs
    var navbuttons = document.querySelectorAll('.navitem');
    var navtabs = document.querySelectorAll('.panels');

    //editor forms
    var editorform = document.querySelector("#teacheditor");
    var studeditorform = document.querySelector("#studeditor");

    //panels
    var teachersSection = document.querySelector("#teachers");
    var studentSection = document.querySelector("#students");

    // change the price input based on the class option chosen
    function changefee(what) {
        what = what.toUpperCase();
        switch (what) {
            case "FORM 1":
                theindex = 0;
                break;
            case "FORM 2":
                theindex = 1;
                break;
            case "FORM 3":
                theindex = 2;
                break;
            default:
                theindex = 3;
                break;
        }
        totalfees.value = options[theindex].dataset.price;
        totalfees2.value = options[theindex].dataset.price;
    }

    function changefee2(what,who) {
        what = what.toUpperCase();
        switch (what) {
            case "FORM 1":
                theindex = 0;
                break;
            case "FORM 2":
                theindex = 1;
                break;
            case "FORM 3":
                theindex = 2;
                break;
            default:
                theindex = 3;
                break;
        }
        who.value = options[theindex].dataset.price;
    }

    function navigateTabs(item){
        let classes = '';
        for (let x = 0; x < navbuttons.length; x++) {
            classes = navbuttons[x].classList.toString();
            if(navbuttons[x] == item){
                navbuttons[x].classList.add("w3-blue");
                navtabs[x].classList.remove("w3-hide");
            } else {
                navbuttons[x].classList.remove("w3-blue");
                navtabs[x].classList.add("w3-hide");
            }
        }
        
    }

    // for the form that changes teacher details
    function editteacher(b){
        let therecord = document.querySelector("#teacherRecord"+b);

        teachersSection.classList.add("w3-hide");
        editorform.classList.remove("w3-hide");

        document.forms[1].teacher_id.value = therecord.childNodes[0].innerText;     // get the record for id
        document.forms[1].teacher_name.value = therecord.childNodes[1].innerText;   // get the record for the name
        document.forms[1].teacher_class.value = therecord.childNodes[2].innerText;  // get the record for the class
        document.forms[1].teacher_type.value = therecord.childNodes[3].innerText;  // get the record for the user type
    }

    // hides the edit teacher form
    function hideteacheditor(){
        editorform.classList.add("w3-hide");
        teachersSection.classList.remove("w3-hide");
        studeditorform.classList.add("w3-hide");
    }

    // for the form that changes student details
    function editstudent(b){
        let therecord = document.querySelector("#studentRecord"+b);

        studentSection.classList.add("w3-hide");
        studeditorform.classList.remove("w3-hide");

        document.forms[2].student_id.value = therecord.childNodes[0].innerText;     // get the record for id
        document.forms[2].student_name.value = therecord.childNodes[1].innerText;   // get the record for the name
        document.forms[2].student_class.value = therecord.childNodes[2].innerText;  // get the record for the class
        document.forms[2].student_fees.value = therecord.childNodes[3].innerText;  // get the record for the user type
    }

    changefee(selectInput.value);
</script>
