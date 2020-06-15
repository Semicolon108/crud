<?php
    include_once "../vendor/includes/autoload.inc.php";
    if(isset($_POST['submit'])){
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $age = $_POST['age'];

        $fields = [
            "first_name"=>$firstName,
            "last_name"=>$lastName,
            "age"=>$age
        ];
        $obj = new Crud();
        $obj->insert($fields);
    }
    if(isset($_POST['edt'])){
        $id = $_POST['id'];
        $fName = $_POST['first_name'];
        $lName = $_POST['last_name'];
        $yr = $_POST['age'];

        $field = [
            "first_name"=>$fName,
            "last_name"=>$lName,
            "age"=>$yr
        ];
        $update = new Crud();
        $update->update($field,$id);
    }
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $del_obj = new Crud();
        $del_obj->delete_this($id);
    }
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
<body class="">
    <header>
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
            <div class="jumbotron">
                <div class="row">
                    <div class="col-6">
                        <button type="button" id="add" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                            Add Data
                        </button>
                    </div>
                    <div class="col-6 justify-content-end">
                        <form action="index.php?search=<?=$_GET['search']?>" method="get" class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" id="check" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <table class="table table-stripped table-bordered table-dark my-4 text-center" id="tab">
                <thead>
                    <tr>
                        <td>S/N</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Age</td>
                        <td>Action</td>
                    </tr> 
                </thead>
                <tbody>
                    <?php
                        if($_GET):
                            $data = $_GET['search'];
                            $obj = new Crud();
                            $entries = $obj->search_this($data);
                            $index = 1;
                            if(!empty($entries)):
                                foreach($entries as $row):
                    ?>
                                    <tr>
                                        <td style="display:none"><?=$row["id"]?></td>
                                        <td><?=$index?></td>
                                        <td><?=$row['first_name']?></td>
                                        <td><?=$row['last_name']?></td>
                                        <td><?=$row['age']?></td>
                                        <td><button class="btn btn-ouline-success btn-sm edt-btn text-white"><i class="fas fa-pencil-alt"></i></button>&nbsp;<a href="index.php?delete=<?=$row['id']?>" class="btn btn-outlne-danger text-white"><i class="fas fa-trash-alt"></i></a></td>
                                    </tr>
                    <?php
                                    $index++;
                                endforeach;
                            endif;
                        else:
                            $obj = new Crud();
                            $entries = $obj->select();
                            $index = 1;
                            if(!empty($entries)):
                                foreach($entries as $row):
                    ?>
                                    <tr>
                                        <td style="display:none"><?=$row["id"]?></td>
                                        <td><?=$index?></td>
                                        <td><?=$row['first_name']?></td>
                                        <td><?=$row['last_name']?></td>
                                        <td><?=$row['age']?></td>
                                        <td><button class="btn btn-ouline-success btn-sm edt-btn text-white"><i class="fas fa-pencil-alt"></i></button>&nbsp;<a href="index.php?delete=<?=$row['id']?>" class="btn btn-outlne-danger text-white"><i class="fas fa-trash-alt"></i></a></td>
                                    </tr>
                    <?php
                                    $index++;
                                endforeach;    
                            endif;
                        endif;    
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </main>
    <footer>
        <?php 
            include_once "modal.inc.php";
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script>
            $(document).ready(()=>{
               $(".edt-btn").click(function(e){
                   e.preventDefault();
                   $("#editModal").modal('show');
                   $tr = $(this).closest("tr");
                   var data = $tr.children("td").map(function(){
                       return $(this).text();
                   }).get();
                   console.log(data);
                   $("#fName").val(data[2]);
                   $("#lName").val(data[3]);
                   $("#yr").val(data[4]);
                   $("#edit").val(data[0]);
               });
            })
        </script>
    </footer>
</body>
</html>