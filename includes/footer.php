</div>
<!-- End of Main Content -->
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; AyaTweme 2023</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- Users Modal-->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="actions/users.php" enctype="multipart/form-data" class="modal-form needs-validation"
                method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="usersName">Name:</label>
                                <input type="text" class="form-control" id="usersName" name="name" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="usersEmail">Email:</label>
                                <input type="email" class="form-control" id="usersEmail" name="email" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="usersUserName">username:</label>
                                <input type="text" class="form-control" id="usersUserName" name="username" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="usersPassword">Password:</label>
                                <input type="password" class="form-control editView" id="usersPassword" name="password"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="confirmPassword">Confirm Password:</label>
                                <input type="password" class="form-control editView" id="confirmPassword"
                                    name="confirmPassword" required>
                                <small id="passwordMatchError" class="form-text text-danger d-none">Passwords do not
                                    match.</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="primaryId" class="primaryId" value="">
                    <input type="hidden" class="table_name" name="table_name">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary modal-submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- category Modal-->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="actions/category.php" enctype="multipart/form-data" class="modal-form needs-validation"
                method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="categoryName">Name:</label>
                                <input type="text" class="form-control" id="categoryName" name="name"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="Photo">Image:</label>
                                    <input type="file" accept="image/*" class="form-control" id="Photo" name="image">
                                </div>
                            </div>

                       

                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="primaryId" class="primaryId" value="">
                    <input type="hidden" class="table_name" name="table_name">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary modal-submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- product Modal-->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="actions/product.php" enctype="multipart/form-data" class="modal-form needs-validation"
                method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="productName">Name:</label>
                                <input type="text" class="form-control" id="productName" name="name" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Photo">Image:</label>
                                <input type="file" accept="image/*" class="form-control" id="Photo" name="image">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="categorySelect">Category:</label>
                                <select class="form-control" id="categorySelect" name="category_id" required>
                                    <option value="" disabled selected>Select a category</option>
                                    <?php $categoryRow=$database->getTableList('categories');
                                    foreach($categoryRow as $categoryValue){
                                    ?>
                                    <option value="<?php echo $categoryValue->id?>"><?php echo $categoryValue->name?></option>
                               
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="stockQuantity">Stock Quantity:</label>
                                <input type="number" class="form-control" id="stockQuantity" name="stock_quantity" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="productPrice">Price:</label>
                                <input type="number" step="0.01" class="form-control" id="productPrice" name="price" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="priceAfterSale">Price After Sale:</label>
                                <input type="number" step="0.01" class="form-control" id="priceAfterSale" name="price_after_sale">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="productDescription">Description:</label>
                                <textarea class="form-control" id="productDescription" name="description"></textarea>
                            </div>
                        </div>
                      
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="isOnSale" name="is_on_sale">
                                    <label class="form-check-label" for="isOnSale">Is on Sale</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="primaryId" class="primaryId" value="">
                    <input type="hidden" class="table_name" name="table_name">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary modal-submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-delete" role="dialog">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body"> Are You Sure ? </div>
                <form action="actions/delete.php" method="post">
                    <div class="modal-footer">
                    <input type="hidden" class="table_name" name="table_name">
                        <input type="hidden" id="ids" name="id" value="">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">No</button>
                        <input value="Yes" name="delete" type="submit"
                            class="modal-submit btn btn-danger">
                    </div>
                </form>
            </div>
        </div>
    </div>


<!-- Bootstrap core JavaScript-->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>


<!-- Bootstrap JS and Popper.js (required for tooltips) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script>
    $(document).on('click', '.add-click', function () {
        $('.modal-header').html("Add");
        $('.modal-submit').attr('name', 'add');
        $(".modal-form").trigger("reset");
    });
    $(document).on('click', '.edit-click', function () {
        $('.modal-header').html("Edit");
        $('.modal-submit').attr('name', 'update');
        $(".modal-form").trigger("reset");
        var tbl = $(this).attr('table');
        $('.table_name').val(tbl);
        $('.editView').attr('required', false);

    });
    $(document).on('click', '.delete-click', function () {
        var id = $(this).attr('id');
        var tbl = $(this).attr('table');
        $('#ids').val(id);
        $('.table_name').val(tbl);
        $('.modal-header').html("Delete");
        $('.modal-submit').attr('name', 'delete');
    });
   
</script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<script>
    // Get references to the password and confirm password fields
    var passwordField = document.getElementById('usersPassword');
    var confirmPasswordField = document.getElementById('confirmPassword');
    var passwordMatchError = document.getElementById('passwordMatchError');
    var submitButton = document.querySelector('.modal-submit');
    // Add an input event listener to the confirm password field
    confirmPasswordField.addEventListener('input', function () {
        // Compare the values of the password and confirm password fields
        var password = passwordField.value;
        var confirmPassword = confirmPasswordField.value;
        // Display or hide the error message based on whether the passwords match
        if (password !== confirmPassword) {
            passwordMatchError.classList.remove('d-none');
            submitButton.disabled = true;
        } else {
            passwordMatchError.classList.add('d-none');
            submitButton.disabled = false;
        }
    });
</script>
</body>

</html>