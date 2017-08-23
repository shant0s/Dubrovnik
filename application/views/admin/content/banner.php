<?php $count = $this->uri->segment(4)+1; ?>  
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-md-12">
       <?php flash() ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Banner Manager</h3>
                <span class="pull-right add-new">
                    <a href="<?php echo site_url('admin/content/add_update_banner') ?>" class="btn btn-success">Add New</a>
                </span>
                
            </div><!-- /.box-header -->
          <!--   <?php //echo $this->session->flashdata('msg');?> -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th style="width: 70px">S.No</th>
                        <th>Banner Image</th>
                        <th style="width: 150px">Action</th>
                    </tr>
                    <?php if(!empty($banners)) :
                        foreach($banners as $banner) : ?>
                            <tr>
                                <td><?php echo $count;$count++; ?></td>
                                <td>
                                    <img src="<?= base_url('uploads/banner/'.$banner->filename) ?>" width="200">
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="<?php echo site_url('admin/content/add_update_banner/'.$banner->id) ?>">Edit</a>
                                    <a class="btn btn-sm btn-danger" href="<?php echo site_url('admin/content/delete_banner/'.$banner->id) ?>" onclick="return confirm('Are you sure?')">Delete</a>
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
