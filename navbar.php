<?php 
    function active_class($name){
        global $page_name;
        if(isset($page_name) && $page_name == $name){
            echo "class='active' ";
        }
    }

?>

<!-- Start Navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#OurNavbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">ElFay<span>.ED</span></a>
            </div>
<!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="OurNavbar">
                  <ul class="nav navbar-nav">
                    <li <?php active_class("dashboard"); ?> ><a href="dashboard.php">Home <span class="sr-only">(current)</span></a></li>
                    <li <?php active_class("work"); ?> ><a href="work.php">Work</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Graphic desin</a></li>
                        <li><a href="#">Photoshop ullsturate</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Back-End Develobment</a></li>
                      </ul>
                    </li>
                    <li><a href="#">Pages</a></li>
                    <li><a href="#">Contact</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php">LogOut <span class="glyphicon glyphicon-log-out"></span></a></li>
                  </ul>
            </div><!-- navbar-collapse -->
      </div><!-- End container -->
</nav>