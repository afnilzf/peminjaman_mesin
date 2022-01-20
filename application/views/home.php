<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <style>
    h1 {
      text-align: center;
    }
  </style>
</head>

<body>
  <h1>POLITEKNIK MANUFAKTUR NEGERI BANGKA BELITUNG</h1>
  <div class="brand">
    <a href="<?= base_url() ?>index.php/Dashboard"><img src="<?= base_url() ?>assets/img/polman1.jpg" alt="polman logo" class="img-responsive logo"></a>
  </div>
  <hr>
  <br>

  <div class="panel-body">
    <div class="row">
      <div class="col-md-9">
        <div id="visits-chart" class="ct-chart"></div>
        <!-- <canvas id="myChart" width="400" height="400"></canvas> -->
      </div>
    </div>
  </div>
</body>

</html>

<?php foreach ($count as $cont) {

  $total[] = $cont['jumlah'];
}
?>
<?php foreach ($count as $cont) {

  $nm[] = $cont['kode'];
}
?>

<script src="<?= base_url() ?>assets/vendor/chartist/js/chartist.min.js"></script>
<script>
  $(function() {
    var data, options;

    // headline charts
    data = {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      series: [
        [23, 29, 24, 40, 25, 24, 35],
        [14, 25, 18, 34, 29, 38, 44],
      ]
    };

    options = {
      height: 300,
      showArea: true,
      showLine: false,
      showPoint: false,
      fullWidth: true,
      axisX: {
        showGrid: false
      },
      lineSmooth: false,
    };

    new Chartist.Line('#headline-chart', data, options);


    // visits trend charts
    data = {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      series: [{
          name: 'series-real',
          data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
        },
        {
          name: 'series-projection',
          data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
        }
      ]
    };

    options = {
      fullWidth: true,
      lineSmooth: false,
      height: "270px",
      low: 0,
      high: 'auto',
      series: {
        'series-projection': {
          showArea: true,
          showPoint: false,
          showLine: false
        },
      },
      axisX: {
        showGrid: false,

      },
      axisY: {
        showGrid: false,
        onlyInteger: true,
        offset: 0,
      },
      chartPadding: {
        left: 20,
        right: 20
      }
    };

    new Chartist.Line('#visits-trends-chart', data, options);


    // visits chart
    data = {
      labels: <?= json_encode($nm); ?>,
      series: [
        <?= json_encode($total, JSON_NUMERIC_CHECK); ?>
      ]
    };

    options = {
      height: 300,
      axisX: {
        showGrid: false
      },
    };

    new Chartist.Bar('#visits-chart', data, options);


    // real-time pie chart
    var sysLoad = $('#system-load').easyPieChart({
      size: 130,
      barColor: function(percent) {
        return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
      },
      trackColor: 'rgba(245, 245, 245, 0.8)',
      scaleColor: false,
      lineWidth: 5,
      lineCap: "square",
      animate: 800
    });

    var updateInterval = 3000; // in milliseconds

    setInterval(function() {
      var randomVal;
      randomVal = getRandomInt(0, 100);

      sysLoad.data('easyPieChart').update(randomVal);
      sysLoad.find('.percent').text(randomVal);
    }, updateInterval);

    function getRandomInt(min, max) {
      return Math.floor(Math.random() * (max - min + 1)) + min;
    }

  });
</script>