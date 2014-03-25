<?php
$pageTitle='List';
include 'header.php';
?>
<a href="form.php">New contact</a>
<table border=1>
<tr>
<td>Name</td>
<td>Phone</td>
<td>Group</td>
</tr>
<?php
if(file_exists('data.txt')){//ако файла съществува се изпълнява
$result= file('data.txt');//вкарва информация във файла
foreach ($result as $value){
$columns= explode('!',$value);//разделя информацията в колоните в таблицата
echo '<tr>
<td>'.$columns[0].'</td>
<td>'.$columns[1].'</td>
<td>'.$groups[trim($columns[2])].'</td>
</tr>';
}
}
?>
</table>
<?php
include 'footer.php';
?>
