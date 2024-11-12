
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'header.php';?>
    </head>
    <body class="sb-nav-fixed">
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>
        <?php include 'topnav.php';?>
        <div id="layoutSidenav">
            <?php include 'sidenav.php';?>
            <div id="layoutSidenav_content">
                <main>
                    <?php include 'main.php';?>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <?php include 'footer.php';?>
                </footer>
            </div>
        </div>
         <?php include 'SiteScript.php';?>
         <?php include 'GraphScript.php';?>
    </body>
</html>
