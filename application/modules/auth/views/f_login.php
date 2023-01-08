<h2>login member terdaftar</h2>
<table border="1">
  <?php echo form_open('app_login/p_login'); ?>
  <tr>
    <td><?php echo form_label('email') ?></td>
    <td>:</td>
    <td>
      <?php
      $data = array(
        'name' => 'email',
        'type' => 'email',
        'placeholder' => 'enter email kamu disini',
        'required' => 'required'
      );
      echo form_input($data); ?>
    </td>
  </tr>
  <tr>
    <td><?php echo form_label('password'); ?></td>
    <td>:</td>
    <td>
      <?php
      $data = array(
        'name' => 'password',
        'type' => 'password',
        'placeholder' => 'pastikan password 6 digit',
        'required' => 'required'
      );
      echo form_input($data); ?>
    </td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td>
      <?php
      $data = array(
        'name' => 'login',
        'type' => 'submit',
        'content' => 'login',
        'value' => 'true'
      );
      echo form_button($data); ?>
    </td>
  </tr>
  <?php form_close(); ?>
</table>