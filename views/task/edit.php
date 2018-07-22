<?php require 'views/layouts/header.php'?>
      <div class="card">
         <div class="card-header">
            <strong class="card-title">Edit Task</strong>
         </div>
         <div class="card-body">
            <div class="card-body">
               <form action="" method="POST">
                  <div class="form-group has-success">
                      <label for="description" class="control-label mb-1">Work Name</label>
                      <input name="description" type="text" class="form-control" value="<?php echo $data->description ?>" required>
                   </div>
                   <div class="form-group has-success">
                      <label for="date_start" class="control-label mb-1">Starting Date</label>
                      <input id="date_start" name="date_start" type="date" class="form-control" value="<?php echo $data->date_start ?>" required>
                   </div>
                   <div class="form-group has-success">
                      <label for="date_end" class="control-label mb-1">Ending Date</label>
                      <input id="date_end" name="date_end" type="date" class="form-control" value="<?php echo $data->date_end ?>" required>
                   </div>
                   <div class="form-group has-success">
                      <label for="status" class="control-label mb-1">Status</label>
                      <select name="status" id="status" class="form-control-sm form-control" required>
                          <?php
                             $status = $data->status;
                             foreach (App\Helpers\Data::status() as $key => $value) {
                                 if($key==$status){
                                    echo "<option value='".$key."' selected>".$value."</option>";
                                 } else {
                                    echo "<option value='".$key."'>".$value."</option>";
                                 }
                              }
                          ?>
                      </select>
                   </div>
                   <button class="btn btn-primary ladda-button" data-style="expand-left" type="submit">
                      <span class="ladda-label">Submit</span>
                   </button>
               </form>
            </div>
         </div>
      </div>
<?php require 'views/layouts/footer.php'?>