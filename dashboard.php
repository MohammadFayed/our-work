<?php 
        session_start();
        $page_name = "dashboard";
        $table = "posts";
    if(!isset($_SESSION['username'])){
        header("Location: login/login.php");
    }else{
        
        include "header.php";
        include "navbar.php";
        include "slider.php";
        include "features.php";
        include "testimonials.php";
?>

<?php 

include "server.php";
    $stmt = $conn->prepare("SELECT * FROM post WHERE username = ? ");
    $stmt->execute(array($_SESSION['username']));
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    foreach($result as $value){
?>
<article class="post" >
        <div class="container" >
            <div class="post-container">
                    <div class="logo">
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="image/B612_20190622_074334_483.jpg" alt="Mohammad Fayed" title="Mohammad Fayed">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading">Mohammad Fayed</h4>
                            <span class="timestamp" ><?php echo $value{'date'}; ?> . <span class="glyphicon glyphicon-globe" ></span></span>
                          </div>
                        </div>
                    </div>
                    <div class="publish-post">
                        <p class="lead"><?php echo $value['post']; ?></p>
                    </div>
            </div>
            
        
        </div>

</article>
<?php } ?>

<?php 
        include "footer.php";
        
    }


?>