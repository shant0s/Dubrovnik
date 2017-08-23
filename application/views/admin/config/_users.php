<?php $count = segment(4)+1; ?>  
<div class="row">
    <div class="col-md-12">
       <?php flash() ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Admin User Manager</h3>                
            </div><!-- /.box-header -->
       
            <div class="box-body">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                           <th style="width: 70px">#</th>
                            <th>Username</th>
                          <th style="width: 150px">Action</th>
                       
                    </tr>
                    <?php if(!empty($admins)) :
                        foreach($admins as $admin) : ?>
                            <tr>
                                <td><?php echo $count;$count++; ?></td>
                                <td><?php echo $admin->username ?></td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="<?php echo site_url('admin/config/add_update/'.$admin->id) ?>">Edit</a>
                                    
                                </td>
                            </tr>
                        <?php 
                        endforeach; 
                        else: ?>
                        <tr>
                            <td>No data</td>
                            <td>No data</td>
                            <td>No data</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
          
        </div><!-- /.box -->
    </div>
</div><!-- /.row -->
