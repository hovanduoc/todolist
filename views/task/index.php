<?php require 'views/layouts/header.php'?>
      <div class="card">
         <div class="card-header">
            <strong class="card-title">List Task</strong>
         </div>
         <div class="card-body">
             <a href="/add">
                <button class="btn btn-success btn-sm" type="button" value="Submit"> 
                <i class="fa fa-plus-square" aria-hidden="true"></i></i> Add Task
                </button>
            </a>
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Work Name</th>
                    <th scope="col">Starting Date</th>
                    <th scope="col">Ending Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      foreach ($data as $key => $value) {
                  ?>
                    <tr>
                        <th scope="row"><?php echo $value->id; ?></th>
                        <td><?php echo $value->description; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($value->date_start)); ?></td>
                        <td><?php echo date("d/m/Y", strtotime($value->date_end)); ?></td>
                        <td>
                        <?php 
                            switch ($value->status) {
                              case '1': echo "<div class='text-danger'> Planning </div>"; break;

                              case '2': echo "<div class='text-warning'> Doing </div>"; break;
                                
                              case '3': echo "<div class='text-success'> Complete </div>"; break;
                            }
                        ?>
                        </td>
                        <td>
                            <a href="edit?id=<?php echo $value->id;?>" class="float-left">
                              <button type="button" class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update
                              </button>
                            </a>
                            <a href="delete?id=<?php echo $value->id;?>" class="float-left">
                              <button type="button" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                              </button>
                            </a>
                        </td>
                    </tr>
                  <?php
                      }
                  ?>
                </tbody>
              </table>
         </div>
      </div>
<?php require 'views/layouts/footer.php'?>