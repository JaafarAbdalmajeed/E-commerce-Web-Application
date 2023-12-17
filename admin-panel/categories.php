<?php include('../includes/header.php');?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Category</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Category List</h6>
            <button type="button" class="add-click btn btn-primary float-right" data-toggle="modal"
                data-target="#categoryModal">Add</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>

                            <th>Name</th>
                           
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                    $i=1;
                    $row=$database->getTableList('categories');
                    foreach($row as $value){
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><a href="<?php echo "img/".$value->image; ?>" target="_blank"><img src="<?php echo "img/".$value->image; ?>" width="50" height="50" alt="Category image"></a></td>

                            <td><?php echo $value->name; ?></td>
                            
                            <td>



                                <button type="button" id="<?php echo $value->id;?>" table="categories" data-toggle="modal"
                                    data-target="#categoryModal" class="btn btn-icon btn-success update_ edit-click"><i
                                        class="fas fa-edit"></i></button>
                                <button data-toggle="modal" data-target="#modal-delete" type="button"
                                    id="<?php echo $value->id;?>" table="categories"
                                    class="delete-click remove_record delete-privilege btn btn-icon btn-danger"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php include('../includes/footer.php'); ?>

<script type="text/javascript">
    $(document).on('click', '.edit-click', function () {
        var id = $(this).attr("id");
        
        $.ajax({
            url: "../includes/fetch_records.php",
            method: "POST",
            data: {
                id: id,
                type: 'List',
                Table: 'categories'
            },
            dataType: "json",
            success: function (data) {

                $('#categoryName').val(data.name);
                
                $('.primaryId').val(id);
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error: " + status + " - " + error);
            }
        })
    });
</script>