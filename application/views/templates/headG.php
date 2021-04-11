<?php session_start(); ?>
<!DOCTYPE html>
<html>
<title>APE Gaming</title>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/APEStyle.css');?> ">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
</head>

<body>
    <script type="text/javascript" src="<?php echo base_url('assets/JS/GJS.js');?>"></script>
    <!--Navigation Bar -->
        <nav class="navbar navbar-default navbar-fixed-top navbar-expand-sm navbar-dark bg-dark" id="header">
            <div class="container navbar navbar-dark bg-dark navbar-expand-lg" id="header2">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a id="hs" class="navbar-brand"><img alt="logo" src="<?php echo base_url('assets/Images/sm-logo.png');?>"></a>
                    </li>
                    <li class="nav-item">
                        <a id="gg" class="nav-link" href="#" style="margin-top: 20px; margin-right: 20px;">Game Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a id="mp" class="nav-link" href="#" style="margin-top: 20px; margin-right: 20px;">My Profile & Stats</a>
                    </li>
                    <li class="nav-item">
                        <a id="rm" class="nav-link" href="#" style="margin-top: 20px; margin-right: 20px;">Recommendations</a>
                    </li>
                    <li class="nav-item">
                        <a id="ct" class="nav-link" href="#" style="margin-top: 20px; margin-right: 20px;">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a id="lo" class="nav-link" href="#" style="margin-top: 20px; margin-right: 20px;">Logout</a>
                    </li>
                    


                </ul>
            </div>
        </nav>

        <script>
            document.getElementById("hs").onclick=function()
            {
                window.location.href="<?php echo site_url('');?>";   
            };

            document.getElementById("gg").onclick=function()
            {
                window.location.href="<?php echo site_url('Games/get_games');?>";   
            };

            document.getElementById("mp").onclick=function()
            {
                window.location.href="<?php echo site_url('Users/get_stats');?>";   
            };

            document.getElementById("lo").onclick=function()
            {
                window.location.href="<?php echo site_url('Users/logout');?>";   
            };

            document.getElementById("ct").onclick=function()
            {
                window.location.href="<?php echo site_url('Games/get_cart');?>";   
            };

            document.getElementById("rm").onclick=function()
            {
                window.location.href="<?php echo site_url('Games/get_rec');?>";   
            };

        </script>