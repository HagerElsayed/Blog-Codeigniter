<!DOCTYPE html>
<html>

<head>
    <title>CI Series</title>
    <style>
        body {
            background: #F2F2F2
        }
        
        #wrapper {
            width: 980px;
            margin: 0 auto;
            background: #FFF;
            padding: 10px;
        }
        
        #navcontroller ul {
            padding-left: 0;
            margin-left: 0;
            background-color: #036;
            color: white;
            float: left;
            width: 100%;
            font-family: Arial, Helvetica, sans-serif;
        }
        
        #navcontroller ul li {
            display: inline;
        }
        
        #navcontroller ul li a {
            padding: 0.2em 1em;
            background-color: #036;
            float: left;
            color: white;
            text-decoration: none;
            border-right: 1px solid #fff
        }
    </style>
</head>

<body>

    <div id="wrapper">
        <h1>MY Blog</h1>
        <div id="container">
            <?php  if($success==1){?>
              <div style="color:white;background:green;">This is Post has been updated</div>
            <?php } ?>
            <form  action="<?=base_url()?>index.php/Posts/edit_post/<?=$post['postID']?>" method="post">
            <p>Title : <input type="text" name="title" value="<?=$post['title']?>"/></p>
            <p>Description : <textarea name="post" ><?=$post['post']?></textarea></p>
            <p><input type="submit" value="Edit Post"/></p> 
            </form>
        
    </div>
</div>
</body>

</html>