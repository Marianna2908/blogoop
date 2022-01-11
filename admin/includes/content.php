
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>testen connectie database</h1>
            <hr>
            <?php
            if($database->connection){
                echo "ok, connectie gemaakt met de database";
            }else{
                echo "geen databaseconnectie";
            }
            ?>
            <hr>
            <h2>Ophalen van 1 enkele user</h2>
<?php
            $result = User::find_user_by_id(1); // de user gaat bij find user by id, kijken in User
            echo $result->username; // dit zal de classes uitlezen, van de properties,

//            $sql = "SELECT * FROM users WHERE id=1";
//            $result = $database->query($sql);
//            $user_found = mysqli_fetch_array($result);
//            echo $user_found["username"];
//            ?>
<!--            <hr>-->
<!--            <h2>Class user aanspreken en doorlopen</h2>-->
<!--            <h3>Manier 1</h3>-->
<!--            <ul class="list-group">-->
<!--                --><?php
//                $user = new User();
//                $result = $user->find_all_users();
//                while($row = mysqli_fetch_array($result)){
//                    //echo $row["first_name"] . ' - ' . $row["last_name"] . "<br>";
//                    echo "<li class='list-group-item'>" . $row["first_name"] . ' - ' . $row["last_name"] ."</li>";
//                }
//                ?>
<!--            </ul>-->
<!--            <hr>-->
<!--           <h3>Manier 2</h3>-->
<!--          <ul class="list-group">-->
<!--                --><?php
////                $result = User::find_all_users();
////                while($row = mysqli_fetch_array($result)){
////                    //echo $row["first_name"] . ' - ' . $row["last_name"] . "<br>";
////                    echo "<li class='list-group-item'>"  .$row["first_name"] . ' - ' . $row["last_name"] ."</li>";
////                }
////                ?>
<!--           </ul>-->
<!--            <h3> Manier 2</h3>-->
<!--            --><?php
////            $result = User::find_user_by_id(1);
////            while($row = mysqli_fetch_array($result)) {
////                echo $row["first_name"] . ' - ' . $row["last_name"] . "<br>";
////            }
//            ?>
<!--            <hr>-->
<!--            <h2>manier 3</h2>-->
<!--            --><?php //// instantie van een object
//            $result = User::find_user_by_id(1);// 1e user wordt uit database gehaald/
//            $user= new User();
//            $user->id =$result['id'];
//            $user->username =$result['username'];
//            $user->first_name =$result['first_name'];
//            $user->last_name =$result['last_name'];
//            $user->password =$result['password'];
//            echo $user->username . ' ' . $user->id;
//
//            ?>
<!--            <hr>-->
<!--            <h3>Manier 3.1 <h3>-->
<!--            <p> lussen door de code</p>-->
<!--                --><?php
//                $user = User::find_all_users(); // vanuitde users vind alle users in de database
//                foreach($users as $user){ // forloop in php, moet worden opgedraaid, de users komen binnen en gaat elkle user per keer gaan bekijken.
//                    echo $user->username;
//                }
//                ?>
<!--           <hr>-->
<!--            <h3>Manier 4</h3-->
<!--            --><?php
//            $result = User::find_user_by_id(1); // de array moet worden naar USer class gevuld omgezet worden, vullen van een object en GEEN ARRAY, zie met var dump
//////            var_dump($result);
////            $user = User::instantie($result); // vullen van 1 object!!!!
////            var_dump($user);
//            echo $result ->username;
//            ?>

        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->