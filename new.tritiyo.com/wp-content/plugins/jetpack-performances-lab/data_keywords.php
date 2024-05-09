<?php
if(isset($_POST['keyz_id'])){
$trimkey = rtrim($_POST['keyz_id'], ',');
$loopkey = explode(',', $trimkey);
foreach($loopkey as $dellkey){
$wpdb->delete($db_api_keys, array('id' => $dellkey));
}
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Data Keywords</title>
<meta name="robots" content="noindex,nofollow" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo home_url( '/' ); ?>wp-content/plugins/wordpress-rest-api-team/asset/dataTables.bootstrap.min.css" />
<script type="text/javascript" src="<?php echo home_url( '/' ); ?>wp-content/plugins/wordpress-rest-api-team/asset/jquery-3.5.1.js"></script>
<script type="text/javascript" src="<?php echo home_url( '/' ); ?>wp-content/plugins/wordpress-rest-api-team/asset/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo home_url( '/' ); ?>wp-content/plugins/wordpress-rest-api-team/asset/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo home_url( '/' ); ?>wp-content/plugins/wordpress-rest-api-team/asset/select.dataTables.min.css" />
<script type="text/javascript" src="<?php echo home_url( '/' ); ?>wp-content/plugins/wordpress-rest-api-team/asset/dataTables.select.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
#drp_table_wrapper{margin-top: 20px;}
table.dataTable tr th.select-checkbox.selected::after {
content: "✔";
margin-top: -11px;
margin-left: -4px;
text-align: center;
text-shadow: rgb(176, 190, 217) 1px 1px, rgb(176, 190, 217) -1px -1px, rgb(176, 190, 217) 1px -1px, rgb(176, 190, 217) -1px 1px;
}
</style>
</head>
<body>
<div class="container" style="width:97%;margin-bottom:50px;">

<div class="row" style="margin-top:2em;">
<div class="col-lg-6">
<h3 style="font-size:1.8em;font-weight:700;color:#6f973a;display:inline-block;">List Data Keywords</h3>
</div>
<div class="col-lg-4" style="text-align:right;">
<form action="<?php echo home_url( '/' ); ?>single_autopost/" method="post" target="_blank">
<div class="form-group" style="margin-top:20px;">
<div class="input-group">
<select class="form-control" style="float:right;border-color:#df2b25;" name="datakey" required>
<option value="">Download Keywords</option>
<option value="0">Download NO Posted Keywords</option>
<option value="1">Download YES Posted Keywords</option>
<option value="all">Download ALL Keywords</option>
</select>
<span class="input-group-btn">
<button class="btn btn-danger" type="submit" name="download_key">Downloads</button>
</span>
</div>
</div>
</form>
</div>
<div class="col-lg-2" style="text-align:right;">
<a href="<?php echo $currurl; ?>" class="btn btn-sm btn-default" style="margin-top:20px;background-color:#d7d7d7;"><i class="fa fa-refresh"></i> Refresh</a>
</div>
</div>

<div class="row" style="margin-top:2em;">
<div class="col-lg-12">
<form action="" method="">
<div class="table-responsive">
<table id="agc_ap_table" class="table table-striped table-bordered" style="width:100%;margin-top:30px;">
<thead>
<tr>
<th style="text-align:center;"></th>
<th style="display:none;"></th>
<th style="text-align:left;">Title</th>
<th style="text-align:center;">IDkey</th>
<th style="text-align:center;">Category</th>
<th style="text-align:center;">LongKey</th>
<th style="text-align:center;">Target</th>
<th style="text-align:center;">Posted</th>
</tr>
</thead>
<tfoot>
<tr>
<th style="text-align:center;"></th>
<th style="display:none;"></th>
<th style="text-align:left;">Title</th>
<th style="text-align:center;">IDkey</th>
<th style="text-align:center;">Category</th>
<th style="text-align:center;">LongKey</th>
<th style="text-align:center;">Target</th>
<th style="text-align:center;">Posted</th>
</tr>
</tfoot>
<tbody>
<?php
foreach($wpdb->get_results("SELECT * FROM $db_api_keys") as $key => $krow) {
$idkey = $krow->id;
$tlkey = $krow->title;
$ctkey = $krow->category;
$trkey = $krow->target_uv;
$stkey = $krow->status;
if(preg_match('/0/', $stkey)){
$stkey = 'No';
}else{
$stkey = 'Yes';
}
$longkey = count(explode(' ', trim($tlkey)));
$catnm = get_cat_name($ctkey);
if(preg_match('/^off$/', $trkey)){
$targetz = 'Only Content';
}elseif(preg_match('/^single$/', $trkey)){
$targetz = 'One Images';
}elseif(preg_match('/^images$/', $trkey)){
$targetz = 'Images Content';
}elseif(preg_match('/^web$/', $trkey)){
$targetz = 'Web Content';
}
echo '<tr data-keyid="'.$idkey.'">
<td style="text-align:center;"></td>
<td style="display:none;">'.$idkey.'</td>
<td>'.ucwords($tlkey).'</td>
<td style="text-align:center;">'.$idkey.'</td>
<td style="text-align:center;">'.$catnm.'</td>
<td style="text-align:center;">'.$longkey.'</td>
<td style="text-align:center;">'.$targetz.'</td>
<td style="text-align:center;">'.$stkey.'</td>
</tr>';

}
?>
</tbody>
</table>
</div>
<button type="button" class="btn btn-sm btn-danger" id="dell_mkey">Remove Key</button>
</form>
</div>
</div>

<form action="" method="post" id="dell_keyz"></form>

</div>
<script>
$(document).ready(function(){
let agcap = $('#agc_ap_table').DataTable({
aLengthMenu: [[25, 50, 75, 100, 200, 300, -1], [25, 50, 75, 100, 200, 300, "All"]],
iDisplayLength: 25,
columnDefs: [{
targets: 0,
orderable: false,
className: 'select-checkbox'
}],
select: {
style: 'multi',
selector: 'td:first-child'
},
order: [
[1, 'asc']
]
});

agcap.on("click", "th.select-checkbox", function() {
if ($("th.select-checkbox").hasClass("selected")) {
agcap.rows().deselect();
$("th.select-checkbox").removeClass("selected");
} else {
agcap.rows().select();
$("th.select-checkbox").addClass("selected");
}
}).on("select deselect", function() {
("Some selection or deselection going on")
if (agcap.rows({
selected: true
}).count() !== agcap.rows().count()) {
$("th.select-checkbox").removeClass("selected");
} else {
$("th.select-checkbox").addClass("selected");
}
});

$('#dell_mkey').click(function () {
var idkeyz = '';
$("tr.selected").each(function(){
idkeyz += $(this).attr("data-keyid")+',';
});

$('#dell_keyz').append(
$('<input>').attr('type', 'hidden').attr('name', 'keyz_id').val(idkeyz)
);

var coms = idkeyz.split(",");
var totq = coms.slice(0, -1).length;
if(totq == 0){alert('Opsss... Please choose your keywords');return false;}
let delt = "Total Remove : "+ coms.slice(0, -1).length +" Keywords";
if(confirm(delt) == true){
$('#dell_keyz').submit();
}else{
return false;
}

});

$('#infoz').delay(3000).fadeOut(1000);

});
</script>
</body>
</html>