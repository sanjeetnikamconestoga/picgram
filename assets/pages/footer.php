<?php if(isset($_SESSION['Auth'])){ ?>
    <!-- Add New Post Modal -->
    <div class="modal fade" id="addpost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" style="display:none" id="post_img" class="w-100 rounded border">
                    <form method="post" action="assets/php/actions.php?addpost" enctype="multipart/form-data">
                        <div class="my-3">
                            <input class="form-control" name="post_img" type="file" id="select_post_img">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Say Something</label>
                            <textarea name="post_text" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                        </div>
                        <!-- // test -->
                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Static Notification Sidebar -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="notification_sidebar" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Notifications</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">


        </div>
    </div>

    <!-- Static Message Sidebar -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="message_sidebar" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Messages</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

        </div>
    </div>

<?php } ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/jquery.timeago.js"></script>
<script src="assets/js/custom.js?v=<?=time()?>"></script>
