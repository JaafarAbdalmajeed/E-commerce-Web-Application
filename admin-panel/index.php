<?php include('../includes/header.php');
$row = $database->get_info('user_meta_tags', $_SESSION['user_id']);
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
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>


    <!-- Content Row -->
    <div class="row">



        <div class="col-lg-12 mb-4">



            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">SEO Controller</h6>
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
                                <label for="websiteTitle">Website Title:</label>
                                <input type="text" class="form-control" id="websiteTitle" name="title" readonly
                                    value="<?php echo $row['title']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="author">Author:</label>
                                <input type="text" class="form-control" id="author" name="author" readonly
                                    value="<?php echo $row['author']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="profession">Profession:</label>
                                <input type="text" class="form-control" id="profession" name="profession" readonly
                                    value="<?php echo $row['profession']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="twitter">Twitter:</label>
                                <input type="text" class="form-control" id="twitter" name="twitter" readonly
                                    value="<?php echo $row['twitter']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="linkedin">Linkedin:</label>
                                <input type="text" class="form-control" id="linkedin" name="linkedin" readonly
                                    value="<?php echo $row['linkedin']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" readonly
                                    value="<?php echo $row['email']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="tags">Tags:</label>
                                <input type="text" class="form-control" id="tags" name="tags" readonly
                                    value="<?php echo $row['tags']; ?>" placeholder="Enter tags, e.g., tag1, tag2, tag3">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="keywords">Keywords:</label>
                                <input type="text" class="form-control" id="keywords" name="keywords" readonly
                                    value="<?php echo $row['keywords']; ?>"
                                    placeholder="Enter keywords, e.g., keyword1, keyword2, keyword3">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea type="text" class="form-control" id="description" name="description" readonly><?php echo $row['description']; ?> </textarea>
                            </div>
                        </div>


                    </div>


                </div>
                <div class="card-body  border-top pro-det-edit collapse " id="pro-det-edit-2">
                    <form action="actions/seo.php" enctype="multipart/form-data" class="modal-form needs-validation"
                        method="post">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="websiteTitle">Website Title:</label>
                                    <input type="text" class="form-control" id="websiteTitle" name="title"
                                        value="<?php echo $row['title']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="author">Author:</label>
                                    <input type="text" class="form-control" id="author" name="author"
                                        value="<?php echo $row['author']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="profession">Profession:</label>
                                    <input type="text" class="form-control" id="profession" name="profession"
                                        value="<?php echo $row['profession']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="twitter">Twitter:</label>
                                    <input type="text" class="form-control" id="twitter" name="twitter"
                                        value="<?php echo $row['twitter']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="linkedin">Linkedin:</label>
                                    <input type="text" class="form-control" id="linkedin" name="linkedin"
                                        value="<?php echo $row['linkedin']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="<?php echo $row['email']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="tags">Tags:</label>
                                    <input type="text" class="form-control" id="tags" name="tags"
                                        value="<?php echo $row['tags']; ?>"
                                        placeholder="Enter tags, e.g., tag1, tag2, tag3" data-toggle="tooltip"
                                        data-placement="top"
                                        title="Enter descriptive tags that represent the main topics or categories of your content. Separate tags with commas. Example: Web Design, Responsive, JavaScript">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="keywords">Keywords:</label>
                                    <input type="text" class="form-control" id="keywords" name="keywords"
                                        value="<?php echo $row['keywords']; ?>"
                                        placeholder="Enter keywords, e.g., keyword1, keyword2, keyword3"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Enter specific keywords related to your content. These help search engines understand the focus of your page. Separate keywords with commas. Example: Web Development, Responsive Design, JavaScript">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea type="text" class="form-control" id="description" name="description"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Enter a brief and informative description of your content. This helps users and search engines understand the purpose of your page. Example: Showcase of my web development projects and skills."><?php echo $row['description']; ?> </textarea>
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