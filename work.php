<?php session_start();

    if(!isset($_SESSION['username'])){
        
        header("Location: login/login.php");
        
    }else{
    $page_name = "work";
    $table = "posts";
    include "header.php";
    include "navbar.php";
        
        if(isset($_POST['publish'])){
            require_once "server.php";
            $post = $_POST['post'];
            $date = date("Y-m-d");
            if(!empty($post)){
                $stmt = $conn->prepare("INSERT INTO post (username, post, date) VALUES (?, ?, ?)");
                $stmt->execute(array($_SESSION['username'], $post, $date));
                $count = $stmt->rowCount();
                
                if($count > 0){
                    echo "Thank You !!";
                }
                
            }
        }
    
?>

<div class="container" >
            <div class="post-container">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="post">
                    <div class="logo">
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="image/B612_20190622_074334_483.jpg" alt="Mohammad Fayed" title="Mohammad Fayed">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading">Mohammad Fayed</h4>
                            <span class="timestamp" >8 minute . <span class="glyphicon glyphicon-globe" ></span></span>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" placeholder="What do you feel?" name="post" ></textarea>
                        <input type="submit" class="form-control" value="publish" name="publish" />
                    </div>
                </form>
            </div>
            <div class="publish-post">
                <p class="lead"><?php if (isset($post)){ echo $post; }?></p>
            </div>
        
        </div>
<?php include "footer.php";  } ?> 