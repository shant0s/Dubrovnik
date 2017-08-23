<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
    </section>
<section class="content">   
<div class="row">
    <div class="col-md-12">
       <?php flash() ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> Normal Visitor Count Data Manager (Current date: <?= date('d-M-Y');?>)</h3>                
            </div><!-- /.box-header -->
       
            <div class="box-body">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                           <th style="width: 130px">#Month,Year</th>
                            <th >Number of Views</th>
                          <th style="width: 150px">Action</th>
                       
                    </tr>                      
                    <?php if(!empty($normal_views)) :
                        foreach($normal_views as $normal_view) : ?>
                            <tr>
                                <td><?php echo $normal_view->title ?></td>                                
                                <td><?php echo $normal_view->no_views ?></td>
                                <td>                                    
                                    <a class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dash/delete_visitor_count/'.$normal_view->id) ?>" onclick="return confirm('Are you sure?')">Delete</a>
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
</section>

</aside><!-- /.right-side -->
</div><!-- ./wrapper -->