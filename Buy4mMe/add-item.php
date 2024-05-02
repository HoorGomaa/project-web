<?php $title="Add Item"; ?>
<?php include('header.php'); ?>
<div id="content">
<div class="page section">
    <h1>Add Item</h1>
    <?php
    if (isset($_POST['add'])) {

        $pid= $_POST['pid'];
        $name=$_POST['name'];
        $price= $_POST['price'];

        $file_name = basename($_FILES['image']['name']);
        $file_source = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_size = $_FILES['image']['size'];
        $file_error = $_FILES['image']['erroe'];

        $target_path ='img/stuff/';
        $target_path = $target_path.basename($_FILES['image']['name']);
        $accept= array ('png', 'jpg','jpeg');
        $file_parts = explode ('.',$file_name);
        $extension =end ($file_parts);
        if (!$file_error and $file_size <= 500000 and in_array($extension));
    $move_file = move_uploaded_file($file_source,$target_path);
    if ($move_file){

        include('connction.php');

        $query = "INSERT INTO stuff (id, name ,price ) VALUES ($pid, '$name' , $price)";
        $result = mysqli_query($conn, $query);
        if ($result) 
       echo "<p>Item added successfully to the Database</p>";
    else
        echo "<p>Sorry Item was not added</p>";
    }
   
}?>

    <p>Item added successfully to the Database</p>
    

    <p>Sorry Item was not added</p>

    <?php  if (!isset($_POST['add']))
    
        ?>
                <form id="contact" name="add" method="POST" action="add-item.php">
                    <table>
                        <tr>
                            <th>
                                <label for="pid">Product-ID*</label>
                            </th>
                            <td>
                                <input type="text" name="pid" id="pid">
                                
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="name">Product Name*</label>
                            </th>
                            <td>
                                <input type="text" name="name" id="name">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="image">Upload Image</label>
                            </th>
                            <td>
                                <input type="file" name="image" id="image">
                                <span style="font-size: 0.6em; font-style: italic;">(Maximum 500 KB)</span>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="price">Price*</label>
                            </th>
                            <td>
                                <input type="text" name="price" id="price">
                                
                            </td>
                        </tr>                    
                    </table>
                    <input type="submit" value="Add" name="add" id="add"/>

                </form>
    </div>
</div>
<?php include 'footer.php'; ?>