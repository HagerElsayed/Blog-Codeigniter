<?= $error;?>

<?= form_open_multipart('Upload/do_upload') ?>
<?php 
$data_form=array(
    'name'=>'userfile'

);
echo form_upload($data_form);
?>
<?= 
form_submit('', 'Upload');
  ?> 
<?= 
form_close();
?>