<?php
require './header.html';
include './connection.php';?>
        <div class="add">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Hero Name:</label>
                <input type="text" class="form-control" placeholder="Enter hero's name" name="hero_name">
            </div>
            <div class="form-group">
                <label>Hero Image:</label>
                <input type="file" class="form-control" placeholder="choose a file" name="hero_image">
            </div>
            <div class="form-group">
                <label>Hero Real Name:</label>
                <input type="text" class="form-control" placeholder="Enter hero's real name" name="hero_real_name">
            </div>

            <div class="form-group">
                <label>Hero Short Bio:</label>
                <textarea class="form-control" placeholder="Write a short bio about the hero"
                    name="hero_short_bio"></textarea>
            </div>
            <div class="form-group">
                <label>Hero Long Bio:</label>
                <textarea class="form-control" placeholder="Write a longer bio about the hero"
                    name="hero_long_bio"></textarea>
            </div>


            <button type="submit" name="submit" class="btn btn-primary submit_add"><b>SUBMIT</b></button>
        </form>

        <?php
        
        $conn = mysqli_connect('localhost','root','','xmen_database');

        if(isset($_POST['submit'])){

            $hero_name = $_POST['hero_name'];
            $hero_image = $_FILES['hero_image']['name'];
            $tmp_name = $_FILES['hero_image']['tmp_name'];
            $hero_real_name = $_POST['hero_real_name'];
            $hero_short_bio = $_POST['hero_short_bio'];
            $hero_long_bio = $_POST['hero_long_bio'];

            $insert = " INSERT INTO xmen_heroes(hero_name,hero_image,hero_real_name,hero_short_bio,hero_long_bio) VALUES ('$hero_name','$hero_image','$hero_real_name','$hero_short_bio','$hero_long_bio')";

            $run_insert = mysqli_query($conn,$insert);
            if($run_insert === true){
                echo "Data added";
                move_uploaded_file($tmp_name,"upload/$hero_image");
            }else{
                echo "failed";
            }
        }
      

        ?>
    </div>

</body>

</html>