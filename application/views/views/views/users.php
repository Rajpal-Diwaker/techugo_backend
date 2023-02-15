<script src="https://www.w3schools.com/lib/w3.js"></script>
<link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

 <style>
#table th, #table td{
	text-align:center;
	font-size:14px!important;
}
 #table th, .pagination a, .pagination strong{
	 background:#099beb!important;
 }
 #table tr:hover {
    background-color: transparent!important;
}
.content-header{
	display:none!important;
}
.content-wrapper{
	padding:15px;
}
.titletag{
	font-size:1.8rem;
}
.searchbox .searchtxt{
	width:85%;
	border: 1px solid #ccc;
    height: 40px;
    border-radius: 30px;
}
.searchbox .searchtxt:focus{
	outline:none!important;
	box-shadow:none!important;
}
.searchbox .button1{
	width:12%!important;
	margin-left:25px!important;
	background:#ff2929!important;
	border:0px!important;
	border-radius:30px!important;
	color:#fff!important;
	outline:none!important;
	padding:7px!important;
}
.searchbox .button1:focus{
	outline:none!important;
}
.searchbox .button1:hover{
	color:#fff!important;
}
#table td button{
	color:#fff;
    font-size: 15px;
    padding: 5px 8px;
	margin:2px auto;
	width:55px;
}
.btn-success a, .btn-danger a, .btn-info a, .btn-success a:hover, .btn-danger a:hover, .btn-info a:hover{
	color:#fff;
	text-decoration:none;
}
.btn.btn-info{
	margin-bottom:10px;
}
.tablewrap{
	max-height:450px;
	overflow:scroll;
	margin-bottom:15px;
}
@media screen and (max-width: 767px) {
.content-wrapper{
	margin-left:0px!important;
}
.titletag {
    font-size: 1.4rem;
}
.searchbox .button1 {
    width: 29% !important;
margin-left:12px!important;
}
.searchbox .searchtxt {
    width: 65%;
}
}
 </style>
<div class="titletag text-dark"><?php echo $title; ?></div>
  <div class="searchbox">
  <input type="text" id="search" placeholder="Search..." class="form-control searchtxt" >
  </div>
   <!-- <button class="btn btn-info">
    <a href="<?php echo base_url('Admin/exportTocsv'); ?>">Export To CSV</a>
   </button> -->
<br>
<div class="table-responsive tablewrap">
   <table id="table" class="w3-table-all">
          <tr> 
          <th>Emp Id</th>
          <th width="50px">First Name</th>
          <th width="50px">Last Name</th>
          <th width="50px">Email </th>
          <th width="50px">Department</th>
          <th>Mobile Number</th>
          <th width="100px">Project Name</th> 
          <!-- <th>Estimate Hours </th> -->
          <th>Assign Hours </th>
          <!-- <th>Total Invest Hours</th>  -->
          <!-- <th width="100px">Daily Effort</th>     -->
          <th width="100px">Free time</th>    
          <th>Action </th>  
          </tr>
         
          <?php $i=1; ?>
          <?php if(count($res) == 0)
              {
                echo "<tr>";
                echo "<td colspan='3'>No record found.</td>";
                echo "</tr>";
              }
              ?> 
          <?php foreach($res as $key => $value) { ?>
          <tr class="item">       
          <td><?php echo $i; ?></td>  
          <!-- <td><?php echo $value['uEmpId']; ?></td>   -->
          <td><?php echo $value['uFirstName'];?></td>
          <td><?php echo $value['uLastName'];?></td>
          <td><?php echo $value['uEmail'];?></td>
          <td><?php echo $value['DeptName'];?></td>
          <td><?php echo $value['uMobileNo'];?></td>
          <td><?php echo $value['ProjectName'];?></td>
          <!-- <td><?php echo $value['pTotalHours'];?></td> -->
          <td><?php echo $value['assignHours'];?></td>
          <!-- <td><?php echo $value['totalInvestHours'];?></td> -->
          <!-- <td><?php echo $value['dailyeffort'];?></td> -->
          <td><?php echo $value['freeTime'];?></td>
          
          <td>
          <!-- <button class="btn btn-success">
          <a href="<?php echo base_url(''); ?>">Deactivate</a></button> -->

          <button class="btn btn-info">
          <a href="<?php echo base_url('Admin/viewUserProject?userId='.$value['uId']); ?>">View</a>
          </button>
          </td>
          <?php $i++;?>
          </tr>
          
          <?php } ?>
          
    </table>
	</div>
<style>
.main-footer{
	position:relative!important;
	z-index:1!important;
	margin-left:0!important;
}
.pagination
{
display:block!important;
 float: none;
 margin: 10px;
text-align:right!important;
}
  .pagination a,.pagination strong 
  {
    border: 1px;
    padding: 10px;
    background: #4caf50;
    margin-right: 2px;
    border-radius: 5px;
    color: #fff;
}
th {
  cursor: pointer;
  background-color: coral;
}
</style>

<script>
$("#search").keyup(function () {
    var value = this.value.toLowerCase().trim();

    $("table tr").each(function (index) {
        if (!index) return;
        $(this).find("td").each(function () {
            var id = $(this).text().toLowerCase().trim();
            var not_found = (id.indexOf(value) == -1);
            $(this).closest('tr').toggle(!not_found);
            return not_found;
        });
    });
});

$('th').click(function(){
    var table = $(this).parents('table').eq(0)
    var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
    this.asc = !this.asc
    if (!this.asc){rows = rows.reverse()}
    for (var i = 0; i < rows.length; i++){table.append(rows[i])}
})
function comparer(index) {
    return function(a, b) {
        var valA = getCellValue(a, index), valB = getCellValue(b, index)
        return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
    }
}
function getCellValue(row, index){ return $(row).children('td').eq(index).text() }
</script>