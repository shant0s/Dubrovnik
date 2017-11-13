<div class="row">
    <div class="col-md-12">
        <div class="box">
            <form action="" method="post" class="forms" enctype="multipart/form-data">
            <div class="box-header">
                <h3 class="box-title">Fleet Manager | <?php echo ($is_edit) ? 'Update' : 'Add' ?></h3>
                <div class="pull-right">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save</button>
                </div>
            </div><!-- /.box-header -->

            <div class="box-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">General Info</a></li>
                    <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Photos</a></li>
                    <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Rates</a></li>
                    <li role="presentation"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">Additional Rates</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tab1">
                        <?php $this->load->view('admin/fleet/navtab-parts/tab1') ?>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab2">
                        <?php $this->load->view('admin/fleet/navtab-parts/tab2') ?>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab3">
                        <?php
                        if ($fleet):
                            $this->load->view('admin/fleet/navtab-parts/tab3');
                        else:
                            ?>
                            <br>
                            <div class="alert alert-info">
                                <i class="fa fa-info-circle"></i> Please add rest of the info & save the fleet in order to manage rates.
                            </div>
                        <?php endif; ?>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab4">
                        <?php $this->load->view('admin/fleet/navtab-parts/tab4') ?>
                    </div>
                </div>
            </div><!-- /.box-body -->
            </form>
        </div><!-- /.box -->
    </div>
</div><!-- /.row -->
