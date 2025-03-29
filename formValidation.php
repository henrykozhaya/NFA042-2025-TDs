<?php

function isValidPassword($password) {
    $passLength = strlen($password) >= 8;
    $uppercase    = preg_match('@[A-Z]@', $password);
    $lowercase    = preg_match('@[a-z]@', $password);
    $number       = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    return $passLength && $uppercase && $lowercase && $number && $specialChars;
}

function verifierCellLiban($num): bool{
    $pattern = "/^(\+961|00961)(3|70|71|76|81)\d{6}$/";
    return preg_match($pattern, $num);
}

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    if(
        !isset($_POST["name"]) 
        || empty(trim($_POST["name"]))
        || !isset($_POST["email"]) 
        || empty(trim($_POST["email"]))
        || !isset($_POST["password"]) 
        || empty(trim($_POST["password"]))
        || !isset($_POST["nationality"]) 
        || !isset($_POST["phone"]) 
        || empty(trim($_POST["phone"]))
        || !isset($_POST["address"]) 
        || empty(trim($_POST["address"]))
        || !isset($_POST["budget"]) 
        || empty(trim($_POST["budget"]))
        || !isset($_POST["gender"]) 
        || empty(trim($_POST["gender"]))
    )
    {
        http_response_code(400);
        header("location:formValidation.php?error=emptyFields");
    } else {
        $error = [];


        // Name Validation
        // Minimum 3 letters and maximum 24 letters. It can contain letters and spaces
        $name = htmlspecialchars(trim($_POST["name"]));
        if(!preg_match("/^[a-zA-Z]{3}[a-zA-Z ]{0,21}$/", $name)){
            $error["name"] = "Invalid Name";
        }

        // Email Validation
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error["email"] = "Invalid Email";
        }

        // Password Validation
        $password = trim($_POST["password"]);
        if(!isValidPassword($password)){
            $error["password"] = "Invalid Password";
        }

        // Nationality Validation
        $nationality = intval($_POST["nationality"]);
        if($nationality < 1 || $nationality > 10){
            $error["nationality"] = "Invalid Nationality";            
        }
        
        // Phone Validation
        $phone = trim($_POST["phone"]);
        if(!verifierCellLiban($phone)){
            $error["phone"] = "Invalid Phone";
        }

        // Address Validation
        $address = htmlspecialchars(trim($_POST['address']));

        // Budget Validation
        $budget = floatval($_POST['budget']);
        if($budget < 0){
            $error["budget"] = "Invalid Budget";
        }

        // Start Date Validation
        $start_date = strtotime($_POST["start_date"]);
        if($start_date < time()){
            $error["start_date"] = "Invalid Start Date";            
        }

        // Gender Validation
        $gender = $_POST["gender"];
        if(!in_array($gender, ['f', 'm'])){
            $error["gender"] = "Invalid Gender";     
        }

        // Is Married Validation
        $is_married = isset($_POST["is_married"]) ? true : false;

        if(count($error) > 0){
            http_response_code(400);
            header("location:formValidation.php?error=" . json_encode($error));
        }
        else{
            header('content-type: application/json');
            die(json_encode([
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'address' => $address,
                'budget' => $budget,
                'phone' => $phone,
                'nationality' => $nationality,
                'gender' => $gender,
                'start_date' => $start_date,
                'is_married' => $is_married,
            ]));
        }
    }
    // header("Location: formValidation.php?error=emptyFields");
}
else if($_SERVER["REQUEST_METHOD"] == 'GET'){

$error = false;
if(isset($_GET["error"])) $error = json_decode($_GET["error"], true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        main{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #fff;
            width: 50%;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 300px;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group button {
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        .error-message{
            margin-top: 20px; 
            padding: 10px; 
            border: 1px solid red; 
            background-color: #ffe6e6; 
            color: red; 
            font-weight: bold;
        }
    </style>
</head>
<body>
    <main>
        <form action="formValidation.php" method="POST">
            <div class="form-group">
                <h3>My Form</h3>
            </div>

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="John Doe">
                <?php if(isset($error["name"])) echo "<div id='error' class='error-message'>" . $error["name"] . "</div>"; ?>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"  value="john.doe@gmail.com"><?php if($error && $error == 'invalidEmail') echo "<div id='error' class='error-message'>Please enter a valid email.</div>"; ?>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"  value="Cnam2@25">
                <?php if(isset($error["password"])) echo "<div id='error' class='error-message'>" . $error["password"] . "</div>"; ?>
            </div>

            <div class="form-group">
                <label for="nationality">Nationality</label>
                <select name="nationality" id="nationality" required>
                    <option value=""></option>
                    <option value="1">American</option>
                    <option value="2">Canadian</option>
                    <option value="3" selected>Lebanese</option>
                    <option value="4">British</option>
                    <option value="5">Australian</option>
                    <option value="6">Indian</option>
                    <option value="7">Chinese</option>
                    <option value="8">Japanese</option>
                    <option value="9">French</option>
                    <option value="10">German</option>
                </select>
                <?php if(isset($error["nationality"])) echo "<div id='error' class='error-message'>" . $error["nationality"] . "</div>"; ?>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone"  value="+96170500560">
                <?php if(isset($error["phone"])) echo "<div id='error' class='error-message'>" . $error["phone"] . "</div>"; ?>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address"  value="123 Main St, Beirut, Lebanon">
            </div>
            <div class="form-group">
                <label for="budget">Budget:</label>
                <input type="number" id="budget" name="budget"  value="1000">
                <?php if(isset($error["budget"])) echo "<div id='error' class='error-message'>" . $error["budget"] . "</div>"; ?>
            </div>
            <div class="form-group">
                <label for="start_date">Starting date:</label>
                <input type="date" id="start_date" name="start_date"  value="2025-06-15">
                <?php if(isset($error["start_date"])) echo "<div id='error' class='error-message'>" . $error["start_date"] . "</div>"; ?>
            </div>
            <div class="">
                <label for="gender">Gender:</label>
                <input type="radio" id="gender" name="gender" checked value="f"> Female
                <input type="radio" id="gender" name="gender"  value="m"> male
                <?php if(isset($error["gender"])) echo "<div id='error' class='error-message'>" . $error["gender"] . "</div>"; ?>
            </div>
            <div class="">
                <label for="is_married">Is Married:</label>
                <input type="checkbox" id="is_married" name="is_married"  value="1"> Yes
            </div>

            <div class="form-group">
                <button type='submit'>Submit</button>
            </div>
            <?php
                if($error == "emptyFields"){
                    echo "<div id='error' class='error-message'>Please fill in all fields.</div>";
                }
            ?>
        </form>
    </main>
    <script>
        
    </script>
</body>
</html>
<?php
}
else{
    http_response_code(405);
    die("Invalid request method.");
}