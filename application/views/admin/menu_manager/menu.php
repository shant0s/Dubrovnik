<?php $count = $this->uri->segment(4)+1; ?>  
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-md-12">
       <?php flash() ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Menu Manager</h3>
                <span class="pull-right add-new">
                    <a href="<?php echo site_url('admin/menu_manager/add_update') ?>" class="btn btn-success">Add New Menu</a>
                </span>
                
            </div><!-- /.box-header -->
        
            <div class="box-body">
               
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th style="width: 70px">S.No</th>
                        <th>Menu Name(s)</th>
                        <th>Sub Menu Name(s)</th>
                        <th style="width: 225px">Action(s)</th>
                    </tr>
                   
                    <?php if(!empty($all_menu)) :
                        foreach($all_menu as $menu) : ?>   
                            <tr>
                                <td><?php echo $count;$count++; ?></td>
                                <td>
                                    <?php echo $menu['menu_name'];?>
                                </td>
                               <?php if(isset($menu['sub_menu'])):?> <td>
                                  <ol>  <?php foreach ($menu['sub_menu']['name'] as $key => $sub): ?>                                         
                                        <li>
                                        <?php echo $sub?>                                     
                                        <a class="fa fa-edit" href="<?php echo site_url('admin/menu_manager/sub_menu_update/'.$menu['sub_menu']['id'][$key]) ?>">Edit</a>
                                        <a class="fa fa-close" href="<?php echo site_url('admin/menu_manager/sub_menu_delete/'.$menu['sub_menu']['id'][$key]) ?>" onclick="return confirm('Are you sure?')">Delete</a>    
                                        </li>                                                                                                                        
                                  <?php endforeach;?> </ol>
                                <?php else:?>
                                        <td>No data</td>
                                <?php endif;?>
                                        </td>
                                    <td>
                                    <a class="btn btn-sm btn-success fa fa-plus" href="<?php echo site_url('admin/menu_manager/add_sub/'.$menu['menu_id']) ?>">Sub Menu</a>
                                    <a class="btn btn-sm btn-info" href="<?php echo site_url('admin/menu_manager/add_update/'.$menu['menu_id']) ?>">Edit</a>
                                    <a class="btn btn-sm btn-danger" href="<?php echo site_url('admin/menu_manager/delete/'.$menu['menu_id']) ?>" onclick="return confirm('Are you sure?')">Delete</a>
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
