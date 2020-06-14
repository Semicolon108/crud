
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header bg-dark text-white justify-content-center">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="index.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="firstName">First Name</label>
              <input type="text" class="form-control" name='first_name' id="firstName" aria-describedby="emailHelp">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="lastName">Last Name</label>
              <input type="text" class="form-control" name='last_name' id="lastName" aria-describedby="emailHelp">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="age">Age</label>
              <input type="number" name='age' class="form-control" id="age">
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <!--input type="hidden" class="form-control" name='id' id="edit" aria-describedby="emailHelp"-->
            <input type="submit" value='submit' name="submit" class="btn btn-success btn-sm"/>
          </form>
      </div>
    </div>
  </div>
</div>
<!--/Add Modal--> 

<!--Edit Modal-->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="index.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="fName">First Name</label>
          <input type="text" class="form-control" name='first_name' id="fName" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="lName">Last Name</label>
          <input type="text" class="form-control" name='last_name' id="lName" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="yr">Age</label>
          <input type="number" name='age' class="form-control" id="yr">
        </div>
        <input type="hidden" class="form-control" name='id' id="edit" aria-describedby="emailHelp"/>
        <input type="submit" value='submit' name="edt" class="btn btn-primary"/>
      </form>
      </div>
    </div>
  </div>
</div>
<!--/Edit Modal--> 