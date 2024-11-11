<?php
global $user; 
global $posts;

// Fetch posts from the database
$posts = get_posts(); // Fetch posts from the database using the function

// Function to check if the current user has liked the post
function check_if_liked($post_id, $user_id) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM likes WHERE post_id = ? AND user_id = ?");
    $stmt->bind_param("ii", $post_id, $user_id); // 'ii' means integer
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}
?>

<div class="container col-md-10 col-sm-12 col-lg-9 rounded-0 d-flex justify-content-between">
    <div class="col-md-8 col-sm-12" style="max-width:93vw">
        <?php
        // Loop through the posts and display them
        foreach ($posts as $post) {
            $post_user_id = $post['user_id'];
            $post_img = $post['post_img'];
            $post_text = $post['post_text'];
            $created_at = $post['created_at'];

            // Fetch the user's info for the post (name, profile picture)
            $user_info = get_user_info($post_user_id);
            $post_user_name = $user_info['first_name'] . ' ' . $user_info['last_name'];
            $post_user_username = $user_info['username'];
            $post_user_profile_pic = $user_info['profile_pic'];

            // Check if the current user has liked the post
            $liked = check_if_liked($post['id'], $user['id']);
        ?>
        <div class="card mt-4">
            <div class="card-title d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center p-2">
                    <img src="assets/images/profile/<?= $post_user_profile_pic ?>" alt="" height="30" width="30" class="rounded-circle border">
                    &nbsp;&nbsp;<a href="#" class="text-decoration-none text-dark"><?= $post_user_name ?></a>
                </div>
                <div class="p-2">
                    <div class="dropdown">
                        <i class="bi bi-three-dots-vertical" id="option1" data-bs-toggle="dropdown" aria-expanded="false"></i>
                        <ul class="dropdown-menu" aria-labelledby="option1">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash-fill"></i> Delete Post</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <img src="assets/images/posts/<?= $post_img ?>" loading="lazy" alt="Post Image">
            <h4 style="font-size: x-larger" class="p-2 border-bottom d-flex">
                <span>
                    <?php if ($liked): ?>
                        <i class="bi bi-heart-fill text-danger"></i>
                    <?php else: ?>
                        <i class="bi bi-heart text-muted"></i>
                    <?php endif; ?>
                </span>
                &nbsp;&nbsp;<i class="bi bi-chat-left d-flex align-items-center">
                    <span class="p-1 mx-2 text-small" style="font-size:small" data-bs-toggle="modal" data-bs-target="#postview<?= $post['id'] ?>">5 comments</span>
                </i> 
            </h4>
            <div>
                <span class="p-1 mx-2" data-bs-toggle="modal" data-bs-target="#likes<?= $post['id'] ?>">10 likes</span>
                <span style="font-size:small" class="text-muted">Posted <?= time_ago($created_at) ?></span>
            </div>
            <div class="card-body">
                <p><?= nl2br($post_text) ?></p>
            </div>

            <div class="input-group p-2 border-top">
                <input type="text" class="form-control rounded-0 border-0 comment-input" placeholder="say something..">
                <button class="btn btn-outline-primary rounded-0 border-0 add-comment" type="button">Post</button>
            </div>
        </div>
        <?php } ?>
    </div>

    <!-- Sidebar for follow suggestions -->
    <div class="col-lg-4 col-sm-0 overflow-hidden mt-4 p-sm-0 p-md-3">
        <div class="d-flex align-items-center p-2">
            <div><img src="assets/images/profile/<?= $user['profile_pic'] ?>" alt="" height="60" width="60" class="rounded-circle border"></div>
            <div>&nbsp;&nbsp;&nbsp;</div>
            <div class="d-flex flex-column justify-content-center">
                <a href='?u=<?= $user['username'] ?>' class="text-decoration-none text-dark"><h6 style="margin: 0px;"><?= $user['first_name'] ?> <?= $user['last_name'] ?></h6></a>
                <p style="margin:0px;" class="text-muted">@<?= $user['username'] ?></p>
            </div>
        </div>
        <h6 class="text-muted p-2">You Can Follow Them</h6>

        <?php 
        // Sample static follow suggestions
        $follow_suggestions = [
            ['profile_pic' => 'profile-1.jpeg', 'name' => 'Yasemin Çelik', 'username' => 'YasCel1210'],
            ['profile_pic' => 'profile-2.jpg', 'name' => 'Ali Sarsalmaz', 'username' => 'HiItsAli'],
            ['profile_pic' => 'profile-3.jpg', 'name' => 'Emre Yildiz', 'username' => 'EmYil29'],
            ['profile_pic' => 'profile-4.jpg', 'name' => 'Leyla Conur Ataç', 'username' => 'Leyyylaaa'],
            ['profile_pic' => 'profile-5.jpg', 'name' => 'Emir Kaya', 'username' => 'ateşEmir'],
            ['profile_pic' => 'profile-6.jpg', 'name' => 'Burak Aydin', 'username' => 'BurAy'],
            ['profile_pic' => 'profile-7.jpg', 'name' => 'Asli Mertoğlu', 'username' => 'GuzelAsli']
        ];

        foreach ($follow_suggestions as $suggestion) { ?>
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center p-2">
                    <div><img src="assets/images/profile/<?= $suggestion['profile_pic'] ?>" alt="" height="40" width="40" class="rounded-circle border"></div>
                    <div>&nbsp;&nbsp;</div>
                    <div class="d-flex flex-column justify-content-center">
                        <a href="#" class="text-decoration-none text-dark"><h6 style="margin: 0px;font-size: small;"><?= $suggestion['name'] ?></h6></a>
                        <p style="margin:0px;font-size:small" class="text-muted">@<?= $suggestion['username'] ?></p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <button class="btn btn-sm btn-primary">Follow</button>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
