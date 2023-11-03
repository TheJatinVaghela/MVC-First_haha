<div class="table-responsive">
    <center>
      <h1>users table</h1>
      <form action="edit_site" method="post">
        <button type="submit" name="add_user" value="add_user">ADD USER</button>
      </form>
    </center>
    <table class="table text-start align-middle table-bordered table-hover mb-0">
    <thead>
        <tr class="text-white" >
            <th scope="col"><input class="form-check-input" type="checkbox"></th>
            <th style="color: grey" scope="col">u_id</th>
            <th style="color: grey" scope="col">user_name</th>
            <th style="color: grey" scope="col">user_mail</th>
            <th style="color: grey" scope="col">user_mobile</th>
            <th style="color: grey" scope="col">Button</th>
            <!-- <th scope="col">user_password</th> -->
            <th style="color: grey" scope="col">guest_admin</th>
        </tr>
    </thead>
    <tbody>
      <?php
        foreach ($this->fetchdata as $key => $value) {
          // $this->print_stuf_controller($value->u_id);
          ?>
            <tr >
              <td><input class="form-check-input" type="checkbox"></td>
              <td name="<?php echo $value->u_id;?>" value="<?php echo $value->u_id;?>" style="color: grey"><?php echo $value->u_id;?></td>
                <td style="color: grey" name="<?php echo $value->user_name;?>" value="<?php echo $value->user_name;?>"><?php echo $value->user_name;?></td>
                <td style="color: grey" name="<?php echo $value->user_mail;?>" value="<?php echo $value->user_mail;?>"><?php echo $value->user_mail;?></td>
                <td style="color: grey" name="<?php echo $value->user_mobile;?>" value="<?php echo $value->user_mobile;?>"><?php echo $value->user_mobile;?></td>
                <td style="color: grey" name="<?php echo $value->guest_admin;?>" value="<?php echo $value->guest_admin;?>" placeholder="0 = user AND 1 = Admin"><?php echo $value->guest_admin;?></td>
                <td>
                  <form action="" method="post" enctype="multipart/form-data">
                    <button class="btn btn-outline-primary" name="updateUser" type="submit" value="<?php echo $value->u_id;?>">update</button>
                  </form>
                  <form action="" method="post" enctype="multipart/form-data">
                    <button class="btn btn-outline-primary" name="deleteUser" type="submit" value="<?php echo $value->u_id;?>">delete</button>
                  </form>
                </td>
              </tr>
              <?php
        }
        ?>
    </tbody>
    </table>
</div>

