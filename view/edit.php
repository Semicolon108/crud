<?php
    include_once "../vendor/includes/autoload.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" href="../resources/bootstrap/dist/css/bootstrap.min.css">
    <!--FontAwesome CDN-->
    <script src="https://kit.fontawesome.com/ca4fb61032.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="bg-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                   <h4 class="my-4">CRUD</h4>
                </div>
            </div>
        </div>
    </header>
   <main>
       <div class="container my-4">
           <div class="row justify-content-center">
               <div class="jumbotron">
                   <?php
                        if(isset($_GET['edit'])){
                            $edit_id = $_GET['edit'];
                            $data = new Crud();
                            $entry = $data->select_this($edit_id);
                            $firstName = $entry['first_name'];
                            $lastName = $entry['last_name'];
                            $age = $entry['age'];
                        }
                        if(isset($_POST['edt'])){
                            //$id = $_GET['edit'];
                            $fName = $_POST['first_name'];
                            $lName = $_POST['last_name'];
                            $yr = $_POST['age'];

                            $field = [
                                "first_name"=>$fName,
                                "last_name"=>$lName,
                                "age"=>$yr
                            ];
                            $update = new Crud();
                            $update->update($field,$edit_id);
                        }
                   ?>
                    <form action="edit.php?edit=<?=$_GET['edit']?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="fName">First Name</label>
                            <input type="text" value="<?= $firstName?>" class="form-control" name='first_name' id="fName" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="lName">Last Name</label>
                            <input type="text" value="<?= $lastName?>" class="form-control" name='last_name' id="lName" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="yr">Age</label>
                            <input type="number" value="<?= $age?>" name='age' class="form-control" id="yr">
                        </div>
                        <input type="hidden" class="form-control" name='id' id="edit" aria-describedby="emailHelp"/>
                        <input type="submit" value='submit' name="edt" class="btn btn-primary"/>
                    </form>
               </div>
           </div>
       </div>
   </main>
   </body>  