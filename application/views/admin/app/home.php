<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Ads List</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                $get_data_iklan = $this->Main_model->getSelectedData('iklan a', 'a.*')->result();
                echo number_format(count($get_data_iklan),0).' Ads';
                ?>
            </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
        </div>
        </div>
    </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Advertising Revenue</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                $get_data_penghasilan_iklan = $this->Main_model->getSelectedData('iklan a', 'SUM(a.price) AS total')->row();
                echo 'Rp '.number_format($get_data_penghasilan_iklan->total,2);
                ?>
            </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
        </div>
        </div>
    </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">News</div>
            <div class="row no-gutters align-items-center">
                <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                    <?php
                    $get_data_berita = $this->Main_model->getSelectedData('berita a', 'a.*')->result();
                    echo number_format(count($get_data_berita),0).' News';
                    ?>
                </div>
                </div>
                <!-- <div class="col">
                <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </div> -->
            </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
        </div>
        </div>
    </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Comment</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                $get_data_komen = $this->Main_model->getSelectedData('komentar_berita  a', 'a.*')->result();
                echo number_format(count($get_data_komen),0).' Comments';
                ?>
            </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="row">

    <div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-8">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Daily Visitor</h6>
        <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <div class="dropdown-header">Dropdown Header:</div>
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </div>
        </div>
        <div class="card-body">
        <!-- <div class="chart-area"> -->
            <style>
                #chartdiv {
                width: 100%;
                height: 500px;
                }

            </style>

            <!-- Resources -->
            <script src="https://www.amcharts.com/lib/4/core.js"></script>
            <script src="https://www.amcharts.com/lib/4/charts.js"></script>
            <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

            <!-- Chart code -->
            <script>
                am4core.ready(function() {

                // Themes begin
                am4core.useTheme(am4themes_animated);
                // Themes end

                // Create chart instance
                var chart = am4core.create("chartdiv", am4charts.XYChart);

                // Add data
                chart.data = [
                <?php
                $getdata = $this->db->query("SELECT a.date,(SELECT COUNT(b.id_visitor) FROM visitor_detail b WHERE b.date=a.date) jml FROM visitor_detail a GROUP BY a.date")->result();
                foreach ($getdata as $key => $value) {
                    echo'
                    {
                        "date": "'.$value->date.'",
                        "value": '.$value->jml.'
                    },
                    ';
                }
                ?>
                ];

                // Set input format for the dates
                chart.dateFormatter.inputDateFormat = "yyyy-MM-dd";

                // Create axes
                var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
                var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

                // Create series
                var series = chart.series.push(new am4charts.LineSeries());
                series.dataFields.valueY = "value";
                series.dataFields.dateX = "date";
                series.tooltipText = "{value}"
                series.strokeWidth = 2;
                series.minBulletDistance = 15;

                // Drop-shaped tooltips
                series.tooltip.background.cornerRadius = 20;
                series.tooltip.background.strokeOpacity = 0;
                series.tooltip.pointerOrientation = "vertical";
                series.tooltip.label.minWidth = 40;
                series.tooltip.label.minHeight = 40;
                series.tooltip.label.textAlign = "middle";
                series.tooltip.label.textValign = "middle";

                // Make bullets grow on hover
                var bullet = series.bullets.push(new am4charts.CircleBullet());
                bullet.circle.strokeWidth = 2;
                bullet.circle.radius = 4;
                bullet.circle.fill = am4core.color("#fff");

                var bullethover = bullet.states.create("hover");
                bullethover.properties.scale = 1.3;

                // Make a panning cursor
                chart.cursor = new am4charts.XYCursor();
                chart.cursor.behavior = "panXY";
                chart.cursor.xAxis = dateAxis;
                chart.cursor.snapToSeries = series;

                // Create vertical scrollbar and place it before the value axis
                chart.scrollbarY = new am4core.Scrollbar();
                chart.scrollbarY.parent = chart.leftAxesContainer;
                chart.scrollbarY.toBack();

                // Create a horizontal scrollbar with previe and place it underneath the date axis
                chart.scrollbarX = new am4charts.XYChartScrollbar();
                chart.scrollbarX.series.push(series);
                chart.scrollbarX.parent = chart.bottomAxesContainer;

                dateAxis.start = 0.79;
                dateAxis.keepSelection = true;


                }); // end am4core.ready()
            </script>

            <!-- HTML -->
            <div id="chartdiv"></div>
            <!-- <canvas id="myAreaChart"></canvas> -->
        <!-- </div> -->
        </div>
    </div>
    </div>

    <!-- <div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
        <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <div class="dropdown-header">Dropdown Header:</div>
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </div>
        </div>
        <div class="card-body">
        <div class="chart-pie pt-4 pb-2">
            <canvas id="myPieChart"></canvas>
        </div>
        <div class="mt-4 text-center small">
            <span class="mr-2">
            <i class="fas fa-circle text-primary"></i> Direct
            </span>
            <span class="mr-2">
            <i class="fas fa-circle text-success"></i> Social
            </span>
            <span class="mr-2">
            <i class="fas fa-circle text-info"></i> Referral
            </span>
        </div>
        </div>
    </div>
    </div> -->
</div>
<br>
<div class="row">

    <div class="col-lg-7 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Popular News</h6>
            </div>
            <div class="card-body">
            <?php
            foreach ($berita as $key => $value) {
                echo'<h4 class="small font-weight-bold">'.$value->judul.' <span class="float-right">'.number_format($value->counter,0).' Views</span></h4>';
            }
            ?>
            <!-- <div class="progress mb-4">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
            </div> -->
            <!-- <div class="progress mb-4">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
            </div> -->
            <!-- <div class="progress mb-4">
                <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
            </div> -->
            <!-- <div class="progress mb-4">
                <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
            </div> -->
            <!-- <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div> -->
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-lg-6 mb-4">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                Primary
                <div class="text-white-50 small">#4e73df</div>
                </div>
            </div>
            </div>
            <div class="col-lg-6 mb-4">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                Success
                <div class="text-white-50 small">#1cc88a</div>
                </div>
            </div>
            </div>
            <div class="col-lg-6 mb-4">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                Info
                <div class="text-white-50 small">#36b9cc</div>
                </div>
            </div>
            </div>
            <div class="col-lg-6 mb-4">
            <div class="card bg-warning text-white shadow">
                <div class="card-body">
                Warning
                <div class="text-white-50 small">#f6c23e</div>
                </div>
            </div>
            </div>
            <div class="col-lg-6 mb-4">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                Danger
                <div class="text-white-50 small">#e74a3b</div>
                </div>
            </div>
            </div>
            <div class="col-lg-6 mb-4">
            <div class="card bg-secondary text-white shadow">
                <div class="card-body">
                Secondary
                <div class="text-white-50 small">#858796</div>
                </div>
            </div>
            </div>
        </div>

        </div>

        <div class="col-lg-6 mb-4">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
            </div>
            <div class="card-body">
            <div class="text-center">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
            </div>
            <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
            <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw &rarr;</a>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
            </div>
            <div class="card-body">
            <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
            <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
            </div>
        </div> -->
    </div>
    <div class="col-lg-5 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Last Comment</h6>
            </div>
            <div class="card-body">
                <?php
                foreach ($komen as $key => $value) {
                    $pisah = explode(' ',$value->created_at);
                    $komentar = '';
                    $hitung = strlen($value->komentar);
                    if($hitung>40){
                        $komentar = substr($value->komentar,0,39).'[...]';
                    }else{
                        $komentar = $value->komentar;
                    }
                    echo'
                    <h4 class="small font-weight-bold">'.$komentar.' <span class="float-right">'.$this->Main_model->convert_tanggal($pisah[0]).' '.substr($pisah[1],0,5).'</span></h4>
                    ';
                }
                ?>
            </div>
        </div>
    </div>
</div>