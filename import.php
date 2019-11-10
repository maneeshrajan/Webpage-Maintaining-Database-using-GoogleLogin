<?php
$connect = mysqli_connect("localhost", "root", "", "test");
$output = '';
if(isset($_POST["import"]))
{
 $extension = end(explode(".", $_FILES["excel"]["name"])); 
 $allowed_extension = array("xls", "xlsx", "csv"); 
 if(in_array($extension, $allowed_extension)) 
 {
  $file = $_FILES["excel"]["tmp_name"]; 
  include("PHPExcel/IOFactory.php"); 
  $objPHPExcel = PHPExcel_IOFactory::load($file); 

  $output .= "<label class='text-success'>Data Inserted</label><br /><table class='table table-bordered'>";
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=2; $row<=$highestRow; $row++)
   {
    $output .= "<tr>";
    $part = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
    $prev = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
    $latest = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
    $query = "INSERT INTO tbl_excel(excel_part, excel_prev,excel_latest) VALUES ('".$part."', '".$prev."', '".$latest."')";
    mysqli_query($connect, $query);
    $output .= '<td>'.$part.'</td>';
    $output .= '<td>'.$prev.'</td>';
    $output .= '<td>'.$latest.'</td>';
    $output .= '</tr>';
   }
  } 
  $output .= '</table>';

 }
 else
 {
  $output = '<label class="text-danger">Invalid File</label>'; 
 }
}
?>

<html>
 <head>
  <title>Import Excel to Mysql using PHPExcel in PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <style>
  body
  {
   margin:0;
   padding:0;
   background-color:#f1f1f1;
  }
  .box
  {
   width:700px;
   border:1px solid #ccc;
   background-color:#fff;
   border-radius:5px;
   margin-top:100px;
  }
  
  </style>
 </head>
 <body>
  <div class="container box">
   <h3 align="center">Import</h3><br />
   <form method="post" enctype="multipart/form-data">
    <label>Select Excel File</label>
    <input type="file" name="excel" />
    <br />
    <input type="submit" name="import" class="btn btn-info" value="GET DATA" />
    
    <button id="ex" class="btn btn-info" name="export">EXPORT</button><br><br>
        <?php
          if(isset($_POST['export'])){
            echo "<script>window.open('Export.php','_self')</script>";
          }
        ?>

      <button id="ex" class="btn btn-info" name="update1">UPDATE</button><br><br>
        <?php
          if(isset($_POST['update1'])){
            echo "<script>window.open('update_t.php','_self')</script>";
          }
        ?>


  </form>


   <br />
   <br />
   <?php
   echo $output;
   ?>
  </div>
 </body>
</html>