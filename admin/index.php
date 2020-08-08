<?php include "Incs/header.php" ?>

<?php
$ReportObj=new Report();


?>



<?php include "Incs/Navigation.php" ?>

    <!-- Sidebar -->
    <?php include "Incs/Sidebar.php" ?>

    <div class="row" id="wrapper">
    <div class=" w-100">
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">داشبورد</a>
          </li>
          <li class="breadcrumb-item active">مدیر</li>
        </ol>
      <p class="text-info h3">خوش آمدی:  <u class="text-danger"><?=$_SESSION["FirstName"]." ".$_SESSION["LastName"]?></u></p>
        <!-- Icon Cards-->




      </div>
      <!-- /.container-fluid -->


    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card bg-primary text-white">
                <div class="card-header ">
                    <!--                ?-->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <i class="fa fa-file fa-5x " aria-hidden="true"></i>
                            </div>
                            <div class="col-md-9 text-right">
                                <div class='h2'><?=$ReportObj->getPostCount()?></div>
                                <div>پست ها</div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="Post.php">
                    <div class="card-footer text-dark">
                        <span class="-pull-left">دیدن پست ها </span>
                        <span class="-pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>



        <div class="col-lg-3 col-md-6">
            <div class="card bg-success">
                <!--            heading-->
                <div class="card-header"></div>
                <div class="container">
                    <div class="row text-white">
                        <div class="col-md-3">
                            <i class="fa fa-comment fa-5x"></i>
                        </div>
                        <div class="col-md-9 text-right">
                            <div class="h2"><?=$ReportObj->getCommentCount()?></div>
                            <div> کامنت ها</div>
                        </div>
                    </div>
                </div>

                <a href="Comment.php">
                    <div class="card-footer">
                        <span class="-pull-left">دیدن کامنت ها</span>
                        <span class="-pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card bg-warning text-white">
                <div class="card-header">
                    <!--                ?-->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-9 text-right">
                                <div class='h2'><?=$ReportObj->getUserCount()?></div>
                                <div> کاربرها</div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="User.php">
                    <div class="card-footer text-dark">
                        <span class="-pull-left">دیدن کاربران</span>
                        <span class="-pull-right"><i class="fa fa-5x"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card bg-danger text-white">
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <i class="fa fa-list fa-5x"></i>
                            </div>
                            <div class="col-md-9 text-right">
                                <div class='h2'><?=$ReportObj->getCategoryCount()?></div>
                                <div>دسته ها</div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="Category.php">
                    <div class="card-footer">
                        <span class="-pull-left">دیدن دسته ها</span>
                        <span class="-pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>

        </div>
        <div class="col-md-12" id="container"></div>
    </div>

<!--برای چارت درست کردن در پنل ادمین-->
<script>    var chart = Highcharts.chart('container', {

    chart: {
    type: 'column'
    },

    title: {
    text: 'گزارش کلی سیستم'
    },

    subtitle: {
    text: 'اطلاعات کلی سیستم به شرح ذیل می باشد'
    },

    legend: {
    align: 'right',
    verticalAlign: 'middle',
    layout: 'vertical'
    },

    xAxis: {
    categories: [],
    labels: {
    x:0
    }
    },

    yAxis: {
    allowDecimals: false,
    title: {
    text: 'تعداد'
    }
    },

    series: [{
    name: ' پست ها ',
    data: [<?=$ReportObj->getPostCount()?>]
    }, {
        name: '  پست های فعال',
        data: [<?=$ReportObj->getActivePostCount()?>]
    }, {
        name: '  پست های تایید نشده',
        data: [<?=$ReportObj->getDraftPostCount()?>]
    }, {
        name: '  Comments',
        data: [<?=$ReportObj->getCommentCount()?>]
    }, {
        name: '  کامنت تایید شده',
        data: [<?=$ReportObj->getApproveCommentCount()?>]
    },{
        name: ' User',
        data: [<?=$ReportObj->getUserCount()?>]
    }, {
        name: '  کاربران ادمین',
        data: [<?=$ReportObj->getAdminUserCount()?>]
    }, {
        name: '  کاربران معمولی',
        data: [<?=$ReportObj->getSubscriberUserCount()?>]
    },{
        name: ' Categories ',
        data: [<?=$ReportObj->getCategoryCount()?>]
    }],

    responsive: {
    rules: [{
    condition: {
    maxWidth: 500
    },
    chartOptions: {
    legend: {
    align: 'center',
    verticalAlign: 'bottom',
    layout: 'horizontal'
    },
    yAxis: {
    labels: {
    align: 'left',
    x: 0,
    y: -5
    },
    title: {
    text: null
    }
    },
    subtitle: {
    text: null
    },
    credits: {
    enabled: false
    }
    }
    }]
    }
    });

    document.getElementById('small').addEventListener('click', function () {
    chart.setSize(400);
    });

    document.getElementById('large').addEventListener('click', function () {
    chart.setSize(600);
    });

    document.getElementById('auto').addEventListener('click', function () {
    chart.setSize(null);
    });
</script>
    </div>
    <!-- Sticky Footer -->

   <?php include "Incs/Footer.php" ?>