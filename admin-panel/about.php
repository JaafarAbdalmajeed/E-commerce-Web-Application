<?php include('../includes/header.php');
$row = $database->get_info('about', $_SESSION['user_id']);
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
        <h1 class="h3 mb-0 text-gray-800">About Me Section</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>


    <!-- Content Row -->
    <div class="row">



        <div class="col-lg-12 mb-4">



            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">About me</h6>
                    <button type="button" class="edit-privilege btn btn-primary btn-sm rounded m-0 float-right"
                        data-toggle="collapse" data-target=".pro-det-edit" aria-expanded="false"
                        aria-controls="pro-det-edit-1 pro-det-edit-2">
                        <i class="fas fa-edit"></i>
                    </button>
                </div>
                <div class="card-body  border-top pro-det-edit collapse show">

                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Summary">Summary:</label>
                                <textarea type="text" class="form-control" id="Summary" name="summary" readonly
                                    value=""><?php echo $row['summary']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <a href="<?php echo "img/".$row['photo'];?>" target="_blank"> <img
                                        src="<?php echo "img/".$row['photo'];?>" width="80" height="80"
                                        alt="Header Photo"></a>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                           
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                    $i=1;
                    $rowSkills=$database->get_SpecificList('skills','related_id',$row['id']);
                    foreach($rowSkills as $value){
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $value->name; ?></td>
                          
                           
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
                        </div>


                    </div>


                </div>
                <div class="card-body  border-top pro-det-edit collapse " id="pro-det-edit-2">
                    <form action="actions/about.php" enctype="multipart/form-data" class="modal-form needs-validation"
                        method="post">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="Summary">Summary:</label>
                                    <textarea type="text" class="form-control" id="Summary" name="summary" 
                                        value=""><?php echo $row['summary']; ?></textarea>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="Photo">Photo:</label>
                                    <input type="file" accept="image/*" class="form-control" id="Photo" name="photo"
                                        value="<?php echo $row['photo']; ?>">
                                </div>
                            </div>

                            

                        </div>
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h5 class="text-primary">Skills</h5>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <button type="button" id="add_skills" class="btn btn-icon btn-success has-ripple"><i
                                            class="fas fa-plus"></i><span class="ripple ripple-animate"></span></button>
                                </div>
                            </div>
                        </div>
                        <div class="row Primary_div">
                            <div class="col-sm-6" id="about_skills">
                                <div class="form-group">
                                    <input type="text" autocomplete="off" class="form-control" name="skills[]" />
                                </div>
                            </div>

                            <div class="col-sm-2">
                            </div>
                        </div>
                        <div id="add_skillsInfo"> </div>

                        <div class="row">
                        <div class="col-sm-12">
                                <input type="hidden" name="primaryId" value="<?php echo $row['id']; ?>">

                                <button class="btn  btn-primary SubmitClick" name=<?php echo $name; ?>
                                    type="submit">Update</button>
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

