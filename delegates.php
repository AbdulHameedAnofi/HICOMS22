<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Hicoms</title>
</head>
<body>
    <header class="header">
        <div class="logo">
            HICOMS
        </div>
        <a href="generate.php">Generate Codes</a>
    </header>
    <?php

    if (!isset($_SESSION['admin'])) {
        header('location: ./admin.php?admin=invalid');
        exit();
    }
    
    ?>

    <div class="form">
        <form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="post">
        <h3>Delegates</h3>
            <input type="text" name="name" placeholder="Search by name, email or phone number"><br><br>
            <input type="submit" name="submit" value="search">
        </form>
    </div>
        

    <div class="delegates-table">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Institution</th>
                    <th>Course</th>
                    <th>Level</th>
                </tr>
            </thead>
            <?php
                    include 'controllers/DelegatesController.php';

                    
                    $delegates = new DelegatesController;
                    if (isset($_POST['submit'])) {
                        $delegates = $delegates->getDelegates($_POST['name']);
                        foreach ($delegates as $key => $delegate) {
                            ?>
                            <tr>
                                <td><?php echo $key+1; ?></td>
                                <td><?php echo $delegate['name']; ?></td>
                                <td><?php echo $delegate['email']; ?></td>
                                <td><?php echo $delegate['phone_number']; ?></td>
                                <td><?php echo $delegate['institution']; ?></td>
                                <td><?php echo $delegate['course']; ?></td>
                                <td><?php echo $delegate['level']; ?></td>
                            </tr>
                            
                            <?php
                        }
                    }
                    else {
                        $delegates = $delegates->getAllDelegates();
                        foreach ($delegates as $key => $delegate) {
                            ?>
                            <tr>
                                <td><?php echo $key+1; ?></td>
                                <td><?php echo $delegate['name']; ?></td>
                                <td><?php echo $delegate['email']; ?></td>
                                <td><?php echo $delegate['phone_number']; ?></td>
                                <td><?php echo $delegate['institution']; ?></td>
                                <td><?php echo $delegate['course']; ?></td>
                                <td><?php echo $delegate['level']; ?></td>
                            </tr>

                            <?php
                        }
                    }
            ?>
        </table>
    </div>
</body>
</html>