        <?php
        include('contact.php');
        ?>
        <!doctype html>
        <html lang="en">
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">



        </head>
        <body>

        <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
        <h1>Hello, world!</h1>

            <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        </div>
        </nav>

        <div class="container">
        <!--<button type="button"  class="btn btn-primary btn-lg" >Add Contact</button>-->


        <div class="box1" style="justify-content:end ; " >
        <button class="btn btn-primary btn-lg"  data-toggle="modal" data-target="#exampleModal" style="" >Add Contacts </button>
        </div>
        <table class="table table-hover table-bordered table-striped" >
            <thead>
                


        <TR>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Mobile Number</th>
            <th>Update</th>
        <th>Delete</th>
        </TR>
        </thead>

        <tboby>

        <?php
                    $query="select * from `contact` ";
                    $res=mysqli_query($con,$query);
                    if(!$res){
                        die("Query Failed....!");
                    }
                    else{
                        while($row=mysqli_fetch_assoc($res))
                        {
                            ?>  
                        
                        <tr>
                <td><?php echo $row['FirstName'];?></td>
                <td><?php echo $row['LastName'];?></td>
                <td><?php echo $row['Mobile'];?></td>
                <td><a href="update.php?mob=<?php echo $row['Mobile'];?>" class="btn btn-success" > Update</a></td>
                <td><a href="delete.php?mob=<?php echo $row['Mobile'];?>" class="btn btn-danger" > Delete</a></td>
            </tr>



                        <?php
                        }
                        
                    }

                ?>


        </tboby>



        </table>


                    <?php
                    if(isset($_GET['message'])){
                        echo "<h6>".$_GET['message']."</h6>";
                    }
                    ?>


                        
                    <?php
                    if(isset($_GET['insert_msg'])){
                        echo "<h6>".$_GET['insert_msg']."</h6>";
                    }
                    ?>


                    <?php
                    if(isset($_GET['delete_msg'])){
                        echo "<h6>".$_GET['delete_msg']."</h6>";
                    }
                    ?>



        <form action="insertdata.php" method="post" >
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Contact</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form>
            <div class="form-group">
            <label for="fname"> FirstName</label>
            <input type="text" name="fname" class="form-control">
            </div>
            <div class="form-group">
            <label for="lname"> LasttName</label>
            <input type="text" name="lname" class="form-control">
            </div><div class="form-group">
            <label for="mob"> Mobile</label>
            <input type="tel" name="mob" class="form-control">
            </div>





            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" name="add" value="ADD">
            </div>
        </div>
        </div>
        </div>
                    </div>
        </form>























        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        </body>
        </html>


        <?php
        include('footer.php');
        ?>