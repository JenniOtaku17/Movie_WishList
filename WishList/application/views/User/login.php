<div class="container">
<div style="background-color: #fff; padding: 2%; margin-top:5%;">
  <h2 style="text-align: center;">Log In</h2>
  
  <?= form_open('user/processlogin') ?>
  <div class="form-group">
    <?php

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

        ?>

        <?php
            echo $this->session->flashdata("error");
        ?><br>

        <?= form_label('Email:', 'email') ?>
        <?= form_input($email) ?>
        <br>
        <?= form_label('Password:', 'password') ?>
        <?= form_input($password) ?>
        <br>
        
        <?= form_submit('', 'Log In', 'class="btn btn-primary"') ?>

  </div>
  <?= form_close() ?>
    </div>
    </div>
</body>
</html>