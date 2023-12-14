<?php include('../includes/header.php');
$row = $database->get_info('footer', $_SESSION['user_id']);
// echo 'user'.$row['user_id'];
if($row['user_id'] != ''){
    $name='update';
}else{
    $name='add';
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Website Sections</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>


    <!-- Content Row -->
    <div class="row">



        <div class="col-lg-12 mb-4">



            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Footer</h6>
                    <button type="button" class="edit-privilege btn btn-primary btn-sm rounded m-0 float-right"
                        data-toggle="collapse" data-target=".pro-det-edit" aria-expanded="false"
                        aria-controls="pro-det-edit-1 pro-det-edit-2">
                        <i class="fas fa-edit"></i>
                    </button>
                </div>
                <div class="card-body  border-top pro-det-edit collapse show">

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="text" class="form-control" id="phone" name="phone" readonly
                                    value="<?php echo $row['phone']; ?>">
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="Email">Email:</label>
                                <input type="email" class="form-control" id="Email" name="email" readonly
                                    value="<?php echo $row['email']; ?>">
                            </div>
                        </div>
                      
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="GitHub">GitHub:</label>
                                <input type="text" class="form-control" id="GitHub" name="gitHub" readonly
                                    value="<?php echo $row['gitHub']; ?>">
                            </div>
                        </div>
                     
                        <div class="col-sm-4">
                            <div class="form-group">
                              <a href="<?php echo "img/".$row['logo'];?>" target="_blank"> <img src="<?php echo "img/".$row['logo'];?>"  width="150" height="100" alt="Header Photo" ></a>
                            </div>
                        </div>
                       


                    </div>


                </div>
                <div class="card-body  border-top pro-det-edit collapse " id="pro-det-edit-2">
                    <form action="actions/footer.php" enctype="multipart/form-data" class="modal-form needs-validation"
                        method="post">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="phone">Phone:</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        value="<?php echo $row['phone']; ?>">
                                </div>
                            </div>
                           
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="Email">Email:</label>
                                    <input type="email" class="form-control" id="Email" name="email"
                                        value="<?php echo $row['email']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="GitHub">GitHub:</label>
                                    <input type="text" class="form-control" id="GitHub" name="gitHub"
                                        value="<?php echo $row['gitHub']; ?>">
                                </div>
                            </div>
                           
                            
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="Photo">Logo:</label>
                                    <input type="file" accept="image/*" class="form-control" id="Photo" name="logo"
                                        value="<?php echo $row['logo']; ?>">
                                </div>
                            </div>
                         
                            <div class="col-sm-12">
                                <input type="hidden" name="primaryId" value="<?php echo $row['id']; ?>">

                                <button class="btn  btn-primary SubmitClick" name=<?php echo $name; ?> type="submit">Update</button>
                            </div>


                        </div>


                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?php include('../includes/footer.php');?>