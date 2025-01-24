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
                <button class="w3-bar-item w3-purple-hover navitem w3-purple" onclick="(navigateTabs(this))">your students</button>
                <button class="w3-bar-item w3-purple-hover navitem" onclick="(navigateTabs(this))">fellow teachers</button>
                <button class="w3-bar-item w3-purple-hover navitem" onclick="(navigateTabs(this))">all teachers</button>
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
                    echo "<span class=\"w3-tag w3-purple\">$rows record(s)</span>";

                    if($allstudents){
                        echo '<table class="w3-table w3-bordered w3-light-grey">';
                        echo '
                        <tr class="w3-purple">
                            <th>student ID</th><th>student name</th><th>assigned class</th><th>paid fees</th><th>total fees</th>
                        </tr>';

                        while ($row = $allstudents->fetch_assoc()) {
                            echo '<tr id="studentRecord'.$row['student_id'].'">';
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
                    echo "<span class=\"w3-tag w3-purple\">$rows record(s)</span>";

                    if($allteachers){
                        echo '<table class="w3-table w3-bordered w3-light-grey">';
                        echo '
                        <tr class="w3-purple">
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
                    echo "<span class=\"w3-tag w3-purple\">$rows record(s)</span>";

                    if($allteachers){
                        echo '<table class="w3-table w3-bordered w3-light-grey">';
                        echo '
                        <tr class="w3-purple">
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
        </div>
    </div>
</div>

<script>
    // for the changing tabs
    var navbuttons = document.querySelectorAll('.navitem');
    var navtabs = document.querySelectorAll('.panels');

    function navigateTabs(item){
        let classes = '';
        for (let x = 0; x < navbuttons.length; x++) {
            classes = navbuttons[x].classList.toString();
            if(navbuttons[x] == item){
                navbuttons[x].classList.add("w3-purple");
                navtabs[x].classList.remove("w3-hide");
            } else {
                navbuttons[x].classList.remove("w3-purple");
                navtabs[x].classList.add("w3-hide");
            }
        }
    }
</script>