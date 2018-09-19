<?php require_once  'include/classTask.php'; $r = $task->selectTable(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Task</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="Task" name="description">
    <!-- Favicons -->
    <link href="#" rel="icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">
    <!-- Bootstrap CSS File -->
    <link href="node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <!-- Libraries CSS Files -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Main Stylesheet File -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">

    <header class="inform mb-sm-5">
        <div class="top-section-grey">
            <a href="https://www.linkedin.com/in/dragoslav-predojevic-15453914b/" target="blank" class="social3 social-icons" title="Dragoslav Predojevic LinkedIn" id="Intens_LinkedIn"></a>
            <a href="https://www.facebook.com/dragoslav.predojevic" target="blank" class="social2 social-icons" title="Dragoslav Predojevic Facebook" id="Intens_Facebook"></a>
            <a href="https://twitter.com/" target="blank" class="social1 social-icons" title="Dragoslav Predojevic Twitter" id="Intens_Twitter"></a>
        </div>
        <div class="top-section-orange">
            <span class="phone-icon all-orange"></span>
            <span class="phone-text all-orange"> + 381 69 50 13 001</span>
            <a href="mailto:gagi.predojevic93@hotmail.com" class="mail-icon all-orange" title="E-mail us" id="E-mail_us"></a>
            <a href="mailto:gagi.predojevic93@hotmail.com" class="mail-text all-orange" title="E-mail us" id="E-mail_us">gagi.predojevic93@hotmail.com</a>
        </div>
    </header>
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
        <strong>Successfuly!</strong> You have successfully deleted task.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>