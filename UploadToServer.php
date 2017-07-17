<html>
<head>
<meta http-equiv="content-type" content="text/html; charset= utf-8"/>
<title> data client</title>
</head>
<body>
<?php
echo "certain!@11<br>";

$service_port = '9001';
//$address ='bit.mynetgear.com';
$address ='121.138.83.53';
print 'socket_create!! '; 
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket == false) {
    print 'socket_create() failed: reason: ' .socket_strerror(socket_last_error()) . '\n';
} else {
    print 'OK.<br>';
}
print 'socket_connect!! ';
$result = socket_connect($socket, $address , $service_port);
if ($result == false) {
    print 'socket_connect() failed.\nReason: ($result) ' .socket_strerror(socket_last_error($socket)) . '\n';
} else {
    print 'OK.<br>';
}
echo "-------------------------------<br>";
$connect = mysqli_connect("localhost", "root", "bitiotansehen", "ansehen");
if(!$connect){
	print ' Error: connect<br>';
	exit;
} else {
	print 'connect DB<br>';
}
$dbname="ansehen";
mysqli_select_db($connect,$dbname);
print 'db selected<br>';
$aaa=1;
$result = mysqli_query($connect,"SELECT * FROM USER_INFO where 
image_add = '$test_send'");



while($info=mysqli_fetch_array($result)){
	$data_send = $info['phone_num']." ".$info['phone_num_input']." ". 				 $info['name']." ".$info['pw']." ".$info['image_add']." ".			 $info['unique_key']."\0";
	echo $data_send."<br>";
	socket_write($socket,$data_send,strlen($data_send));
//	socket_write($socket,$data_send,(strlen($data_send));
//	echo "data: ".$data_send."<br>";
	/*
	$phone_num_t=$info['phone_num']."\0";
	socket_write($socket,$phone_num_t,(strlen($phone_num_t)+1));
	echo "phone_num: ".$info['phone_num']."<br>";
	echo "phone_num_t: ".$phone_num_t."<br>";

	$phone_num_input_t=$info['phone_num_input']."\0";
	socket_write($socket,$phone_num_input_t,(strlen($phone_num_input_t)+1));
	echo "phone_num_input: ".$info['phone_num_input']."<br>";
	echo "phone_num_input_t: ".$phone_num_input_t."<br>";

	$name_t=$info['name']."\0";
	socket_write($socket,$name_t,(strlen($name_t)+1));
	echo "name: ".$info['name']."<br>";
	echo "name_t: ".$name_t."<br>";

	$pw_t=$info['pw']."\0";
	socket_write($socket,$pw_t,(strlen($pw_t)+1));
	echo "pw: ".$info['pw']."<br>";
	echo "pw_t: ".$pw_t."<br>";

	$image_add_t=$info['image_add']."\0";
	socket_write($socket,$image_add_t,(strlen($image_add_t)+1));
	echo "image_add: ".$info['image_add']."<br>";
	echo "image_add_t: ".$image_add_t."<br>";

	$unique_key_t=$info['unique_key']."\0";
	socket_write($socket,$unique_key_t,(strlen($unique_key_t)+1));
	echo "unique_key: ".$info['unique_key']."<br>";
	echo "unique_key_t: ".$unique_key_t."<br>";
	*/
	//echo "while inside<br>";
	//echo "phone_num: ".$info['phone_num']."<br>";
	//$in=$info['phone_num']." ";
	//if($aaa){
	//	socket_write($socket,$in,(sizeof($in)));
	//	$aaa=0;
	//}
	//echo "phone_num_input: ".$info['phone_num_input']."<br>";
	//echo "name: ".$info['name']."<br>";
	//echo "pw: ".$info['pw']."<br>";
}
print '-----------------------------------.<br>';
 
print 'Reading response:<br><br>';
//while ($out = socket_read($socket, 2048)) {
//    print $out;
//}
 
print 'Closing socket...';
mysqli_close($connect);
socket_close($socket);
print 'OK.<br><br>';
?>
</body>
</html>

