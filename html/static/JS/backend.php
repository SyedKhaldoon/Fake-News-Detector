<?php
session_start();
ob_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "fake news detector";


// database conection
$conn = new mysqli($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['DETECT'])) {
    // if (isset($_GET['News_Title'])) {
        // $news_title = $_GET["News_Title"];
           $news_title= mysqli_real_escape_string($conn, $_POST["News_Title"]);

        $s = "SELECT *FROM detect_dataset where News_Title='$news_title' ";
        $result = mysqli_query($conn, $s);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            foreach ($result as $row) {
                if ($row['Label'] == "Real") {
                    echo "<script>alert('The detected News is REAL')</script>";
                } else if ($row['Label'] == "Fake") {
                    echo "<script>alert('The detected News is FAKE')</script>";
                }
            }
        } else {
            echo "<script>alert('No Label found')</script>";
        }
    }
// }
 else if (isset($_POST['PREDICT'])) {
    // if (isset($_GET['News_Title'])) {
        // $news_title = $_GET["News_Title"];
        //    $label= mysqli_real_escape_string($conn, $_POST["label"]);
        $news_title= mysqli_real_escape_string($conn, $_POST["News_Title"]);

        $s = "SELECT *FROM predict_dataset where News_Title='$news_title' ";
        $result = mysqli_query($conn, $s);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            foreach ($result as $row) {
                if ($row['Label'] == "Real") {
                    echo "<script>alert('The predicted News is REAL')</script>";
                } else if ($row['Label'] == "Fake") {
                    echo "<script>alert('The predicted News is FAKE')</script>";
                }
            }
        } 
        else {
            echo "<script>alert('No Label found')</script>";
        }
    }
// }
?>
