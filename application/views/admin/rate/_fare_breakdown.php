<?php $count = segment(4) + 1; ?>
<div class="row">
    <div class="col-md-12">
       <?php flash() ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Fare Breakdown</h3>
                <span class="pull-right add-new">
                    <a href="<?php echo site_url('admin/rate_manager/add_update_fare_breakdown') ?>" class="btn btn-success">Add New Menu</a>
                </span>
                
            </div><!-- /.box-header -->
        
            <div class="box-body">
               
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th style="width: 70px">S.No</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Rate</th>
                        <th style="width: 225px">Action(s)</th>
                    </tr>
                   
                    <?php if(!empty($fare_breakdowns)) :?>              
                        <?php foreach ($fare_breakdowns as $fare_breakdown):?>
                        <tr>
                               <td><?php echo $count;$count++; ?></td>
                               <td><?php echo $fare_breakdown->start;  ?> mile</td>                              
                               <td><?php echo $fare_breakdown->end; ?> mile</td>                              
                               <td><?=CURRENCY;?><?php echo  $fare_breakdown->rate; ?>/mile</td>                                                                                          
                                <td>                                                                   
                                    <a class="btn btn-sm btn-info" href="<?php echo site_url('admin/rate_manager/add_update_fare_breakdown/'.$fare_breakdown->id) ?>">Edit</a>
                                    <a class="btn btn-sm btn-danger" href="<?php echo site_url('admin/rate_manager/delete_fare_breakdown/'.$fare_breakdown->id) ?>" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                        </tr>
                        <?php endforeach;?>            
                    <?php else: ?>
                        <tr>
                            <td>No data</td>
                            <td>No data</td>
                            <td>No data</td>
                            <td>No data</td>
                            <td>No action</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
            
        </div><!-- /.box -->
    </div>
</div><!-- /.row -->
