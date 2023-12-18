<?php include('../includes/header.php');?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">product</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">product List</h6>
            <button type="button" class="add-click btn btn-primary float-right" data-toggle="modal"
                data-target="#productModal">Add</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>

                            <th>Name</th>
                            <th>Category</th>
                            <th>Stock Quantity</th>
                            <th>Price</th>
                            <th>Description</th>
                           
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                    $i=1;
                    $row=$database->getTableList('products');
                    foreach($row as $value){
                        // echo $value->image;
                    ?>

                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><a href="<?php echo "img/".$value->image; ?>" target="_blank"><img src="<?php echo "img/".$value->image; ?>" width="50" height="50" alt="product image"></a></td>

                            <td><?php echo $value->name; ?></td>
                            <td><?php echo $database->getColumn('categories','name',$value->category_id); ?></td>
                            <td><?php echo $value->stock_quantity; ?></td>
                            <td><?php echo $value->price; ?></td>
                            <td><?php echo $value->description; ?></td>
                            
                            <td>



                                <button type="button" id="<?php echo $value->id;?>" table="products" data-toggle="modal"
                                    data-target="#productModal" class="btn btn-icon btn-success update_ edit-click"><i
                                        class="fas fa-edit"></i></button>
                                <button data-toggle="modal" data-target="#modal-delete" type="button"
                                    id="<?php echo $value->id;?>" table="products"
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
                Table: 'products'
            },
            dataType: "json",
            success: function (data) {

                $('#productName').val(data.name);
                $('#categorySelect').val(data.category_id).trigger('change');
                $('#stockQuantity').val(data.stock_quantity);
                $('#productPrice').val(data.price);
                $('#priceAfterSale').val(data.price_after_sale);
                $('#productDescription').val(data.description);
                if(data.is_on_sale == 1){
                $('#isOnSale').prop('checked', data.is_on_sale);
                }
                $('.primaryId').val(id);
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error: " + status + " - " + error);
            }
        })
    });
</script>