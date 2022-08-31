<?php
session_start();
$email = $_SESSION['email'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Submitted Edit Name form
    if (isset($_POST['editName'])) {
        if (empty($_POST["lName"])) {
            $errorMsg .= "Last Name is required.<br>";
            header("Location: EditProfile.php?edit=error1");
            exit();
        } else {
            $lname = sanitize_input1($_POST["lName"]);
            if (!empty($_POST["fName"])) {
                $fname = sanitize_input1($_POST["fName"]);
            } else {
                $fname = "";
            }
        }
        updateProfileNameUsingEmail($email, $fname, $lname);

        header("Location: EditProfile.php?edit=success");
        exit();
    }
    //Submitted Edit Bio Form
    if (isset($_POST['editBio'])) {
        if (!empty($_POST["bio"])) {
            $bio = sanitize_input1($_POST["bio"]);
        } else {
            $bio = "";
        }
        updateBioUsingEmail($email, $bio);
        header("Location: EditProfile.php?edit=success");
        exit();
    }
    if (isset($_POST['changePassword'])) {
        if (empty($_POST["newPassword"]) || empty($_POST["confirmPassword"]) || empty($_POST['currentPassword'])) {
            echo 'Current passsword, New Password and confirm password are required.<br>';
            header("Location: EditProfile.php?edit=error2");
            exit();
        } else {
            if ($_POST["newPassword"] != $_POST["confirmPassword"]) {
                echo 'Password do not match.<br>';
                header("Location: EditProfile.php?edit=error3");
                exit();
            } else {
                if (!(checkUserPasswordUsingEmail($email, $_POST['currentPassword']))) {
                    echo 'Current password is incorrect';
                    header("Location: EditProfile.php?edit=error4");
                    exit();
                } else {
                    $hashedPassword = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);
                    updatePasswordUsingEmail($email, $hashedPassword);
                    header("Location: EditProfile.php?edit=success");
                    exit();
                }
            }
        }
    }
    if (isset($_POST['terminateAccount'])) {
        if (empty($_POST['terminatePassword'])) {
            echo 'Password is required';
            header("Location: EditProfile.php?edit=error5");
            exit();
        } else {
            if (!(checkUserPasswordUsingEmail($email, $_POST['terminatePassword']))) {
                echo 'Password is incorrect';
                header("Location: EditProfile.php?edit=error6");
                exit();
            } else {
                deleteAccount($email);
                header("Location: AccountTerminated.php");
                exit();
            }
        }
    }
    if (isset($_POST['changeUserAddress'])) {
        if (!empty($_POST["userProfileAddress"])) {
            $address = sanitize_input1($_POST["userProfileAddress"]);
        } else {
            $address = "";
        }
        updateAddressUsingEmail($email, $address);
        header("Location: EditProfile.php?edit=success");
        exit();
    }
}

if (isset($_GET['imgSrc'])) {
    $profilepic = strval($_GET['imgSrc']);
    updateProfileImgUsingEmail($email, $profilepic);
    header("Location: EditProfile.php?edit=success");
    exit();
}

function getAndDisplayProfileInfo($string) {
    $email = $string;
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM project_members WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fname = $row["fname"];
        $lname = $row["lname"];
        $email = $row["email"];
        $password = $row["password"];
        $address = $row["address"];
        $bio = $row["bio"];
        $profileImg = $row["profileImage"];
    } else {
        echo "0 results";
    }

    $userProfileInfo = [$fname, $lname, $email, $password, $address, $bio, $profileImg];
    $stmt->close();
    $conn->close();
    return $userProfileInfo;
}

function updateProfileNameUsingEmail($email, $fname, $lname) {
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE project_members SET fname=?,lname=? WHERE email=? ");
    $stmt->bind_param('sss', $fname, $lname, $email);
    $result = $stmt->execute();
    if ($result) {
        echo "Names updated successfully";
    } else {
        echo "Error updating Names: " . $result->error;
    }
    $stmt->close();
    $conn->close();
    return $result;
}

function sanitize_input1($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function updateBioUsingEmail($email, $bio) {
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE project_members SET bio=? WHERE email=? ");
    $stmt->bind_param('ss', $bio, $email);
    $result = $stmt->execute();
    if ($result) {
        echo "Bio updated successfully";
    } else {
        echo "Error updating Bio: " . $result->error;
    }
    $stmt->close();
    $conn->close();
    return $result;
}

function checkUserPasswordUsingEmail($email, $currentPassword) {
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $success = false;
    $stmt = $conn->prepare("SELECT password FROM project_members WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];
        if (!password_verify($currentPassword, $hashedPassword)) {
            echo 'Current password does not match';
            $success = false;
        } else {
            $success = true;
        }
    } else {
        $success = false;
    }
    $stmt->close();
    $conn->close();
    return $success;
}

function updatePasswordUsingEmail($email, $newPassword) {
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE project_members SET password=? WHERE email=? ");
    $stmt->bind_param('ss', $newPassword, $email);
    $result = $stmt->execute();
    if ($result) {
        echo "Password updated successfully";
    } else {
        echo "Error updating Password: " . $result->error;
    }
    $stmt->close();
    $conn->close();
    return $result;
}

function updateProfileImgUsingEmail($email, $profileImage) {
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE project_members SET profileImage=? WHERE email=? ");
    $stmt->bind_param('ss', $profileImage, $email);
    $result = $stmt->execute();
    if ($result) {
        echo "Image updated successfully";
    } else {
        echo "Error updating Image: " . $result->error;
    }
    $stmt->close();
    $conn->close();
    return $result;
}

function deleteAccount($email) {
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("DELETE FROM project_members WHERE email=? ");
    $stmt->bind_param('s', $email);
    $result = $stmt->execute();
    if ($result) {
        echo "Account successfully";
    } else {
        echo "Error deleting: " . $result->error;
    }
    $stmt->close();
    $conn->close();
    return $result;
}

function updateAddressUsingEmail($email, $address) {
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE project_members SET address=? WHERE email=? ");
    $stmt->bind_param('ss', $address, $email);
    $result = $stmt->execute();
    if ($result) {
        echo "Address updated successfully";
    } else {
        echo "Error updating Address: " . $result->error;
    }
    $stmt->close();
    $conn->close();
    return $result;
}

?>
