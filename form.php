<html>
<head><title>Student information</title></head><body background="back.jpg">
<header>
<h1>Student Information System</h1>
<h3>This system basically helps like minded students to meet each other. In case of no match, the details are entered in the database where in other students with corresponding interests can find him.</h3> 
<form method="POST" action="action.php">
<center><table>
<tr><td>Name</td><td><input type="text" name="name" required></td></tr>
<tr><td>Interest</td><td><input type="text" name="interest" required></td></tr>
<tr><td>Year</td><td><input type="text" name="top" required></td></tr>
<tr><td>Phone no</td><td><input type="text" name="phone" required></td></tr>
<tr><td><input type="submit" value="Enter"></table> </center>
</form>

</body></html>
Action page:
<html><body><?php
$i=0;
$value1 = $_POST['name'];
$value2 = $_POST['interest'];
$value3 = $_POST['top'];
$value4 = $_POST['phone'];
$m = new MongoClient();
$db = $m->Apple;
$collection = $db->Winter;
$fruitQuery = array("Pyear" => $value3,"PInterest" => $value2);

$cursor = $collection->find($fruitQuery);
foreach ($cursor as $doc) {
    //var_dump($doc);
    echo $doc["PName"]."    ";
    echo $doc["Pphone"]."<BR>";
    $i++;
}
if($i == 0){
  echo "No Similarities yet."."<BR>"; 
  echo "Your details are input to the database."."<BR>";
  echo "You will get a call when someone finds you."."<BR>";}
else {echo "These are Names of students and their phone numbers with interests that match yours."."<BR>";
echo "Your details are input to the database"."<BR>";}

$document = array( 
      "PName" => $value1,
      "PInterest" => $value2, 
      "Pyear" => $value3, 
      "Pphone" => $value4
      
      
   );
   $collection->insert($document);
?>
<a href="home1.php">Click here to go back</a>
</body></html>
