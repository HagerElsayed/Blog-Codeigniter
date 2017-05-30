<h3>Your File was Successfully Upload </h3>
<ul>
<?php foreach($upload_data as $key=>$value){?>
<li><?= $key?>:<?=$value?></li>
<?php } ?>
</ul>
<p><a href="<?=base_url()?>index.php/Upload">Upload Anther File</a></p>