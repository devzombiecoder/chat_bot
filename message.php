<?php

$conn = mysqli_connect('localhost', 'root', '', 'chat-bot') or die("database connection error");



$getmsg = mysqli_real_escape_string($conn, $_POST['text']);

$check_data = "SELECT replies FROM message WHERE queries LIKE '%$getmsg%' ";
$run_query = mysqli_query($conn, $check_data) or die("error in finding");

if (mysqli_num_rows($run_query) > 0) {
    $fetch_data = mysqli_fetch_assoc($run_query);
    $reply = $fetch_data['replies'];
    echo $reply;
} else {
    echo "Sorry can't be able to understand you!";
}
