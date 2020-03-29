<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "pembukuan");
$columns = array('NIK', 'nama', 'email', 'jml', 'tgl_checkin');

$query = "SELECT * FROM datawisatawan WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'tgl_checkin BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (NIK LIKE "%'.$_POST["search"]["value"].'%" 
  OR nama LIKE "%'.$_POST["search"]["value"].'%" 
  OR email LIKE "%'.$_POST["search"]["value"].'%" 
  OR jml LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY NIK DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["NIK"];
 $sub_array[] = $row["nama"];
 $sub_array[] = $row["email"];
 $sub_array[] = $row["jml"];
 $sub_array[] = $row["tgl_checkin"];
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM datawisatawan";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>