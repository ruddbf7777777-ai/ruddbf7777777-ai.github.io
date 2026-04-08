<?php
$link = mysqli_connect("localhost", "root", "", "amusementpark");
?>
<html>
<body>
<style>
table{
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td, th{
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

</style>

<form action="homework4.php" method="GET">
  고객성명 : <input type="text" name="name">
  <input type="submit" name="calc" value="합계"><br>

<table>
  <tr>
    <th>No</th>
    <th>구분</th>
    <th colspan="2">어린이</th>
    <th colspan="2">어른</th>
    <th>비고</th>
  </tr>

  <tr>
    <td>1</td>
    <td>입장권</td>
    <td>7,000</td>
    <td>
      <select name="select1">
        <option value="0" selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
    </td>
    <td>10,000</td>
    <td>
      <select name="select2">
        <option value="0" selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
    </td>
    <td>입장</td>
  </tr>

  <tr>
    <td>2</td>
    <td>BIG3</td>
    <td>12,000</td>
    <td>
      <select name="select3">
        <option value="0" selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
    </td>
    <td>16,000</td>
    <td>
      <select name="select4">
        <option value="0" selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
    </td>
    <td>입장+놀이3종</td>
  </tr>

  <tr>
    <td>3</td>
    <td>자유이용권</td>
    <td>21,000</td>
    <td>
      <select name="select5">
        <option value="0" selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
    </td>
    <td>26,000</td>
    <td>
      <select name="select6">
        <option value="0" selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
    </td>
    <td>입장+놀이자유</td>
  </tr>

  <tr>
    <td>4</td>
    <td>연간이용권</td>
    <td>70,000</td>
    <td>
      <select name="select7">
        <option value="0" selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
    </td>
    <td>90,000</td>
    <td>
      <select name="select8">
        <option value="0" selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
    </td>
    <td>입장+놀이자유</td>
  </tr>

</table>
</form>

<?php
if(
  isset($_GET["name"]) &&
  isset($_GET["select1"]) && isset($_GET["select2"]) &&
  isset($_GET["select3"]) && isset($_GET["select4"]) &&
  isset($_GET["select5"]) && isset($_GET["select6"]) &&
  isset($_GET["select7"]) && isset($_GET["select8"])
){

  date_default_timezone_set("Asia/Seoul");
  $ampm = date("A")=="AM" ? "오전" : "오후";
  
  echo date("Y년 n월 j일 ").$ampm." ".date("g:i")."분<br>";
  echo $_GET["name"]." 고객님 감사합니다.<br>";
  echo "어린이 입장권 ".$_GET["select1"]."매<br>";
  echo "어른 입장권 ".$_GET["select2"]."매<br>";
  echo "어린이 BIG3 ".$_GET["select3"]."매<br>";
  echo "어른 BIG3 ".$_GET["select4"]."매<br>";
  echo "어린이 자유이용권 ".$_GET["select5"]."매<br>";
  echo "어른 자유이용권 ".$_GET["select6"]."매<br>";
  echo "어린이 연간이용권 ".$_GET["select7"]."매<br>";
  echo "어른 연간이용권 ".$_GET["select8"]."매<br>";

  $sum = 0;
  $sum = $sum + $_GET["select1"]*7000  + $_GET["select2"]*10000;
  $sum = $sum + $_GET["select3"]*12000 + $_GET["select4"]*16000;
  $sum = $sum + $_GET["select5"]*21000 + $_GET["select6"]*26000;
  $sum = $sum + $_GET["select7"]*70000 + $_GET["select8"]*90000;

  echo "합계 ".$sum."입니다.<br>";


$sql=" INSERT INTO  `users` ".
"(`Date` , `Name` , `EnterChild` , `EnterAdult` , `Big3Child` , 
`Big3Adult` , `FreeChild` , `FreeAdult` , `YearChild` , `YearAdult` )".
"VALUES ('".date("Y-m-d H:i:s")."',  '".$_GET['name']."',  
'".$_GET['select1']."', '".$_GET['select2']."',  
'".$_GET['select3']."', '".$_GET['select4']."',
'".$_GET['select5']."', '".$_GET['select6']."',
'".$_GET['select7']."', '".$_GET['select8']."')";
mysqli_query($link,$sql);
mysqli_close($link);
}
?>
</body>
</html>