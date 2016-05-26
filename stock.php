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
    <h1 class="pagetitle">Stock</h1>
  </div>
</div>

<div class="box" style="padding:10px;">
  <div class="row">
    <form id="gis" action="" method="POST">
      <table style="width: 100%">
        <tr>
          <th>Date from</th>
          <td colspan="3"> :
            <input id="start_date" value="<?php echo date('Y-m-d') ?>" type="text" name="start_date" readonly/>
            <input id="end_date" value="<?php echo date('Y-m-d') ?>" type="hidden" name="end_date" readonly/>
          </td>
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
          <th>Hierarchy Group</th>
          <td> :                 
            <select name="hierarchy_group_id" id="hierarchy-group-combo" style="min-width: 90%">
              <option value="0">- Choose - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
            </select>
          </td>
          <th>Hierarchy Sub Group</th>
          <td> :                 
            <select name="hierarchy_subgroup_id" id="hierarchy-subgroup-combo" style="min-width: 90%">
              <option value="0">- Choose - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
            </select>
          </td>
          <th>Matcode</th>
          <td>:                 
            <select name="item_code" id="item-code-combo" style="min-width: 90%">
              <option value="0">- Choose - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
            </select> 
          </td>
        </tr>
        <tr>
          <th>Additional Parameter</th>
          <td> :                 
            <select name="additional_parameter" id="additional-parameter-combo" style="min-width: 90%">
              <option value="0">- Choose - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
              <option value="all">All</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
              <option value="sell_in">Sell In</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
              <option value="stock_in">Stock In</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
              <option value="consignment">Consignment</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">					
            </select>
          </td>
          <th>Simbol</th>
          <td> :
            <select name="additional_parameter_symbol" id="additional-parameter-symbol-combo" style="min-width: 90%" disabled="disabled">
              <option value="0" selected="selected">- Choose - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
              <option value=">">></option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
              <option value=">=">>=</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
              <option value="<"><</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
              <option value="<="><=</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
              <option value="=">=</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
            </select>
          </td>
          <td colspan="2">
            <input id="amount" type="number" name="amount"  min="1" style="height: 20px; font-size: 12pt" disabled="disabled"/>
            <input type="hidden" name="gis_category" value="product_distribution" />
          </td>
        </tr>
        <tr>
          <th>Outlet Type</th>
          <td> : 
            <?php if ($psso == '1' && $non_psso == '0') { //untuk user head office ?>
              <select name="outlet_type" id="outlet-type-combo" style="min-width: 90%" disabled="disabled">
                <option value="PSSO">PSSO</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">

              <?php } else if ($psso == '0' && $non_psso == '1') { ?>
                <select name="outlet_type" id="outlet-type-combo" style="min-width: 90%" disabled="disabled">
                  <option value="Non PSSO">Non PSSO</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">					

                <?php } else { ?>
                  <select name="outlet_type" id="outlet-type-combo" style="min-width: 90%">				
                    <option value="0">- Choose - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                    <option value="all">All</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                    <option value="PSSO">PSSO</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                    <option value="Non PSSO">Non PSSO</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">					
                  <?php } ?>

                </select>
                </td>
                <th>BTS Settings</th>
                <td> : 
                  <select name="bts_settings" id="bts-settings-combo" style="min-width: 90%">
                    <option value="0">- Choose - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">				
                    <option value="on">On</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                    <option value="off">Off</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                  </select>
                </td>
                </tr>
                </table>
                <div style="padding: 10px">
                  <span style="margin-left: 20px;">
                    <button id="show-btn" class="btn"> Show </button>
                    <button id="reset-btn" class="btn" type="reset"> Reset </button>
                    <a id="expcsv" href="#" style="border: 1px solid #f0882c; background: #fb9337; color: #fff; cursor: pointer; padding: 7px 10px; font-weight: bold;">Export Excel</a> <img id="loader-show" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                  </span>
                </div>
                <!--
                <div style="padding: 0 10px;">
                  <span>
                    <label>Date : </label>
                    <input id="start_date" value="<?php echo date('Y-m-d') ?>" type="text" name="start_date" class="width100" readonly/>    
                    <input type="hidden" name="end_date" id='end_date' value="" />
                  </span>
                </div>
                <div style="padding: 10px 10px;">
                  <span style="">
                    First Region : 
                <?php if ($group == '2') { //untuk user head office ?>
                          <select name="region_id" id="region-combo" style="min-width: 200px">
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
                          <select name="cluster_id" id="cluster-combo" style="min-width: 200px">
                            <option value="0">- Choose Cluster - </option> <img id="loader_2" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
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
                          <select name="second_region_id" id="second-region-combo" style="min-width: 200px">
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
                          <select name="second_cluster_id" id="second-cluster-combo" style="min-width: 200px">
                            <option value="0">- Choose Cluster - </option> <img id="loader_2" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
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
                    Hierarchy Group :                 
                    <select name="hierarchy_group_id" id="hierarchy-group-combo" style="min-width: 200px">
                      <option value="0">- Choose Hierarchy Group - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                    </select>                
                  </span>
                  <span style="margin-left: 10px;">
                    Hierarchy Sub Group :                 
                    <select name="hierarchy_subgroup_id" id="hierarchy-subgroup-combo" style="min-width: 200px">
                      <option value="0">- Choose Hierarchy Sub Group - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                    </select>                
                  </span>
                  <span style="margin-left: 10px;">
                    Matcode :                 
                    <select name="item_code" id="item-code-combo" style="min-width: 200px">
                      <option value="0">- Choose Matcode - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                    </select>                
                  </span>
                </div>
                <div style="padding: 10px 10px;">
                  <span style="">
                    Additional Parameter :                 
                    <select name="additional_parameter" id="additional-parameter-combo" style="min-width: 200px">
                      <option value="0">- Choose Additional Parameter - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">				
                      <option value="stock">Stock</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                    </select>                
                  </span>
                  <span style="margin-left: 10px;">                 
                    <select name="additional_parameter_symbol" id="additional-parameter-symbol-combo" style="min-width: 200px" disabled="disabled">
                      <option value="0" selected="selected">- Choose Additional Parameter Symbol - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                      <option value=">">></option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                      <option value=">=">>=</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                      <option value="<"><</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                      <option value="<="><=</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                      <option value="=">=</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                    </select>  
                  </span>
                  <span style="margin-left: 10px;">
                    <input id="amount" type="number" name="amount" class="width100" min="1" style="height: 20px; font-size: 12pt" disabled="disabled"/>
                    <input type="hidden" name="gis_category" value="stock" />
                  </span>                
                </div>
                <div style="padding: 10px 10px;">
                  <span style="">
                    Outlet Type :                 
                <?php if ($psso == '1' && $non_psso == '0') { //untuk user head office ?>
                          <select name="outlet_type" id="outlet-type-combo" style="min-width: 200px" disabled="disabled">
                            <option value="PSSO">PSSO</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
              
                <?php } else if ($psso == '0' && $non_psso == '1') { ?>
                            <select name="outlet_type" id="outlet-type-combo" style="min-width: 200px" disabled="disabled">
                              <option value="Non PSSO">Non PSSO</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">					
              
                <?php } else { ?>
                              <select name="outlet_type" id="outlet-type-combo" style="min-width: 200px">				
                                <option value="0">- Choose Outlet Type - </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                                <option value="all">All</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                                <option value="PSSO">PSSO</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                                <option value="Non PSSO">Non PSSO</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">					
                <?php } ?>
          
                        </select>                
                        </span>
                        <span style="">
                          BTS Settings:      				
                          <select name="bts_settings" id="bts-settings-combo" style="min-width: 200px">
                            <option value="0">- Choose BTS Settings- </option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">				
                            <option value="on">On</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                            <option value="off">Off</option> <img id="loader_1" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                          </select>                
                        </span>
                        <span style="margin-left: 20px;">
                          <button id="show-btn" class="btn"> Show </button>
                          <button id="reset-btn" class="btn" type="reset"> Reset </button>
                          <a id="expcsv" href="#" style="border: 1px solid #f0882c; background: #fb9337; color: #fff; cursor: pointer; padding: 7px 10px; font-weight: bold;">Export Excel</a> <img id="loader-show" src="<?= base_url() ?>file/images/loaders/loader3.gif" style="display:none">
                        </span>
                        </div>
                -->
                </form>
                </div>
                <input id="pac-input" class="controls" type="text" placeholder="Enter Location">
                <input id="outlet-input" class="controls" type="text" placeholder="Enter Outlet Name or Code">
                <div id="map" style="width:98%;height:700px;margin:10px;border:1px solid grey;"></div>
                <div id="legend" style="height: 50%; width: 200px;">
                  <div id="legend-head"><h5>Legend</h5></div>
                  <div id="legend-body" style="height: 93.5%; overflow: auto;"></div>
                </div>
                <div style="margin-left:10px;">Displaying <span id="outlet-counter">0</span> outlet(s)</div>
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

                  #pac-input, #outlet-input {
                    background-color: #fff;
                    font-family: Roboto;
                    font-size: 15px;
                    font-weight: 300;
                    margin-left: 12px;
                    padding: 0 11px 0 13px;
                    text-overflow: ellipsis;
                    width: 300px;
                  }

                  #pac-input:focus, #outlet-input:focus {
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

<?php echo "showHierarchyGroupList()"; ?>

<?php echo "showHierarchySubGroupList()"; ?>

<?php echo "showMatcodeList()"; ?>

                    //                  indoLatlng = new google.maps.LatLng(-2.796647, 117.621416666667);
                    //                  var mapOptions = {
                    //                    zoom: 5,
                    //                    center: indoLatlng
                    //                  };
                    //                  map = new google.maps.Map(document.getElementById('map'), mapOptions);
                    //                  createLegend();
                    //                  showMap();

                    $('#gis').submit(function(e) {
                      //console.log("#additional-parameter-combo : "+$('#additional-parameter-combo').val());
                      //console.log("#additional-parameter-symbol-combo : "+$('#additional-parameter-symbol-combo').val());			
                      //console.log("#amount : "+$('#amount').val());
                      if ($('#additional-parameter-combo').val() != 0)
                      {
                        if ($('#additional-parameter-symbol-combo').val() == 0)
                        {
                          e.preventDefault();
                          alert('Additional Parameter Symbol Harus Dipilih');
                        }
                        else
                        {
                          if ($('#amount').val() == '')
                          {
                            e.preventDefault();
                            alert('Amount Parameter Harus Diisi');
                          }
                          else
                          {
                            e.preventDefault();
                            clearMarkers();
                            clearPolygons();
                            showMap($(this).serialize());
                          }
                        }
                      }
                      else
                      {
                        e.preventDefault();
                        clearMarkers();
                        clearPolygons();
                        showMap($(this).serialize());
                      }
                    });

                    $('#expcsv').click(function(e) {
                      //console.log("#additional-parameter-combo : "+$('#additional-parameter-combo').val());

                      var res = 0;
                      if ($('#additional-parameter-symbol-combo').val() == ">") {
                        res = "1";
                      }
                      else if ($('#additional-parameter-symbol-combo').val() == ">=") {
                        res = "2";
                      }
                      else if ($('#additional-parameter-symbol-combo').val() == "<") {
                        res = "3";
                      }
                      else if ($('#additional-parameter-symbol-combo').val() == "<=") {
                        res = "4";
                      }
                      else if ($('#additional-parameter-symbol-combo').val() == "=") {
                        res = "5";
                      }
                      else {
                        res = "0";
                      }

                      window.location = "<?php echo site_url('gis/export_stock_csv');?>/" + $('#start_date').val() + "/" + $('#start_date').val() + "/" + $('#region-combo').val()
                              + "/" + $('#cluster-combo').val() + "/" + $('#second-region-combo').val() + "/" + $('#second-cluster-combo').val() + "/" + $('#hierarchy-group-combo').val()
                              + "/" + $('#hierarchy-subgroup-combo').val() + "/" + $('#item-code-combo').val() + "/" + $('#additional-parameter-combo').val()
                              + "/" + res + "/" + $('#amount').val() + "/" + $('#outlet-type-combo').val() + "/" + $('#bts-settings-combo').val();
                    });

                    $("#start_date").datepicker({
                      numberOfMonths: 1,
                      changeMonth: true,
                      changeYear: true,
                      dateFormat: 'yy-mm-dd',
                      onClose: function(selectedDate) {

                      }
                    });

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
                    createOutletSearchBox();

                    //                  google.maps.event.addListener(map, 'zoom_changed', function() {
                    //                    console.log(map.getZoom());
                    //                  });
                    //showMap();
                  }

                  function showMap(formData) {
                    $('#loader-show').fadeIn('fast');
                    $.ajax({
                      type: 'post',
                      url: '<?php echo base_url('gis/get_json_data'); ?>',
                      data: formData,
                      dataType: 'json',
                      success: function(data) {
                        if (data.outlets.length > 0 || data.coordinats.length > 0) {
                          var bounds = new google.maps.LatLngBounds();

                          //Bikin polygon dulu, supaya marker bisa diklik
                          var path = [];
                          var grup = 0;
                          var latLongBound, region, cluster, second_region, second_cluster, content;
                          $.each(data.coordinats, function(index, coordinat) {
                            latLongBound = new google.maps.LatLng(coordinat.lat, coordinat.lon);
                            bounds.extend(latLongBound);
                            if (coordinat.grup == grup) { //jika grup nya sama, kumpulkan koordinat
                              path.push(latLongBound);
                            } else { //jika grup nya beda, bikin polygon
                              content = '<div style="min-width:200px;"><b>' + region + ' > ' + cluster + '</b>';
                              addPolygon(path, content);
                              path = [];
                              path.push(latLongBound);
                            }
                            region = coordinat.region_name;
                            cluster = coordinat.cluster_name;
                            grup = coordinat.grup;

                          });
                          content = '<div style="min-width:200px;"><b>' + region + ' > ' + cluster + '</b>';
                          addPolygon(path, content);

                          //Bikin marker outlet di sini
                          var outletNow = 0;
                          $.each(data.outlets, function(index, outlet) {
                            if (outletNow != outlet.partner_id) {
                              var latLong = new google.maps.LatLng(outlet.lat, outlet.lon);
                              var layer = 1;
                              bounds.extend(latLong);
                              if (outlet.icon != 'outlet.png')
                                layer = 9999;

                              var marker = new google.maps.Marker({
                                position: latLong,
                                map: map,
                                title: outlet.partner_name,
                                icon: '<?php echo base_url('file/images/icongis'); ?>/' + outlet.icon,
                                zIndex: layer
                              });
                              //                            markers.push(marker);
                              markers[outlet.partner_id] = marker;

                              //info windows untuk marker
                              var content = '<div id="content" style="min-width:200px"><b>' + outlet.partner_name + ' (' + outlet.partner_code + ' | ' + outlet.caption + ')</b><br>' + outlet.address;
                              if (data.items.length != 0) {
                                if (data.items[outlet.partner_id] != null)
                                  content += '<hr>Item : <br><table width="100%">' + data.items[outlet.partner_id] + '</table>';
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
                              outletNow = outlet.partner_id;
                            }
                          });

                          //Bikin marker bts di sini
                          var btsNow = 0;
                          $.each(data.bts_gis_data, function(index, bts) {
                            if (btsNow != bts.bts_id) {
                              //console.log("bts_id : "+bts.bts_id);
                              var latLong = new google.maps.LatLng(bts.lat, bts.lon);
                              var layer = 1;
                              bounds.extend(latLong);
                              if (bts.icon != 'outlet.png')
                                layer = 9999;

                              var marker = new google.maps.Marker({
                                position: latLong,
                                map: map,
                                title: bts.bts_id,
                                icon: '<?php echo base_url('file/images/icongis'); ?>/' + bts.icon,
                                zIndex: layer
                              });
                              markers.push(marker);

                              //info windows untuk marker
                              var content = '<div id="content" style="min-width:200px"><b>BTS Id : ' + bts.bts_id + '</b><br>Photo : <img src="<?php echo base_url('upload/bts'); ?>/' + data.images_bts[bts.bts_id] + '"height="100" width="100"><br>Revenue : ' + bts.actual + '<br>Revenue Previous 1 Month : ' + bts.actual1 + '<br>Revenue Previous 2 Month : ' + bts.actual2 + '<br>Revenue Previous 3 Month : ' + bts.actual3;
                              content += '</div>';
                              google.maps.event.addListener(marker, 'click', function() {
                                if (infoMarker)
                                  infoMarker.close();
                                infoMarker = new google.maps.InfoWindow({content: content});
                                infoMarker.open(map, marker);
                              });
                              btsNow = bts.bts_id;
                            }
                          });
                          map.fitBounds(bounds);
                          $('#outlet-counter').html(data.outlets_total);
                          //                        $('#outlet-counter').html(markers.length);
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
                      url: '<?php echo base_url('gis/get_json_marker'); ?>',
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

                  $('#hierarchy-group-combo').change(function() {
                    $('#loader-show').fadeIn('fast');
                    var hierarchy_group_id = $(this).val();
                    //var hierarchy_subgroup_id = $(this).val();
                    $('button#submit').attr('disabled', 'disabled');
                    $('button#submit').removeClass('btn_yellow');
                    showHierarchySubGroupList(hierarchy_group_id);
                    if (hierarchy_group_id == 0)
                    {
                      $('#item-code-combo').empty();
                      $('<option value="0">- Choose -</option>').appendTo("#item-code-combo");
                    }
                    //showMatcodeList(hierarchy_subgroup_id);
                    $('#loader-show').fadeOut('slow');
                  });

                  $('#hierarchy-subgroup-combo').change(function() {
                    $('#loader-show').fadeIn('fast');
                    var hierarchy_subgroup_id = $(this).val();
                    $('button#submit').attr('disabled', 'disabled');
                    $('button#submit').removeClass('btn_yellow');
                    showMatcodeList(hierarchy_subgroup_id);
                    $('#loader-show').fadeOut('slow');
                  });

                  $('#additional-parameter-combo').change(function() {
                    var additional_param = $('#additional-parameter-combo').val();
                    //console.log("parameternya : "+additional_param);
                    if (additional_param == 0)
                    {
                      $('#additional-parameter-symbol-combo').val('0');
                      $('#amount').val('');
                      $('#additional-parameter-symbol-combo').attr('disabled', 'disabled');
                      $('#amount').attr('disabled', 'disabled');
                    }
                    else
                    {
                      $('#additional-parameter-symbol-combo').removeAttr('disabled');
                    }
                  });

                  $('#additional-parameter-symbol-combo').change(function() {
                    var additional_param_symbol = $('#additional-parameter-symbol-combo').val();
                    //console.log("parameternya : "+additional_param);
                    if (additional_param_symbol == 0)
                    {
                      $('#amount').val('');
                      $('#amount').attr('disabled', 'disabled');
                    }
                    else
                    {
                      $('#amount').removeAttr('disabled');
                    }
                  });

                  function showHierarchyGroupList() {
                    $.post(
                            "<?php echo base_url() ?>gis/getHierarchyGroup",
                            function(data) {
                              var datax = jQuery.parseJSON(data);
                              $.each(datax, function(k, v) {
                                $('<option value=' + v.hierarchy_group_id + '>' + v.hierarchy_group_name + '</option>').appendTo("#hierarchy-group-combo");
                              });
                            }
                    // "json"
                    );
                  }

                  function showHierarchySubGroupList(param) {
                    $('#hierarchy-subgroup-combo').empty();
                    $.post(
                            "<?php echo base_url() ?>gis/getHierarchySubGroup",
                            {hierarchy_group_id: param},
                    function(data) {
                      var datax = jQuery.parseJSON(data);
                      $('<option value="0">- Choose -</option>').appendTo("#hierarchy-subgroup-combo");
                      $.each(datax, function(k, v) {
                        $('<option value=' + v.hierarchy_subgroup_id + '>' + v.hierarchy_subgroup_name + '</option>').appendTo("#hierarchy-subgroup-combo");
                      });
                      $('button#submit').removeAttr('disabled');
                      $('button#submit').addClass('btn_yellow');
                    }
                    // "json".
                    );
                  }

                  function showMatcodeList(param) {
                    $('#item-code-combo').empty();
                    $.post(
                            "<?php echo base_url() ?>gis/getMatcode",
                            {hierarchy_subgroup_id: param},
                    function(data) {
                      var datax = jQuery.parseJSON(data);
                      $('<option value="0">- Choose -</option>').appendTo("#item-code-combo");
                      $.each(datax, function(k, v) {
                        $('<option value=' + v.item_code + '>' + v.item_code + '</option>').appendTo("#item-code-combo");
                      });
                      $('button#submit').removeAttr('disabled');
                      $('button#submit').addClass('btn_yellow');
                    }
                    // "json".
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

                  function createOutletSearchBox() {
                    $("#outlet-input").autocomplete({
                      //                    source: "<?php echo site_url('gis/get_outlet'); ?>",
                      source: function(request, response) {
                        var formData = {};
                        formData.term = $('#outlet-input').val();
                        formData.region_id = $('#region-combo').val();
                        formData.cluster_id = $('#cluster-combo').val();
                        formData.region_id2 = $('#second-region-combo').val();
                        formData.cluster_id2 = $('#second-cluster-combo').val();
                        $.getJSON("<?php echo site_url('gis/get_outlet'); ?>", formData,
                                response);
                      },
                      minLength: 3,
                      select: function(event, ui) {
                        var bounds = new google.maps.LatLngBounds();

                        latLongBound = new google.maps.LatLng(ui.item.lat, ui.item.lon);
                        bounds.extend(latLongBound);

                        //                      console.log(ui.item ?
                        //                              "Selected: " + ui.item.value + " aka " + ui.item.id :
                        //                              "Nothing selected, input was " + this.value);
                        map.fitBounds(bounds);
                        map.setZoom(16);
                        google.maps.event.trigger(markers[ui.item.id], 'click');
                      }
                    });

                    //Create search box for outlet
                    var outlet = document.getElementById('outlet-input');
                    map.controls[google.maps.ControlPosition.TOP_LEFT].push(outlet);
                  }
                </script>