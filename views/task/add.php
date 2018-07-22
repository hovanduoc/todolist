<?php require 'views/layouts/header.php'?>
      <div class="card">
         <div class="card-header">
            <strong class="card-title">Add Task</strong>
         </div>
         <div class="card-body">
            <div class="card-body">
              <form action="" method="POST">
                  <div class="form-group has-success">
                      <label for="description" class="control-label mb-1">Work Name</label>
                      <input name="description" type="text" class="form-control" required>
                   </div>
                   <div class="form-group has-success">
                      <label for="date_start" class="control-label mb-1">Starting Date</label>
                      <div class='input-group date' id='datetimepicker2'>
                          <input type='date' class="form-control" name="date_start" required/>
                         <!--  <span class="input-group-addon">
                              <i class="fa fa-calendar" aria-hidden="true"></i>
                          </span> -->
                      </div>
                   </div>
                   <div class="form-group has-success">
                      <label for="date_end" class="control-label mb-1">Ending Date</label>
                      <div class='input-group date' id='datetimepicker2'>
                          <input type='date' class="form-control" name="date_end" required/>
                          <!-- <span class="input-group-addon">
                              <i class="fa fa-calendar" aria-hidden="true"></i>
                          </span> -->
                      </div>
                   </div>
                   <div class="form-group has-success">
                      <label for="status" class="control-label mb-1">Status</label>
                      <select name="status" id="status" class="form-control-sm form-control" required>
                        <?php
                          foreach (App\Helpers\Data::status() as $key => $value) {
                                 if($key==1){
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