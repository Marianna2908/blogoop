<?php
    include("")
?>

<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-1" >
            <?php
            $user = new User();
            $result = $user->find_all_users();
            while($row = mysqli_fetch_array($result)){
            //echo $row["first_name"] . ' - ' . $row["last_name"] . "<br>";
            echo "<li class='list-group-item'>" . $row["first_name"] . ' - ' . $row["last_name"] ."</li>";
            }
            ?>
        </div>
    </div>
</div>
