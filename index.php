<?php
include('header.php');
include('db.php');
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Add new client 
                </div>
            
             <div class="card-body">
                <form action="insert.php" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="mobile" name="phone" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="Description">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="btnsubmit" class="btn btn-success submitbtn">
                </div>
             </div>
             </form>
            </div>
        </div>
    </div>

</div>


<style type="text/css">
   .card{
            margin-top:10px;

      }
    .submitbtn{
        margin-top:7px;
    }
</style>