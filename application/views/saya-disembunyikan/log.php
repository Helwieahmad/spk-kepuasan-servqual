<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Hasil Servqual<small>Hasil Perhitungan Servqual Aktif</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">Hasil Servqual</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
                
                <div class="box box-primary">
                    <div class="box-body">
                            <div id="bar" style="width:100%; height:450px;">
                            </div>
                    </div>
                </div>

                <div class="col-md-6">
                <div class="box box-primary">
                  <div class="box-body">
                    <div id="container">
    <?php foreach ($suara1 as $c1) ; ?>
    <?php foreach ($suara2 as $c2) ; ?>
    <?php foreach ($suara3 as $c3) ; ?>
    <?php foreach ($suara4 as $c4) ; ?>
    <script type="text/javascript">
        $(function () {
            var chart;
            $(document).ready(function () {
                var colors = Highcharts.getOptions().colors,
                    categories = ['Sangat Setuju', 'Setuju', 'Biasa Saja', 'Tidak Setuju'],
                    name = 'Hasil Penilaian',
                    data = [
                        {
                            y:<?php echo $c1->suara;?>,
                            color: colors[0],
                            drilldown: {
                                name: 'Sangat Setuju',
                                categories: ['Sangat Setuju'],
                                data: [<?php echo $c1->suara;?>],
                                color: colors[0]
                            }
                        },
                        {
                            y:<?php echo $c2->suara;?>,
                            color: colors[1],
                            drilldown: {
                                name: 'Setuju',
                                categories: ['Setuju'],
                                data: [<?php echo $c2->suara;?>],
                                color: colors[1]
                            }
                        },
                        {
                            y:<?php echo $c3->suara;?>,
                            color: colors[2],
                            drilldown: {
                                name: 'Biasa Saja',
                                categories: ['Biasa Saja'],
                                data: [<?php echo $c3->suara;?>],
                                color: colors[2]
                            }
                        },
                        {
                            y:<?php echo $c4->suara;?>,
                            color: colors[3],
                            drilldown: {
                                name: 'Tidak Setuju',
                                categories: ['Tidak Setuju'],
                                data: [<?php echo $c4->suara;?>],
                                color: colors[3]
                            }
                        }
                        
                    ];

                function setChart(name, categories, data, color) {
                    chart.xAxis[0].setCategories(categories, false);
                    chart.series[0].remove(false);
                    chart.addSeries({
                        name: name,
                        data: data,
                        color: color || 'white'
                    }, false);
                    chart.redraw();
                }

                chart = new Highcharts.Chart({
                    chart: {
                        renderTo: 'container',
                        type: 'column'
                    },
                    title: {
                        text: 'Grafik Hasil Penilaian Kuisioner Secara Keseluruhan'
                    },
                    subtitle: {
                        text: 'Service Quality.'
                    },
                    xAxis: {
                        categories: categories
                    },
                    yAxis: {
                        title: {
                            text: 'Berdasarakan Persen '
                        }
                    },
                    plotOptions: {
                        column: {
                            cursor: 'pointer',
                            point: {
                                events: {
                                    click: function () {
                                        var drilldown = this.drilldown;
                                        if (drilldown) { // drill down
                                            setChart(drilldown.name, drilldown.categories, drilldown.data, drilldown.color);
                                        } else { // restore
                                            setChart(name, categories, data);
                                        }
                                    }
                                }
                            },
                            dataLabels: {
                                enabled: true,
                                color: colors[0],
                                style: {
                                    fontWeight: 'bold'
                                },
                                formatter: function () {
                                    return this.y + '';
                                }
                            }
                        }
                    },
                    tooltip: {
                        formatter: function () {
                            var point = this.point,
                                s = this.x + ':<b>' + this.y + ' </b><br/>';
                            if (point.drilldown) {
                                s += 'Click to view ' + point.category + ' detail ';
                            } else {
                                s += 'Klik lagi untuk Kembali';
                            }
                            return s;
                        }
                    },
                    series: [
                        {
                            name: name,
                            data: data,
                            color: 'white'
                        }
                    ],
                    exporting: {
                        enabled: false
                    }
                });
            });
        });
    </script>
</div>
</div>
                  </div>
                </div>

<div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="box box-primary">
                  <div class="box-body">

                   <table class="slug-table table table-bordered table-striped dt-responsive">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Periode</th>
                          <th>Tahun</th>
                          <th>Hasil</th>
                          <th>Keterangan</th>
                        </tr>
                        </thead>

                        <tbody>
                          <?php
                            echo $jumlah;
                          ?>
                        </tbody>
                  </table>
                <br/>
                <br/>
                      
                </div>

              </div>
          
        </div>     

            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <script type="text/javascript">
        $(function() {
        function ajaxSubmit(form) {
            $.ajax({
                type: form.attr('method'), // <-- get method of form
                url: form.attr('action'), // <-- get action of form
                data: form.serialize(), // <-- serialize all fields into a string that is ready to be posted to your PHP file
                beforeSend: function(){

                },
                success: function(data){
                }
            });
            }

            $("#servqual_kriteria").submit(function(e) {
                e.preventDefault();
                ajaxSubmit($(this));
            });

            setInterval(function() {
                ajaxSubmit($("#servqual_kriteria"));
            }, 10000);
        });
      </script>

<script type="text/javascript">
      
     $(function () { 
      Highcharts.setOptions({
    lang: {
      decimalPoint: ',',
            thousandsSep: '.'
    }
  });
    var myChart = Highcharts.chart('bar', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Hasil Penilaian Service Quality Per Kriteria Seluruh Periode'
    },
    xAxis: {
        name: 'Kriteria',
        categories:  [
      <?php foreach($i_kriteria as $i_ke){ ?>
        '<?php echo $i_ke->id_kriteria; ?>',
      <?php } ?>]
    },
    credits: {
        enabled: false
    },yAxis: {
    labels: {
        format: '{value:.2f}'
    }
},
    series: [{
      color:  '#0288d1',
        name: 'Kriteria',
        data: [<?php echo join($i_hasil, ',') ?>]
    }]
});
});

</script>