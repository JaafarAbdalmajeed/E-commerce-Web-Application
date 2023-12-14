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
<!-- experience Modal-->
<div class="modal fade" id="experienceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="actions/experience.php" enctype="multipart/form-data" class="modal-form needs-validation"
                method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="experienceName">Job title:</label>
                                <input type="text" class="form-control" id="experienceJobTitle" name="job"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="experienceEmployer">Employer:</label>
                                <input type="text" class="form-control" id="experienceEmployer" name="employer"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="experienceStart">Start date:</label>
                                <input type="date" class="form-control" id="experienceStart"
                                    name="start_date" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="experienceEnd">End date:</label>
                                <input type="date" class="form-control" id="experienceEnd"
                                    name="end_date" >
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
<!-- projects Modal-->
<div class="modal fade" id="projectsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="actions/projects.php" enctype="multipart/form-data" class="modal-form needs-validation"
                method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="projectsName">Project Title:</label>
                                <input type="text" class="form-control" id="projectsTitle" name="name"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="projectsDescription">Description:</label>
                                <textarea type="text" class="form-control" id="projectsDescription" name="description"
                                    required></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Photo">Photo:</label>
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
    let count = 1;

    $('#add_skills').click(function () {
        count++;
        var a = '<div id="skills' + count + '" class="row">' + '<div class="col-md-6" >' + document
            .getElementById("about_skills").innerHTML + '</div>';

        var b = '<div class="col-md-2">' + '<div class="form-group" >' +
            '<button type="button" id ="' + count +
            '" class="btn btn_remove_skills btn-icon btn-danger has-ripple" > <i class="fas fa-minus" > </i><span class="ripple ripple-animate"></span > </button></div > </div>' +
            '</div > ';
        $('#add_skillsInfo').append(a + b);


    });

    $(document).on('click', '.btn_remove_skills', function () {
        var button_id = $(this).attr("id");
        $('#skills' + button_id).remove();
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