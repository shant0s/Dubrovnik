<div class="col-md-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Add Zone</h3>
        </div>
        <div class="box-body">
            <div class="col-md-12">
                <div style="height:320px;" id="map"></div>
                <div id="info"></div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <form action="<?= site_url('admin/zone_manager/update') ?>" method="post">
                        <label>Zone Name</label>
                        <input class="form-control" id="geocomplete" name="name" value="<?= $zone->name ?>" required="">
                        <input id="points" name="points" type="hidden" />
                        <input  name="id" value="<?= $zone->id ?>" type="hidden" />
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        drawMap('<?= $zone->points ?>');
    });
</script>
