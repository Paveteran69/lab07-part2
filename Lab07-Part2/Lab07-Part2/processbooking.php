<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
</head>
<body>
    <header><h1>Rohirrim Tour Booking Confirmation</h1></header>
    <?php
    function sanitise_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_POST["firstname"])) {
        $err_msg="";
        $first_name = $_POST["firstname"];
        $last_name = $_POST["lastname"];
        $age = $_POST["age"];
        $partysize = $_POST["partysize"];

        // first name

        if (trim($first_name)=="")
            $err_msg .= "<p>Please enter first name. </p>";
        else {
            $first_name = sanitise_input($first_name);
            if (!preg_match("/^[a-zA-Z ]{2,40}$/", $first_name)){
                $err_msg .= "<p>Only letters are allowed in first name.</p>";
            }
        }

        // last name

        if (trim($last_name)=="")
            $err_msg .= "<p>Please enter last name. </p>";
        else {
            $last_name = sanitise_input($last_name);
            if (!preg_match("/^[a-zA-Z ]{2,40}$/", $last_name)){
                $err_msg .= "<p>Only letters are allowed in last name.</p>";
            }
        }

        // age

        if (trim($age)=="")
            $err_msg .= "<p>Please enter your age.</p>";
        else {
            $age = sanitise_input($age);
            if (!is_numeric($age) || $age < 0 || $age > 150){
                $err_msg .= "<p>Enter a valid age.</p>";
            }
        }

        // species

        if (!isset($_POST["species"]))
            $err_msg .= "<p>Please select your species.</p>";
        else {
            $species = sanitise_input($_POST["species"]);
        }

        // accommodation

        if (!isset($_POST["accom"]))
            $err_msg .= "<p>Please select accommodation.</p>";
        else {
            $accom = sanitise_input($_POST["accom"]);
        }

        // 4 day tour

        if (!isset($_POST["4day"]))
            $err_msg .= "<p>Please select 4 day tour.</p>";
        else {
            $day4 = sanitise_input($_POST["4day"]);
        }

        // 10 day tour

        if (!isset($_POST["10day"]))
            $err_msg .= "<p>Please select 10 day tour.</p>";
        else {
            $day10 = sanitise_input($_POST["10day"]);
        }

        // food

        if (!isset($_POST["food"]))
            $err_msg .= "<p>Please select a meal preference.</p>";
        else {
            $food = sanitise_input($_POST["food"]);
        }

        // party size

        if (trim($partysize)=="")
            $err_msg .= "<p>Please enter the number of travellers.</p>";
        else {
            $partysize = sanitise_input($partysize);
            if (!is_numeric($partysize) || $partysize < 1 || $partysize > 15){
                $err_msg .= "<p>Enter a valid number of travellers (1-15).</p>";
            }
        }

        // display error msg or welcome info
        if ($err_msg!="")
            echo $err_msg;
        else {
            echo "Welcome $first_name $last_name !";
            echo "<br>Your are now booked on the $accom and $day4 and $day10";
            echo "<br>Species: $species";
            echo "<br>Age: $age";
            echo "<br>Meal Preference: $food";
            echo "<br>Number of travellers: $partysize";
        }
    }   
    ?>
</body>
</html>