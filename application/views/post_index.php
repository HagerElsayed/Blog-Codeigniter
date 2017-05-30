<?php if($this->session->userdata('userID')){ ?>
<h1>Your are Logged in</h1>
<p><a href="<?=base_url()?>index.php/Users/logout">Logout</a></p>
<p>User type :<?=$this->session->userdata('user_type')?></p>
<?php }else{ ?>
<p><a href="<?=base_url()?>index.php/Users/login">Login</a></p>

<?php } ?>
 <h1>Blog Posts</h1>
            <?php
                if(!isset($posts)){
                 ?>
                <p>There are Currently Posts in My Blog </p>

                <?php
                }else{
                    foreach($posts as $row){ 
                ?>
                    <h2>
                        <a href="<?=base_url()?>index.php/Posts/Post/<?=$row['postID']?>">
                            <?=$row['title']?>
                        </a> -
                        <a href="<?=base_url()?>index.php/Posts/edit_post/<?=$row['postID']?>">
                            Edit
                        </a>|
                        <a href="<?=base_url()?>index.php/Posts/delete_post/<?=$row['postID']?>">
                            Delete
                        </a>


                    </h2>
                    <p>
                        <?=substr(strip_tags($row['post']),0,200)."..."?>
                    </p>
                    <p>
                        <a href="<?=base_url()?>index.php/Posts/Post/<?=$row['postID']?>">
                            Read More ..
                        </a>
                    </p>
                    <hr>
                    <?php
                    }
                }
                ?>

                <?= $pages ?>

       