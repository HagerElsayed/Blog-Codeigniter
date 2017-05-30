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
            <h1>Blog Posts</h1>
            <?php if(!isset($post)){ ?>
                <p>This is Page was accessed Incorrectly </p>

             <?php }else{ ?>
             <h2><?=$post['title']?></h2>
             <?=$post['post']?>

             <?php }?>
    </div>
</div>
</body>

</html>