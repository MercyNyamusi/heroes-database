<?php
require './header.php';
include './connection.php';
    
?>
<main>
<?php
        if(isset($_GET['delete'])){
            $del_id = $_GET['delete'];
           $delete = "DELETE FROM xmen_heroes WHERE hero_id='$del_id'";
           $run_delete = mysqli_query($conn,$delete);
           if($run_delete === true){
               echo "Hero has been deleted successfully!";
           }else {
               echo "Failed, Try again!";
           }
        }
        ?>

        <table class="table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hero Name</th>
                    <th>Hero Image</th>
                    <th>Hero Real Name</th>
                    <th>Hero Short Bio</th>
                    <th>Hero Long Bio</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php


                    $select = "SELECT * FROM xmen_heroes";
                    $run = mysqli_query($conn,$select);
                    while ($row_xmen_heroes = mysqli_fetch_array($run)){
                        $hero_id = $row_xmen_heroes['hero_id'];
                        $hero_name = $row_xmen_heroes['hero_name'];
                        $hero_image = $row_xmen_heroes['hero_image'];
                        $hero_real_name = $row_xmen_heroes['hero_real_name'];
                        $hero_short_bio = $row_xmen_heroes['hero_short_bio'];
                        $hero_long_bio = $row_xmen_heroes['hero_long_bio'];
                ?>

                <tr class="heroes_table">
                    <td style="width:5%"><?php echo $hero_id;?></td>
                    <td><?php echo $hero_name;?></td>
                    <td><img src="upload/<?php echo $hero_image?>" height="170px" width="150px"></td>
                    <td><?php echo $hero_real_name;?></td>
                    <td style="width:20%"><?php echo $hero_short_bio;?></td>
                    <td style="width:20%"><?php echo $hero_long_bio;?></td>
                
                    </td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
                    </main>
</body>

</html>