<?php
mb_internal_encoding('UTF-8');
$pageTitle='Form';
include 'header.php';
if($_POST){
$username=trim($_POST['username']);//маха всички разстояния между думите
$username=str_replace('!','',$username);//заменя ! с празен интервал
$phone=trim($_POST['phone']);
$phone=str_replace('!','',$phone);
$selectedGroup=(int)$_POST['group'];//нормализация на select
$error=false;
if(mb_strlen($username,'UTF-8')<4){//задава енкодинга
echo '<p>The name is too short</p>';
$error=true;
}
if(mb_strlen($phone)<4 || mb_strlen($phone)>12){
echo '<p>Wrong number</p>';
$error=true;
}
if(!array_key_exists($selectedGroup,$groups)){//проверява дали съществува ключ за даден масив
echo '<p>Invalid group</p>';
$error=true;
}
if(!$error){//ако няма грешка се изпълнява
$result=$username.'!'.$phone.'!'.$selectedGroup."\n";
if(file_put_contents('data.txt',$result,FILE_APPEND)){//FILE_APPEND вкарва и този запис като следващ, ако го няма-записа ще се презапише
echo 'The record is successful';
}
}}
?>
<a href="index.php">List</a>
<form method="post">
<div>Name:<input type="text" name="username"></div>
<div>Phone:<input type="text" name="phone"></div>
<div><select name="group">
<?php foreach($groups as $key=>$value){
echo '<option value="'.$key.'">'.$value.'</option>';
}?>
</select>
</div>
<div><input type="submit" value="Insert"></div>
</form>
<?php
include 'footer.php';
?>
