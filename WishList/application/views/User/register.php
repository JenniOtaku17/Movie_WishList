
<div class="container">
<div style="background-color: #fff; padding: 2%; margin-top:5%;">
  <h2 style="text-align: center;">Sign UP</h2>
  
  <?= form_open('user/store') ?>
  <div class="form-group">
    <?php
        $name= array(
            'name' => 'name',
            'placeholder' => 'Please enter you name',
            'class' => 'form-control'
        );
        $email= array(
            'name' => 'email',
            'placeholder' => 'Please enter you email',
            'type' => 'email',
            'class' => 'form-control'
        );
        $password= array(
            'name' => 'password',
            'placeholder' => 'Please enter you password',
            'type' => 'password',
            'class' => 'form-control'
        );
        $confirm= array(
            'name' => 'confirm',
            'placeholder' => 'Please confirm you password',
            'type' => 'password',
            'class' => 'form-control'
        );
        ?>

        <?= form_label('Name:', 'name') ?>
        <?= form_input($name) ?>
        <br>
        <?= form_label('Email:', 'email') ?>
        <?= form_input($email) ?>
        <br>
        <?= form_label('Password:', 'password') ?>
        <?= form_input($password) ?>
        <br>
        <?= form_label('Confirm Password:', 'confirm') ?>
        <?= form_input($confirm) ?>
        <br>

        
        <?= form_submit('', 'Register', 'class="btn btn-primary"') ?>
  </div>
  <?= form_close() ?>

</body>
</html>