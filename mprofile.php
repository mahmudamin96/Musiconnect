<?php
session_start();

    include('db.php');
    include('posts.php');
    
    if($_SERVER['REQUEST_METHOD']=="POST"){

        $post =new Post();
        $res=$post->create_post($_POST);
        // print_r($_POST);
        if($res == ""){
          header("location: mprofile.php");
          die;
        }
        else{

        }
    }
    //collect post
    $post =new Post();
    $id1=$_SESSION['id'];
    $posts=$post->get_posts($id1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="mprofile.css?v=<?php echo time();?>">
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">  -->

  <title>Musiconnect</title>
</head>
<body>
  <!-- Header -->
  <section id="header">
    <div class="header container">
      <div class="nav-bar">
        <div class="brand">
          <a href="#hero"><h1><span>MUSI</span>CON<span>N</span>ect</h1></a>
        </div>
        <div class="nav-list">
          <!-- <div class="hamburger"><div class="bar"></div></div> -->
          <ul>
            <li><a href="mhome.php" data-after="Home">HOME</a></li>
            <li><a href="#" data-after="Service">EDIT PROFILE</a></li>
            <!-- <li><a href="#" data-after="Projects">REGISTRATION</a></li> -->
            <li><a href="#" data-after="Contact">LATEST PROGRAM</a></li>
            <li><a href="calender.php" data-after="Contact">Calendar</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->


  <!-- Hero Section  -->
  <section id="hero">
          
               <?php
                 
                  include('db.php');
                  $str=$_SESSION['id'];
                  $sql="select * from musician where m_id = $str";
                  $res=mysqli_query($con,$sql);
                  if(mysqli_num_rows($res)>0){
                    while($row=mysqli_fetch_assoc($res)){
                        $img=$row['image'];
          
                        }
                    }
                    
              ?>
          
              <img  src="img/<?php echo $img?>" alt="" height="100"> 
          

    <div class="herocontainer">
        
      <!-- <div> -->
          <!-- <div class="details"> -->
                <?php
                
                    include('db.php');
                    $str=$_SESSION['id'];
                    $sql="select * from musician where m_id = $str";
                    $res=mysqli_query($con,$sql);
                    if(mysqli_num_rows($res)>0){
                    while($row=mysqli_fetch_assoc($res)){
                    echo  '<h1>'.$row['Name'].'</h1>';
                    echo "<br/>";
                    echo '<h1>'.'Genre: '.$row['Genre'].'</h1>';
                
                        
                
                    
                        }
                    }      
                ?>
        
    </div>
  </section>

  <!-- <br> -->
  <!-- End Hero Section  -->
  <section id="menubar">
          <div class="menubutton">
            <a href="mprofile.php"><button class="button" type="button">Timeline</button></a>
            <a href="calendar.php"><button class="button" type="button">Calender</button></a>
            <!-- <button class="button" type="button"></button> -->
            <button class="button" type="button">About</button>
          </div>
  </section>

<!-- Slideshow container -->
<section id="softwares">
<div class="slideshow-container">
  <div><br>
    <div class="section-top">
      <!-- <h1 class="section-title">News<span> Feed</span></h1> -->
       <div class="write"> 
         <!-- <div class="write1" >  -->
             <form method="post"> 
                <textarea name="post" placeholder="Whats on your mind"></textarea> 
                
                <input class="postbutton" id="post_button" type="submit" value="Post">
                <br>
              </form>
         <!-- </div>  -->

       </div> 
  </div>
  <div id="post_bar" >
          
          <?php
            if($posts){
              foreach ($posts as $row_user) {
               
                
                echo "<div class='dropdown'>";
                  echo "<button class='dotbtn'>";
                  echo  "<div class='dots'>...</div>";
                  echo "</button>";
                  echo "<div class='dropdown-content'>";
                  // echo "<a href='updatepost.php?text=$row_user[post]'>Edit Post</a>";
                  echo "<a href='deletepost.php?text=$row_user[post]'>Delete Post</a>";
                 
                  
                  echo "</div>";
                echo "</div>";
                
                include("post.php");
                
                $post =new Post();
                $row_user= $post->get_user($id1); 
              }
            }  
          ?>
      <br>
      <br>
  </div>
    
  </div>
<br>
 
</body>
</html>


