<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');
?>

<style>
  th {
    text-align: left;
  }
  td, th {
    padding: 1px;
  }
</style>

<div id="zcontentwrapper" class="zcontentwrapper">
  <div class="pageheader notab">
    <h1 class="pagetitle">BTS Revenue</h1>
  </div>
</div>

<div class="box" style="padding:10px;">
  <div class="row">
    <form id="gis" action="" method="POST">
      <table style="width: 100%">
        <tr>
          <th>Year</th>
          <td> : <?php echo form_dropdown('year', $year_opt, $last_year, 'id="year-combo" style="min-width: 90%"') ?></td>
          <th>Month</th>
          <td> : <?php echo form_dropdown('month', $month_opt, $last_month, 'id="month-combo" style="min-width: 90%"') ?></td>
        </tr>
        <tr>
          <th>Region'</th>
          <td> : 
            <?php if ($group == '2') { //untuk user head office ?>
              <select name="region_id" id="region-combo" style="min-width: 90%">
                <option value="0">- Choose - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
              </select>
              <?php
            } else {
              echo $region_name . "<input type='hidden' name='region_id' id='region-combo' value='{$region_id}'>";
            }
            ?>
          </td>
          <th>Cluster'</th>
          <td> :
            <?php if ($group == '2' OR $group == '41') { //untuk user head office & region head     ?>
              <select name="cluster_id" id="cluster-combo" style="min-width: 90%">
                <option value="0">- Choose -</option> <img id="loader_2" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
              </select>
              <?php
            } else {
              echo $cluster_name . "<input type='hidden' name='cluster_id' id='cluster-combo' value='{$cluster_id}'>";
            }
            ?>
          </td>
          <th>Region"</th>
          <td> : 
            <?php if ($group == '2') { //untuk user head office ?>
              <select name="second_region_id" id="second-region-combo" style="min-width: 90%">
                <option value="0">- Choose - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
              </select>
              <?php
            } else {
              echo $region_name . "<input type='hidden' name='second_region_id' id='second-region-combo' value='{$region_id}'>";
            }
            ?>
          </td>
          <th>Cluster"</th>
          <td> : 
            <?php if ($group == '2' OR $group == '41') { //untuk user head office & region head    ?>
              <select name="second_cluster_id" id="second-cluster-combo" style="min-width: 90%">
                <option value="0">- Choose -</option> <img id="loader_2" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
              </select>
              <?php
            } else {
              echo $cluster_name . "<input type='hidden' name='second_cluster_id' id='second-cluster-combo' value='{$cluster_id}'>";
            }
            ?>
          </td>
        </tr>
        <tr>
          <th>Category</th>
          <td> : 
            <select name="category_id" id="category-combo" style="min-width: 90%">
              <option value="0">- Choose - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
            </select>
          </td>
          <th>BTS Type</th>
          <td> :                 
            <select name="bts_type" id="bts-type-combo" style="min-width: 90%">
              <option value="0">- Choose - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">				
              <option value="all">All</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
              <option value="Very High">Very High</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
              <option value="High">High</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
              <option value="Middle">Middle</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
              <option value="Low">Low</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
            </select>
          </td>
          <th>Topology</th>
          <td> :                 
            <select name="topology_id" id="topology-combo" style="min-width: 90%">
              <option value="0">- Choose - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
            </select></td>
        </tr>
        <tr>
          <th>Outlet Settings</th>
          <td> :      				
            <select name="outlet_settings" id="outlet-settings-combo" style="min-width: 90%">
              <option value="0">- Choose - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">				
              <option value="on">On</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
              <option value="off">Off</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
            </select>
          </td>
          <th>Outlet Type</th>
          <td> :                 
            <?php if ($psso == '1' && $non_psso == '0') { //untuk user head office ?>
              <select name="outlet_type" id="outlet-type-combo" style="min-width: 90%" disabled="disabled">
                <option value="PSSO">PSSO</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">

              <?php } else if ($psso == '0' && $non_psso == '1') { ?>
                <select name="outlet_type" id="outlet-type-combo" style="min-width: 90%" disabled="disabled">
                  <option value="Non PSSO">Non PSSO</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">					

                <?php } else { ?>
                  <select name="outlet_type" id="outlet-type-combo" style="min-width: 90%" disabled="disabled">				
                    <option value="0">- Choose - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                    <option value="all">All</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                    <option value="PSSO">PSSO</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                    <option value="Non PSSO">Non PSSO</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">					
                  <?php } ?>

                </select>
                </td>
                </tr>
                </table>
                <!--
                <div style="padding: 10px 10px;">
                  <span style="">
                    First Region : 
                <?php if ($group == '2') { //untuk user head office ?>
                                <select name="region_id" id="region-combo" style="min-width: 90%">
                                  <option value="0">- Choose Region - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                                </select>
                  <?php
                } else {
                  echo $region_name . "<input type='hidden' name='region_id' id='region-combo' value='{$region_id}'>";
                }
                ?>
                  </span>
                  <span style="margin-left: 10px;">
                    First Cluster : 
                <?php if ($group == '2' OR $group == '41') { //untuk user head office & region head     ?>
                                <select name="cluster_id" id="cluster-combo" style="min-width: 90%">
                                  <option value="0">Cluster</option> <img id="loader_2" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                                </select>
                  <?php
                } else {
                  echo $cluster_name . "<input type='hidden' name='cluster_id' id='cluster-combo' value='{$cluster_id}'>";
                }
                ?>
                  </span>
                  <span style="margin-left: 10px;">
                    Second Region : 
                <?php if ($group == '2') { //untuk user head office ?>
                                <select name="second_region_id" id="second-region-combo" style="min-width: 90%">
                                  <option value="0">- Choose Region - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                                </select>
                  <?php
                } else {
                  echo $region_name . "<input type='hidden' name='second_region_id' id='second-region-combo' value='{$region_id}'>";
                }
                ?>
                  </span>
                  <span style="margin-left: 10px;">
                    Second Cluster : 
                <?php if ($group == '2' OR $group == '41') { //untuk user head office & region head    ?>
                                <select name="second_cluster_id" id="second-cluster-combo" style="min-width: 90%">
                                  <option value="0">Cluster</option> <img id="loader_2" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                                </select>
                  <?php
                } else {
                  echo $cluster_name . "<input type='hidden' name='second_cluster_id' id='second-cluster-combo' value='{$cluster_id}'>";
                }
                ?>
                  </span>
                </div> 
                <div style="padding: 0 10px;">
                  <span style="">
                    Category :                 
                    <select name="category_id" id="category-combo" style="min-width: 90%">
                      <option value="0">- Choose Category - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                    </select>                
                  </span>
                  <span style="">
                    BTS Type :                 
                    <select name="bts_type" id="bts-type-combo" style="min-width: 90%">
                      <option value="0">- Choose BTS Type - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">				
                      <option value="all">All</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                      <option value="Very High">Very High</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                      <option value="High">High</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                      <option value="Middle">Middle</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                      <option value="Low">Low</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                    </select>                
                  </span>
                  <span style="">
                    Topology :                 
                    <select name="topology_id" id="topology-combo" style="min-width: 90%">
                      <option value="0">- Choose Topology - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                    </select>                
                  </span>
                </div>
                <div style="padding: 10px 10px;">
                  <span style="">
                    Outlet Settings:      				
                    <select name="outlet_settings" id="outlet-settings-combo" style="min-width: 90%">
                      <option value="0">- Choose Outlet Settings- </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">				
                      <option value="on">On</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                      <option value="off">Off</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                    </select>                
                  </span>
                  <span style="">
                    Outlet Type :                 
                <?php if ($psso == '1' && $non_psso == '0') { //untuk user head office ?>
                            <select name="outlet_type" id="outlet-type-combo" style="min-width: 90%" disabled="disabled">
                              <option value="PSSO">PSSO</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                
                <?php } else if ($psso == '0' && $non_psso == '1') { ?>
                              <select name="outlet_type" id="outlet-type-combo" style="min-width: 90%" disabled="disabled">
                                <option value="Non PSSO">Non PSSO</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">					
                
                <?php } else { ?>
                                <select name="outlet_type" id="outlet-type-combo" style="min-width: 90%" disabled="disabled">				
                                  <option value="0">- Choose Outlet Type - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                                  <option value="all">All</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                                  <option value="PSSO">PSSO</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                                  <option value="Non PSSO">Non PSSO</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">					
                <?php } ?>
          
                        </select>                
                        </span>
                        </div>
                -->
                <div style="padding: 10px 10px;">				
                  <span style="margin-left: 20px;">
                    <button id="show-btn" class="btn"> Show </button>
                    <button id="reset-btn" class="btn" type="reset"> Reset </button>
                    <a id="expcsv" href="#" style="border: 1px solid #f0882c; background: #fb9337; color: #fff; cursor: pointer; padding: 7px 10px; font-weight: bold;">Export Excel</a> <img id="loader-show" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                  </span>
                </div>
                </form>
                </div>
                <input id="pac-input" class="controls" type="text" placeholder="Enter Location">
                <input id="bts-input" class="controls" type="text" placeholder="Enter BTS ID">
                <div id="map" style="width:98%;height:700px;margin:10px;border:1px solid grey;"></div>
                <div id="legend" style="height: 42%; width: 175px;">
                  <div id="legend-head"><h5>Legend</h5></div>
                  <div id="legend-body"></div>
                </div>
                <div style="margin-left:10px;">Displaying <span id="bts-counter">0</span> bts(s)</div>
                </div>

                <style>
                  #legend {
                    font-family: Arial, sans-serif;
                    background: #fff;
                    /*padding: 10px;*/
                    margin: 5px;
                    border: 1px solid #ccc;
                  }

                  #legend h5 {
                    text-align: center;  
                    margin-top: 0;
                    background-color: #000000;
                    color: #ffffff;
                  }

                  #legend img {
                    vertical-align: middle;
                  }

                  .controls {
                    margin-top: 10px;
                    border: 1px solid transparent;
                    border-radius: 2px 0 0 2px;
                    box-sizing: border-box;
                    -moz-box-sizing: border-box;
                    height: 32px;
                    outline: none;
                    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
                  }

                  #pac-input, #bts-input {
                    background-color: #fff;
                    font-family: Roboto;
                    font-size: 15px;
                    font-weight: 300;
                    margin-left: 12px;
                    padding: 0 11px 0 13px;
                    text-overflow: ellipsis;
                    width: 300px;
                  }

                  #pac-input:focus, #bts-input:focus {
                    border-color: #4d90fe;
                  }

                  .pac-container {
                    font-family: Roboto;
                  }

                  #type-selector {
                    color: #fff;
                    background-color: #4d90fe;
                    padding: 5px 11px 0px 11px;
                  }

                  #type-selector label {
                    font-family: Roboto;
                    font-size: 13px;
                    font-weight: 300;
                  }
                  #target {
                    width: 345px;
                  }
                </style>

<!--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyC0JhNTyjMpdmUPMDYWIVuE57dUIHZH1SU&sensor=true"></script>-->
                <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyC0JhNTyjMpdmUPMDYWIVuE57dUIHZH1SU&libraries=places&callback=initMap" async defer></script>
                <script>
                  var map;
                  var infoMarker;
                  var infoPolygon;
                  var indoLatlng;
                  var markers = [];
                  var polygons = [];

                  $(document).ready(function() {

<?php if ($group == '2') echo "showRegionList()"; ?> //inisialisasi region list untuk head office

<?php if ($group == '41') echo "showClusterList({$region_id})"; ?> //inisialisasi cluster list untuk region head   

<?php if ($group == '2') echo "showSecondRegionList()"; ?> //inisialisasi second region list untuk head office

<?php if ($group == '41') echo "showSecondClusterList({$region_id})"; ?> //inisialisasi second cluster list untuk region head  

<?php echo "showCategoryList()"; ?>

<?php echo "showTopologyList()"; ?>

                    //        indoLatlng = new google.maps.LatLng(-2.796647, 117.621416666667);
                    //        var mapOptions = {
                    //            zoom    : 5,
                    //            center  : indoLatlng
                    //        };
                    //        map = new google.maps.Map(document.getElementById('map'), mapOptions); 
                    //        createLegend(); 
                    //        showMap();        

                    $('#gis').submit(function(e) {
                      //console.log("#additional-parameter-combo : "+$('#additional-parameter-combo').val());
                      //console.log("#additional-parameter-symbol-combo : "+$('#additional-parameter-symbol-combo').val());			
                      //console.log("#amount : "+$('#amount').val());
                      if ($('#year-combo').val() == 0)
                      {
                        e.preventDefault();
                        alert('Tahun Harus dipilih');
                      }
                      else if ($('#month-combo').val() == 0)
                      {
                        e.preventDefault();
                        alert('Bulan Harus dipilih');
                      }
                      else
                      {
                        e.preventDefault();
                        clearMarkers();
                        clearPolygons();
                        showMap($(this).serialize());
                      }
                    });
                  });

                  $('#expcsv').click(function(e) {
                    //console.log("#additional-parameter-combo : "+$('#additional-parameter-combo').val());
                    window.location = "<?php echo site_url('gis/export_bts_csv'); ?>/" + $('#year-combo').val() + "/" + $('#month-combo').val() + "/" + $('#region-combo').val()
                            + "/" + $('#cluster-combo').val() + "/" + $('#second-region-combo').val() + "/" + $('#second-cluster-combo').val() + "/" + $('#category-combo').val()
                            + "/" + $('#bts-type-combo').val() + "/" + $('#topology-combo').val() + "/" + $('#outlet-settings-combo').val() + "/" + $('#outlet-type-combo').val();
                  });

                  function initMap() {
                    indoLatlng = new google.maps.LatLng(-2.796647, 117.621416666667);
                    var mapOptions = {
                      zoom: 5,
                      //                    maxZoom: 15,
                      //disableDefaultUI:true,
                      center: indoLatlng
                    };
                    map = new google.maps.Map(document.getElementById('map'), mapOptions);

                    createLegend();
                    createSearchBox();
                    createBtsSearchBox();

                    //                  google.maps.event.addListener(map, 'zoom_changed', function() {
                    //                    console.log(map.getZoom());
                    //                  });
                    //showMap();
                  }

                  function showMap(formData) {
                    $('#loader-show').fadeIn('fast');
                    $.ajax({
                      type: 'post',
                      url: '<?php echo base_url('gis/get_json_data_bts'); ?>',
                      data: formData,
                      dataType: 'json',
                      success: function(data) {
                        if (data.bts.length > 0 || data.coordinats.length > 0) {
                          var bounds = new google.maps.LatLngBounds();

                          //Bikin polygon dulu, supaya marker bisa diklik
                          var path = [];
                          var grup = 0;
                          var latLongBound, region, cluster, second_region, second_cluster, content, revenue, growth, kpi, revenue1, growth1, kpi1, revenue2, growth2, kpi2, revenue3, growth3, kpi3;
                          $.each(data.coordinats, function(index, coordinat) {
                            latLongBound = new google.maps.LatLng(coordinat.lat, coordinat.lon);
                            bounds.extend(latLongBound);
                            if (coordinat.grup == grup) { //jika grup nya sama, kumpulkan koordinat
                              path.push(latLongBound);
                            } else { //jika grup nya beda, bikin polygon
                              content = '<div style="min-width:200px;"><b>' + region + ' > ' + cluster + '</b><br>Revenue : ' + revenue + '<br>Growth : ' + growth + '<br>KPI : ' + kpi + '<br>Revenue Previous 1 Season : ' + revenue1 + '<br>Growth Previous 1 Season : ' + growth1 + '<br>KPI Previous 1 Season : ' + kpi1 + '<br>Revenue Previous 2 Season : ' + revenue2 + '<br>Growth Previous 2 Season : ' + growth2 + '<br>KPI Previous 2 Season : ' + kpi2 + '<br>Revenue Previous 3 Season : ' + revenue3 + '<br>Growth Previous 3 Season : ' + growth3 + '<br>KPI Previous 3 Season : ' + kpi3;
                              addPolygon(path, content);
                              path = [];
                              path.push(latLongBound);
                            }
                            region = coordinat.region_name;
                            cluster = coordinat.cluster_name;
                            grup = coordinat.grup;

                            if (coordinat.revenue == '' || coordinat.revenue == null)
                            {
                              revenue = '';
                            }
                            else
                            {
                              revenue = coordinat.revenue + '%';
                            }

                            if (coordinat.growth == '' || coordinat.growth == null)
                            {
                              growth = '';
                            }
                            else
                            {
                              growth = coordinat.growth + '%';
                            }

                            if (coordinat.kpi == '' || coordinat.kpi == null)
                            {
                              kpi = '';
                            }
                            else
                            {
                              kpi = coordinat.kpi + '%';
                            }

                            if (coordinat.revenue1 == '' || coordinat.revenue1 == null)
                            {
                              revenue1 = '';
                            }
                            else
                            {
                              revenue1 = coordinat.revenue1 + '%';
                            }

                            if (coordinat.growth1 == '' || coordinat.growth1 == null)
                            {
                              growth1 = '';
                            }
                            else
                            {
                              growth1 = coordinat.growth1 + '%';
                            }

                            if (coordinat.kpi1 == '' || coordinat.kpi1 == null)
                            {
                              kpi1 = '';
                            }
                            else
                            {
                              kpi1 = coordinat.kpi1 + '%';
                            }

                            if (coordinat.revenue2 == '' || coordinat.revenue2 == null)
                            {
                              revenue2 = '';
                            }
                            else
                            {
                              revenue2 = coordinat.revenue2 + '%';
                            }

                            if (coordinat.growth2 == '' || coordinat.growth2 == null)
                            {
                              growth2 = '';
                            }
                            else
                            {
                              growth2 = coordinat.growth2 + '%';
                            }

                            if (coordinat.kpi2 == '' || coordinat.kpi2 == null)
                            {
                              kpi2 = '';
                            }
                            else
                            {
                              kpi2 = coordinat.kpi2 + '%';
                            }

                            if (coordinat.revenue3 == '' || coordinat.revenue3 == null)
                            {
                              revenue3 = '';
                            }
                            else
                            {
                              revenue3 = coordinat.revenue3 + '%';
                            }

                            if (coordinat.growth3 == '' || coordinat.growth3 == null)
                            {
                              growth3 = '';
                            }
                            else
                            {
                              growth3 = coordinat.growth3 + '%';
                            }

                            if (coordinat.kpi3 == '' || coordinat.kpi3 == null)
                            {
                              kpi3 = '';
                            }
                            else
                            {
                              kpi3 = coordinat.kpi3 + '%';
                            }

                          });
                          content = '<div style="min-width:200px;"><b>' + region + ' > ' + cluster + '</b><br>Revenue : ' + revenue + '<br>Growth : ' + growth + '<br>KPI : ' + kpi + '<br>Revenue Previous 1 Season : ' + revenue1 + '<br>Growth Previous 1 Season : ' + growth1 + '<br>KPI Previous 1 Season : ' + kpi1 + '<br>Revenue Previous 2 Season : ' + revenue2 + '<br>Growth Previous 2 Season : ' + growth2 + '<br>KPI Previous 2 Season : ' + kpi2 + '<br>Revenue Previous 3 Season : ' + revenue3 + '<br>Growth Previous 3 Season : ' + growth3 + '<br>KPI Previous 3 Season : ' + kpi3;
                          addPolygon(path, content);

                          //Bikin marker bts di sini
                          var outletNow = 0;
                          $.each(data.bts, function(index, outlet) {
                            if (outletNow != outlet.bts_id) {
                              //console.log("bts_id : "+outlet.bts_id);
                              //console.log("img_source : "+data.images_bts[outlet.bts_id]);
                              var latLong = new google.maps.LatLng(outlet.lat, outlet.lon);
                              bounds.extend(latLong);

                              var marker = new google.maps.Marker({
                                position: latLong,
                                map: map,
                                title: outlet.bts_id,
                                icon: '<?php echo base_url('file/images/icongis'); ?>/' + outlet.icon,
                                optimized: false,
                                zIndex: getMarkerLayer(outlet.icon)
                              });
                              //                            markers.push(marker);
                              markers[outlet.bts_id] = marker;

                              //info windows untuk marker
                              var content = '<div id="content" style="min-width:200px"><b>BTS Id : ' + outlet.bts_id + '</b><br>Photo : <img src="<?php echo base_url('upload/bts'); ?>/' + data.images_bts[outlet.bts_id] + '"height="100" width="100"><br>Revenue : ' + outlet.actual + '<br>Revenue Previous 1 Month : ' + outlet.actual1 + '<br>Revenue Previous 2 Month : ' + outlet.actual2 + '<br>Revenue Previous 3 Month : ' + outlet.actual3;
                              content += '</div>';
                              google.maps.event.addListener(marker, 'click', function() {
                                if (infoMarker)
                                  infoMarker.close();
                                infoMarker = new google.maps.InfoWindow({content: content});
                                infoMarker.open(map, marker);
                              });
                              outletNow = outlet.bts_id;
                            }
                          });

                          //Bikin marker outlet di sini
                          var btsNow = 0;
                          $.each(data.outlet_bts, function(index, bts) {
                            if (btsNow != bts.partner_id) {
                              //console.log("partner_id : "+bts.partner_id);
                              var latLong = new google.maps.LatLng(bts.lat, bts.lon);
                              var layer = 1;
                              bounds.extend(latLong);
                              if (bts.icon != 'outlet.png')
                                layer = 9999;

                              var marker = new google.maps.Marker({
                                position: latLong,
                                map: map,
                                title: bts.partner_id,
                                icon: '<?php echo base_url('file/images/icongis'); ?>/' + bts.icon,
                                zIndex: layer
                              });
                              markers.push(marker);

                              //info windows untuk marker
                              var content = '<div id="content" style="min-width:200px"><b>Outlet Name : ' + bts.partner_name + ' (' + bts.partner_code + ' | ' + bts.caption + ')</b><br>Address : ' + bts.address;
                              if (data.items.length != 0) {
                                if (data.items[bts.partner_id] != null)
                                  content += '<hr>Item : <br><table width="100%">' + data.items[bts.partner_id] + '</table>';
                                else
                                  content += '<hr>Tidak ada item.';
                              }

                              content += '</div>';
                              google.maps.event.addListener(marker, 'click', function() {
                                if (infoMarker)
                                  infoMarker.close();
                                infoMarker = new google.maps.InfoWindow({content: content});
                                infoMarker.open(map, marker);
                              });
                              btsNow = bts.partner_id;
                            }
                          });
                          map.fitBounds(bounds);
                          $('#bts-counter').html(data.bts_total);
                        } else {
                          alert('Sorry, no data.');
                        }

                      },
                      error: function(xhr, status, message) {
                        if(message !=='') {
                          alert(status.toUpperCase() + ' : ' + message + ', please try again.');
                        }
                      },
                      complete: function() {
                        $('#loader-show').fadeOut('slow');
                      }
                    });
                  }

                  function getMarkerLayer(icon) {
                    var layer = 9999;

                    if (icon == null) {
                      return layer;
                    }

                    if (icon.search(/micro/i) >= 0) {
                      if (icon.search(/very/i)) {
                        layer += 25;
                      } else if (icon.search(/high/i) >= 0) {
                        layer += 24;
                      } else if (icon.search(/middle/i) >= 0) {
                        layer += 23;
                      } else if (icon.search(/low/i) >= 0) {
                        layer += 22;
                      } else {
                        layer += 21;
                      }
                    } else if (icon.search(/macro/i) >= 0) {
                      if (icon.search(/very/i) >= 0) {
                        layer += 15;
                      } else if (icon.search(/high/i) >= 0) {
                        layer += 14;
                      } else if (icon.search(/middle/i) >= 0) {
                        layer += 13;
                      } else if (icon.search(/low/i) >= 0) {
                        layer += 12;
                      } else {
                        layer += 11;
                      }
                    } else {
                      layer += 1;
                    }

                    return layer;
                  }

                  // hapus semua marker
                  function clearMarkers() {
                    for (var key in markers) {
                      markers[key].setMap(null);
                    }
                    markers.length = 0;
                    //                  for (var i = 0; i < markers.length; i++) {
                    //                    markers[i].setMap(null);
                    //                  }
                    //                  markers.length = 0;
                  }

                  // hapus semua polygon
                  function clearPolygons() {
                    for (var i = 0; i < polygons.length; i++) {
                      polygons[i].setMap(null);
                    }
                    markers.length = 0;
                  }

                  //membuat legend map
                  function createLegend() {
                    $.ajax({
                      type: 'post',
                      url: '<?php echo base_url('gis/get_json_marker_bts'); ?>',
                      dataType: 'json',
                      success: function(data) {
                        //Bikin legend, ambil elemen legend pake js, jangan jquery
                        var legend = document.getElementById('legend');
                        var legendBody = document.getElementById('legend-body');
                        $.each(data.markers, function(index, marker) {
                          var div = document.createElement('div');
                          var icon = '<?php echo base_url('file/images/icongis') . '/' ?>' + marker.icon;
                          div.innerHTML = '<img width="24px" src="' + icon + '"> ' + marker.caption;
                          div.setAttribute('style', 'margin:5px 10px;');
                          legendBody.appendChild(div);
                        });
                        map.controls[google.maps.ControlPosition.RIGHT_TOP].push(legend);
                      },
                      error: function() {
                        alert('Load legend error!');
                      }
                    });


                  }

                  function getRandomColor() {
                    var letters = '0123456789ABCDEF'.split('');
                    var color = '#';
                    for (var i = 0; i < 6; i++) {
                      color += letters[Math.round(Math.random() * 15)];
                    }
                    return color;
                  }

                  $('#region-combo').change(function() {
                    $('#loader-show').fadeIn('fast');
                    var region_id = $(this).val();
                    $('button#submit').attr('disabled', 'disabled');
                    $('button#submit').removeClass('btn_yellow');
                    showClusterList(region_id);
                  });

                  function showRegionList() {
                    $.post(
                            "<?php echo base_url() ?>teritori/getRegion",
                            function(data) {
                              var datax = jQuery.parseJSON(data);
                              $.each(datax, function(k, v) {
                                $('<option value=' + v.region_id + '>' + v.region_name + '</option>').appendTo("#region-combo");
                              });
                            }
                    // "json"
                    );
                  }

                  function showClusterList(param) {
                    $('#cluster-combo').empty();
                    $('<option value="0">- Choose -</option>').appendTo("#cluster-combo");
                    $.post(
                            "<?php echo base_url() ?>teritori/getCluster",
                            {region_id: param},
                    function(data) {
                      var datax = jQuery.parseJSON(data);
                      $.each(datax, function(k, v) {
                        $('<option value=' + v.cluster_id + '>' + v.cluster_name + '</option>').appendTo("#cluster-combo");
                      });
                      $('button#submit').removeAttr('disabled');
                      $('button#submit').addClass('btn_yellow');
                      $('#loader-show').fadeOut('slow');
                    }
                    // "json".
                    );
                  }

                  $('#second-region-combo').change(function() {
                    $('#loader-show').fadeIn('fast');
                    var region_id = $(this).val();
                    $('button#submit').attr('disabled', 'disabled');
                    $('button#submit').removeClass('btn_yellow');
                    showSecondClusterList(region_id);
                  });

                  function showSecondRegionList() {
                    $.post(
                            "<?php echo base_url() ?>teritori/getRegion",
                            function(data) {
                              var datax = jQuery.parseJSON(data);
                              $.each(datax, function(k, v) {
                                $('<option value=' + v.region_id + '>' + v.region_name + '</option>').appendTo("#second-region-combo");
                              });
                            }
                    // "json"
                    );
                  }

                  function showSecondClusterList(param) {
                    $('#second-cluster-combo').empty();
                    $('<option value="0">- Choose -</option>').appendTo("#second-cluster-combo");
                    $.post(
                            "<?php echo base_url() ?>teritori/getCluster",
                            {region_id: param},
                    function(data) {
                      var datax = jQuery.parseJSON(data);
                      $.each(datax, function(k, v) {
                        $('<option value=' + v.cluster_id + '>' + v.cluster_name + '</option>').appendTo("#second-cluster-combo");
                      });
                      $('button#submit').removeAttr('disabled');
                      $('button#submit').addClass('btn_yellow');
                      $('#loader-show').fadeOut('slow');
                    }
                    // "json".
                    );
                  }

                  function showCategoryList() {
                    $.post(
                            "<?php echo base_url() ?>gis/getCategory",
                            function(data) {
                              var datax = jQuery.parseJSON(data);
                              $.each(datax, function(k, v) {
                                $('<option value=' + v.category_id + '>' + v.category_name + '</option>').appendTo("#category-combo");
                              });
                            }
                    // "json"
                    );
                  }

                  function showTopologyList() {
                    $.post(
                            "<?php echo base_url() ?>gis/getTopology",
                            function(data) {
                              var datax = jQuery.parseJSON(data);
                              $.each(datax, function(k, v) {
                                $('<option value=' + v.topology_id + '>' + v.topology_name + '</option>').appendTo("#topology-combo");
                              });
                            }
                    // "json"
                    );
                  }

                  function addPolygon(path, content) {
                    var polygon = new google.maps.Polygon({
                      path: path,
                      strokeColor: 'grey',
                      strokeOpacity: 0.8,
                      strokeWeight: 1,
                      fillColor: getRandomColor(),
                      fillOpacity: 0.35
                    });
                    polygons.push(polygon);
                    polygon.setMap(map);

                    //info window buat polygon
                    infoPolygon = new google.maps.InfoWindow();
                    google.maps.event.addListener(polygon, 'click', function(event) {
                      infoPolygon.setContent(content);
                      infoPolygon.setPosition(event.latLng);
                      infoPolygon.open(map);
                    });
                  }

                  $('#outlet-settings-combo').change(function() {
                    var additional_param = $('#outlet-settings-combo').val();
                    //console.log("parameternya : "+additional_param);
                    if (additional_param == 'on')
                    {
                      $('#outlet-type-combo').removeAttr('disabled');
                    }
                    else
                    {
                      $('#outlet-type-combo').val('0');
                      $('#outlet-type-combo').attr('disabled', 'disabled');
                    }
                  });

                  function createSearchBox() {
                    // Create the search box and link it to the UI element.
                    var input = document.getElementById('pac-input');
                    var searchBox = new google.maps.places.SearchBox(input);
                    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                    // Bias the SearchBox results towards current map's viewport.
                    map.addListener('bounds_changed', function() {
                      searchBox.setBounds(map.getBounds());
                    });

                    var infowindow = new google.maps.InfoWindow();

                    var markers = [];
                    // [START region_getplaces]
                    // Listen for the event fired when the user selects a prediction and retrieve
                    // more details for that place.
                    searchBox.addListener('places_changed', function() {
                      var places = searchBox.getPlaces();

                      if (places.length == 0) {
                        return;
                      }

                      infowindow.close();
                      // Clear out the old markers.
                      markers.forEach(function(marker) {
                        marker.setMap(null);
                      });
                      markers = [];

                      // For each place, get the icon, name and location.
                      var bounds = new google.maps.LatLngBounds();
                      places.forEach(function(place) {
                        var icon = {
                          url: place.icon,
                          size: new google.maps.Size(71, 71),
                          origin: new google.maps.Point(0, 0),
                          anchor: new google.maps.Point(17, 34),
                          scaledSize: new google.maps.Size(25, 25)
                        };

                        // Create a marker for each place.
                        var marker = new google.maps.Marker({
                          map: map,
                          icon: icon,
                          title: place.name,
                          position: place.geometry.location
                        });

                        markers.push(marker);

                        if (place.geometry.viewport) {
                          // Only geocodes have viewport.
                          bounds.union(place.geometry.viewport);
                        } else {
                          bounds.extend(place.geometry.location);
                        }

                        //Info Window
                        var address = '';
                        if (place.address_components) {
                          address = [
                            (place.address_components[0] && place.address_components[0].short_name || ''),
                            (place.address_components[1] && place.address_components[1].short_name || ''),
                            (place.address_components[2] && place.address_components[2].short_name || '')
                          ].join(' ');
                        }

                        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
                        infowindow.open(map, marker);
                      });
                      map.fitBounds(bounds);
                      map.setZoom(16);
                    });
                    // [END region_getplaces]
                  }

                  function createBtsSearchBox() {
                    $("#bts-input").autocomplete({
                      source: function(request, response) {
                        var formData = {};
                        formData.term = $('#bts-input').val();
                        formData.region_id = $('#region-combo').val();
                        formData.cluster_id = $('#cluster-combo').val();
                        formData.region_id2 = $('#second-region-combo').val();
                        formData.cluster_id2 = $('#second-cluster-combo').val();
                        $.getJSON("<?php echo site_url('gis/get_bts'); ?>", formData,
                                response);
                      },
                      minLength: 2,
                      select: function(event, ui) {
                        var bounds = new google.maps.LatLngBounds();

                        latLongBound = new google.maps.LatLng(ui.item.lat, ui.item.lon);
                        bounds.extend(latLongBound);

                        map.fitBounds(bounds);
                        map.setZoom(16);
                        google.maps.event.trigger(markers[ui.item.id], 'click');
                      }
                    });

                    //Create search box for outlet
                    var bts = document.getElementById('bts-input');
                    map.controls[google.maps.ControlPosition.TOP_LEFT].push(bts);
                  }

                </script>