<!DOCTYPE html>
<head lang="en">
    <link rel="stylesheet" type="text/css" href="public/css/home.css">
    <title>Settings - Cook Boy</title>
    <style>@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500&display=swap');</style>
</head>
<body>
<div class="container">
    <?php include('modules/header.php')?>
    <div class="main-content">
        <div id="settings">
            <div class="email">email: <?php echo $_SESSION['email']?></div>
        </div>
    </div>
    <?php include('modules/footer.php') ?>
</div>
</body>