<?php 
$table = 'user_tasks';
$filename = tempnam(sys_get_temp_dir(), "csv");

$conn = mysql_connect("localhost", "root", "");
mysql_select_db("tms_db",$conn);

$file = fopen($filename,"w");

// Write column names
/*$result = mysql_query("show columns from $table",$conn);
for ($i = 0; $i < mysql_num_rows($result); $i++) {
    $colArray[$i] = mysql_fetch_assoc($result);
    $fieldArray[$i] = $colArray[$i]['Field'];
}*/
$fieldArray = array('Client','Project','Work Type','Start Time','End Time','Date');
/*foreach($head as $hd){
	$outstr.= $hd.',';
}*/

fputcsv($file,$fieldArray);

// Write data rows
$result = mysql_query("select clients.name,projects.name,tasks.name,user_tasks.start_time,user_tasks.end_time,user_tasks.date from $table inner join clients on clients.id=user_tasks.client_id inner join projects on projects.id=user_tasks.project_id inner join tasks on tasks.id=user_tasks.task_id where `date` between '01/11/2017' and '06/11/2017'",$conn);
//print_r($result);die;
if(mysql_num_rows($result) > 0){
for ($i = 0; $i < mysql_num_rows($result); $i++) {
    $dataArray[$i] = mysql_fetch_row($result);
}

//print_r($dataArray);die;
foreach ($dataArray as $line) {
    fputcsv($file,$line);
}
}

fclose($file);

header("Content-Type: application/csv");
header("Content-Disposition: attachment;Filename=taskmanhours.csv");

// send file to browser
readfile($filename);
unlink($filename);
?>

<?php
/*$table = 'user_tasks';
$outstr = NULL;

header("Content-Type: application/csv");
header("Content-Disposition: attachment;Filename=cars-models.csv");

$conn = mysql_connect("localhost", "root", "");
mysql_select_db("tms_db",$conn);

// Query database to get column names  
//$result = mysql_query("show columns from $table",$conn);

$head = array('Client','Project','Work Type','Total Time','Date');
// Write column names
/*while($row = mysql_fetch_array($result)){
    $outstr.= $row['Field'].',';
}  */
/*foreach($head as $hd){
	$outstr.= $hd.',';
}

$outstr = substr($outstr, 0, -1)."\n";

// Query database to get data
$result = mysql_query("select clients.name,projects.name,clients.name,user_tasks.start_time,user_tasks.date from $table inner join clients on user_tasks.client_id=clients.id inner join projects on user_tasks.project_id=projects.id inner join tasks on user_tasks.task_id=tasks.id",$conn);
// Write data rows
while ($row = mysql_fetch_assoc($result)) {
    $outstr.= join(',', $row)."\n";
}

echo $outstr;
mysql_close($conn);*/
?>