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
                <td><?php echo $value->u_id;?></td>
                <td><?php echo $value->user_name;?></td>
                <td><?php echo $value->user_mail;?></td>
                <td><?php echo $value->user_mobile;?></td>
                <td><?php echo $value->guest_admin;?></td>
                <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
            </tr>
         <?php
        }
      ?>
    </tbody>
    </table>
</div>