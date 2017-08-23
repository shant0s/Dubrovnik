<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
    </section>
<!-- Main content -->
    <section class="content">     
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= $normal_view?></h3>                        
                        <p>Times Page View</p>
                        <p><i class="fa fa-calendar fa-2x"> <?= date('M');?> </i> Current Month<i class="fa fa-refresh fa-spin fa-2x fa-fw"></i></p>

                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?=  site_url('admin/dash/visitor_count')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>       
        </div>
        <!-- /.row -->
        <!--Main row-->        
       <div class="row">
             
            <section class="col-lg-12 connectedSortable">
                <!--   AREA CHART   -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Visitor Chart(Page View)</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="areaChart" style="height:250px"></canvas>
                        </div>
                    </div>
                    
                </div>
                  
            </section>
                       
        </div>
    </section><!-- /.content -->
   
</aside><!-- /.right-side -->

<!--area chart-->
<script>
    $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var areaChart = new Chart(areaChartCanvas);

        var areaChartData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [
                {
                    label: "Normal Visitor",
                    fillColor: "rgba(210, 214, 222, 1)",
                    strokeColor: "rgba(210, 214, 222, 1)",
                    pointColor: "rgba(210, 214, 222, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: ["<?= (isset($graph_value[0]->no_views)) ? $graph_value[0]->no_views : '' ?>",
                        "<?= (isset($graph_value[1]->no_views)) ? $graph_value[1]->no_views : '' ?>",
                        "<?= (isset($graph_value[2]->no_views)) ? $graph_value[2]->no_views : '' ?>",
                        "<?= (isset($graph_value[3]->no_views)) ? $graph_value[3]->no_views : '' ?>",
                        "<?= (isset($graph_value[4]->no_views)) ? $graph_value[4]->no_views : '' ?>",
                        "<?= (isset($graph_value[5]->no_views)) ? $graph_value[5]->no_views : '' ?>",
                        "<?= (isset($graph_value[6]->no_views)) ? $graph_value[6]->no_views : '' ?>",
                        "<?= (isset($graph_value[7]->no_views)) ? $graph_value[7]->no_views : '' ?>",
                        "<?= (isset($graph_value[8]->no_views)) ? $graph_value[8]->no_views : '' ?>",
                        "<?= (isset($graph_value[9]->no_views)) ? $graph_value[9]->no_views : '' ?>",
                        "<?= (isset($graph_value[10]->no_views)) ? $graph_value[10]->no_views : '' ?>",
                        "<?= (isset($graph_value[11]->no_views)) ? $graph_value[11]->no_views : '' ?>"]
                }/*,
                 {
                 label: "Digital Goods",
                 fillColor: "rgba(60,141,188,0.9)",
                 strokeColor: "rgba(60,141,188,0.8)",
                 pointColor: "#3b8bba",
                 pointStrokeColor: "rgba(60,141,188,1)",
                 pointHighlightFill: "#fff",
                 pointHighlightStroke: "rgba(60,141,188,1)",
                 data: [28, 48, 40, 19, 86, 27, 90, 60]
                 }*/
            ]
        };

        var areaChartOptions = {
            //Boolean - If we should show the scale at all
            showScale: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: false,
            //String - Colour of the grid lines
            scaleGridLineColor: "rgba(0,0,0,.05)",
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - Whether the line is curved between points
            bezierCurve: true,
            //Number - Tension of the bezier curve between points
            bezierCurveTension: 0.3,
            //Boolean - Whether to show a dot for each point
            pointDot: false,
            //Number - Radius of each point dot in pixels
            pointDotRadius: 4,
            //Number - Pixel width of point dot stroke
            pointDotStrokeWidth: 1,
            //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius: 20,
            //Boolean - Whether to show a stroke for datasets
            datasetStroke: true,
            //Number - Pixel width of dataset stroke
            datasetStrokeWidth: 2,
            //Boolean - Whether to fill the dataset with a color
            datasetFill: true,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true
        };

        //Create the line chart
        areaChart.Line(areaChartData, areaChartOptions);
    });
</script>

