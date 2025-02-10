<?php
    // Include the database connection file
    include('actions/connect.php');

    // Fetch summary data
    $rsv_events = $conn->query("SELECT COUNT(*) AS count FROM event_reservations")->fetch_assoc()['count'];
    $rsv_upcoming_events = $conn->query("SELECT COUNT(*) AS count FROM event_reservations WHERE event_date > NOW()")->fetch_assoc()['count'];
    $rsv_passed_events = $conn->query("SELECT COUNT(*) AS count FROM event_reservations WHERE event_date < NOW()")->fetch_assoc()['count'];
    $feedback = $conn->query("SELECT COUNT(*) AS count FROM feedback")->fetch_assoc()['count'];
    $newfeedback = $conn->query("SELECT COUNT(*) AS count FROM feedback WHERE fbk_status != 'read'")->fetch_assoc()['count'];
    $all_visits = $conn->query("SELECT COUNT(*) AS count FROM visits")->fetch_assoc()['count'];
    $completed_visits = $conn->query("SELECT COUNT(*) AS count FROM visits WHERE status = 'checked out'")->fetch_assoc()['count'];
    $ongoing_visits = $conn->query("SELECT COUNT(*) AS count FROM visits WHERE status != 'checked out'")->fetch_assoc()['count'];
    $visitors = $conn->query("SELECT COUNT(*) AS count FROM visitors")->fetch_assoc()['count'];
    $users = $conn->query("SELECT COUNT(*) AS count FROM users")->fetch_assoc()['count'];
    $facilities = $conn->query("SELECT COUNT(*) AS count FROM systemdata WHERE itemname LIKE 'fac_%'")->fetch_assoc()['count'];
    $usertypes = $conn->query("SELECT COUNT(*) AS count FROM systemdata WHERE itemname LIKE 'utype_%'")->fetch_assoc()['count'];
    $tourtypes = $conn->query("SELECT COUNT(*) AS count FROM systemdata WHERE itemname LIKE 'tour_%'")->fetch_assoc()['count'];

    $event_cash = $conn->query("SELECT SUM(pay_amount) AS sum FROM payments WHERE pay_purpose = 'reserve_visit'")->fetch_assoc()['sum'] ?? 0;
    $visit_cash = $conn->query("SELECT SUM(pay_amount) AS sum FROM payments WHERE pay_purpose != 'reserve_visit'")->fetch_assoc()['sum'] ?? 0;
    $totalIncome = $conn->query("SELECT SUM(pay_amount) AS sum FROM payments")->fetch_assoc()['sum'] ?? 0;

    // Display results
    $summ = json_encode([
        'break|reservations' => 0,
        'reserved events' => $rsv_events,
        'reserved upcoming_events' => $rsv_upcoming_events,
        'reserved passed_events' => $rsv_passed_events,
        'break|feedback' => 0,
        'total reviews' => $feedback,
        'new reviews' => $newfeedback,
        'break|visits' => 0,
        'visitors' => $visitors,
        'all visits' => $all_visits,
        'completed visits' => $completed_visits,
        'ongoing visits' => $ongoing_visits,
        'break|admin data' => 0,
        'users' => $users,
        'facilities' => $facilities,
        'user types' => $usertypes,
        'tour types' => $tourtypes,
        'break|cash' => 0,
        'event_cash' => $event_cash,
        'visit_cash' => $visit_cash,
        'total_Income' => $totalIncome
    ]);
?>
