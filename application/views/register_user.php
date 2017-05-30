<h2>Register</h2>
<?php if(validation_errors()){ ?>
<div style="background:red;color:white;">
<?= validation_errors(); ?>
</div>
<?php } ?>


<?= form_open(base_url().'index.php/Users/register');?>

<p>Username:<?php
$data_form=array(
    'name'=>'username',
    'size'=>40,
    'style'=>'border:1px solid purple;',
    'id'=>'username',
    'value'=>set_value('username')
);
echo form_input($data_form);?></p>

<p><?= form_label('Email', 'email');?>: 
<?php
$data_form=array(
    'name'=>'email',
    'size'=>40,
    'style'=>'border:1px solid purple;',
    'id'=>'email',
    'value'=>set_value('email')
);
echo form_input($data_form);?></p>

<p><?= form_label('Password', 'password');?>: 
<?php
$data_form=array(
    'name'=>'password',
    'size'=>40,
    'style'=>'border:1px solid purple;',
    'id'=>'password',
    'type'=>'password'
);
echo form_input($data_form);?></p>

<p><?= form_label('Confirm Password', 'password2');?>: 
<?php
$data_form=array(
    'name'=>'password2',
    'size'=>40,
    'style'=>'border:1px solid purple;',
    'id'=>'password2',
    'type'=>'password'
);
echo form_input($data_form);?></p>
<p>User Type :
<?php
$option=array(
    ''=>'--',
    'admin'=>'Admin',
    'author'=>'Author',
    'user'=>'User'
);
$js='onchange="alert(\'Hi\');" id="user_type"';
echo form_dropdown('user_type',$option,set_value('user_type'),$js);


?>
    
</p>
<p><?=form_submit('', 'Register');?></p>


<?= form_close();?>