<?php include('header.php')?>
<?php include('connction.php') ?>
<div class="page shirts section">
<div class="wrapper">

<h2>My ALL Stuff</h2>
<div class= "section shirts latest">
    
<?php 
$stuff = array();
$query = 'SELECT * FROM stuff';
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result))
{
  $stuff[$row['ID']] = array(
    "name" => $row['name'],
    "img" => $row['img'],
    "price" => $row['price']
  );
}

?>
<ul class="products">
    <?php 
    foreach ($stuff as $key => $value) {
        echo '	<li><a href="item.php?id='. $key.'">
        <img src="'.$value["img"].'" alt="'.$value["name"].'">
        <p>View Details</p>
    </a>
</li>';
    }
    
    ?>

                                
</ul>
</div>

</div>
<?php include('footer.php') ?>