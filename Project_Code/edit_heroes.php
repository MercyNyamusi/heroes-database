<?php
require './header.html';
include './connection.php';?>
    <div class="add">
        
        <?php
        
        if(isset($_GET['edit'])){
            $edit_id = $_GET['edit'];

            $select = "SELECT * FROM xmen_heroes WHERE hero_id='$edit_id'";
            $run = mysqli_query($conn,$select);
            $row_xmen_heroes = mysqli_fetch_array($run);
                $hero_name = $row_xmen_heroes['hero_name'];
                $hero_image = $row_xmen_heroes['hero_image'];
                $hero_real_name = $row_xmen_heroes['hero_real_name'];
                $hero_short_bio = $row_xmen_heroes['hero_short_bio'];
                $hero_long_bio = $row_xmen_heroes['hero_long_bio'];


           
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Hero Name:</label>
                <input type="text" class="form-control" value="<?php echo $hero_name?>" placeholder="Enter hero's name"
                    name="hero_name">
            </div>
            <div class="form-group">
                <label>Hero Image:</label>
                <input type="file" class="form-control" value="<?php echo $hero_image?>" placeholder="choose a file"
                    name="hero_image">
            </div>
            <div class="form-group">
                <label>Hero Real Name:</label>
                <input type="text" class="form-control" value="<?php echo $hero_real_name?>"
                    placeholder="Enter hero's real name" name="hero_real_name">
            </div>

            <div class="form-group">
                <label>Hero Short Bio:</label>
                <textarea class="form-control" placeholder="Write a short bio about the hero"
                    name="hero_short_bio"><?php echo $hero_short_bio?></textarea>
            </div>
            <div class="form-group">
                <label>Hero Long Bio:</label>
                <textarea class="form-control" placeholder="Write a longer bio about the hero"
                    name="hero_long_bio"><?php echo $hero_long_bio?></textarea>
            </div>


            <button type="submit" name="submit" class="btn btn-primary submit"><b>SUBMIT</b></button>
            <a class="btn btn-primary" href="heroes.php"><b> View Updated Hero</b></a>

        </form>

        <?php
        

        if(isset($_POST['submit'])){

            $ehero_name = $_POST['hero_name'];
            $ehero_image = $_FILES['hero_image']['name'];
            $etmp_name = $_FILES['hero_image']['tmp_name'];
            $ehero_real_name = addslashes($_POST['hero_real_name']);
            $ehero_short_bio = addslashes($_POST['hero_short_bio']);
            $ehero_long_bio = addslashes($_POST['hero_long_bio']);
            if(empty($ehero_image)){
                $ehero_image = $hero_image;
            }

            
            $update = "UPDATE xmen_heroes SET hero_name='$ehero_name',hero_image='$ehero_image',hero_real_name='$ehero_real_name',
            hero_short_bio='$ehero_short_bio',hero_long_bio='$ehero_long_bio' WHERE hero_id='$edit_id'";
            $run_update = mysqli_query($conn,$update);
            if($run_update){
                echo "Hero updated successfully!";
                move_uploaded_file($etmp_name,"upload/$ehero_image");
            }else{
                echo "failed";
            }
        }
        ?>
        <br>
    </div>

</body>

</html