<div class="table-responsive">
    <center><h1>users table</h1></center>
    <table class="table text-start align-middle table-bordered table-hover mb-0">
    <thead>
        <tr class="text-white">
            <th scope="col"><input class="form-check-input" type="checkbox"></th>
            <th scope="col">u_id</th>
            <th scope="col">user_name</th>
            <th scope="col">user_mail</th>
            <th scope="col">user_mobile</th>
            <!-- <th scope="col">user_password</th> -->
            <th scope="col">guest_admin</th>
        </tr>
    </thead>
    <tbody>
      <?php
        foreach ($this->fetchdata as $key => $value) {
          // $this->print_stuf_controller($value->u_id);
          ?>
            <tr>
              <td><input class="form-check-input" type="checkbox"></td>
              <td name="<?php echo $value->u_id;?>" value="<?php echo $value->u_id;?>"><?php echo $value->u_id;?></td>
                <td name="<?php echo $value->user_name;?>" value="<?php echo $value->user_name;?>"><?php echo $value->user_name;?></td>
                <td name="<?php echo $value->user_mail;?>" value="<?php echo $value->user_mail;?>"><?php echo $value->user_mail;?></td>
                <td name="<?php echo $value->user_mobile;?>" value="<?php echo $value->user_mobile;?>"><?php echo $value->user_mobile;?></td>
                <td name="<?php echo $value->guest_admin;?>" value="<?php echo $value->guest_admin;?>" placeholder="0 = user AND 1 = Admin"><?php echo $value->guest_admin;?></td>
                <td>
                  <form action="" method="post" enctype="multipart/form-data">
                    <button name="updateUser" type="submit" value="<?php echo $value->u_id;?>">update</button>
                  </form>
                </td>
              </tr>
              <?php
        }
        ?>
    </tbody>
    </table>
</div>

