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
                        <form action="search.php" method="get" class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" id="search" type="search" placeholder="Search" aria-label="Search">
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
                    if(isset($_GET['check'])):
                        $data = $_GET['search'];
                        $obj = new Crud();
                        $entries = $obj->search_this($data);
                        //print_r($entries);
                        $index = 1;
                        if(!empty($entries)):
                            foreach($entries as $ro):
                    ?>
                                <tr>
                                    <td style="display:none"><?=$ro["id"]?></td>
                                    <td><?=$index?></td>
                                    <td><?=$ro['first_name']?></td>
                                    <td><?=$ro['last_name']?></td>
                                    <td><?=$ro['age']?></td>
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
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <!--script>
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
               $("#check").click((e)=>{
                   e.preventDefault();
                   let data = $("#search").val();
                   //console.log(data);
                   if(data){
                       $.ajax({
                           url : "http://localhost/crud/view/search.php?search="+data,
                           method : "GET",
                           success : (res)=>{
                               //console.log(res);
                           }
                       })
                   }
               })
            })
        </script-->
    </footer>
</body>
</html>