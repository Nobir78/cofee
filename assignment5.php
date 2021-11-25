<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assignment5</title>

    <style>
        .level{
            font-size: 18px;
            font-weight: bold;
             margin-left: 105px;
        }
        .btn{
            height: 25px;
            width: 55px;
            background: green;
            color: white;
            font-size: 20px;
            /* margin-left: 200px; */
        }
    </style>
</head>
<body>

<?php
$oper=$num1=$num2=$num3=$num4=$num5=$num6=$num7=$num8="";

if(isset($_POST["operator"])){
   $oper = $_POST["operator"];
   $num1 = $_POST["num11"];
   $num2 = $_POST["num12"];
   $num3 = $_POST["num13"];
   $num4 = $_POST["num14"];
   $num5 = $_POST["num15"];
   $num6 = $_POST["num16"];
   $num7 = $_POST["num17"];
   $num8 = $_POST["num18"];
    echo $num8;

   $matrix1 = array(
       array($num1,$num2),
       array($num3,$num4)
   );
   $matrix2 = array(
    array($num5,$num6),
    array($num7,$num8)
    );

    $sum = array();
    $multi = array(
                 array(0,0),
                 array(0,0)
             );

 // Addition of Mattrix
        if($oper=="Add"){
        for($row=0; $row<count($matrix1); $row++){
            $colLength = count($matrix1[$row]);
            for($col=0; $col<$colLength; $col++){
                array_push($sum,$matrix1[$row][$col]+$matrix2[$row][$col]);
            }
        
            
        }
    }
// Summation of Mattrix
    if($oper=="Sub"){
        $sum = array();
        for($row=0; $row<count($matrix1); $row++){
            $colLength = count($matrix1[$row]);
            for($col=0; $col<$colLength; $col++){
                array_push($sum,$matrix1[$row][$col]-$matrix2[$row][$col]);
            }
        
            
        }
    }

// Multiplication of Mattrix
    if($oper=="Multi"){
        $sum = array();
        for($row=0; $row<count($matrix1); $row++){
            $colLength = count($matrix1[$row]);
            for($col=0; $col<$colLength; $col++){
                for($i=0; $i<2; $i++){
                    $multi[$row][$col] = $multi[$row][$col]+ $matrix1[$row][$i]*$matrix2[$i][$col];

                }
                    }
        
            
        }
    }


}

?>



    <h1 align="center">Assignment5</h1>
    <div>
        <form action="" method="POST">

  <!-- Input Number For Matrix -->
            <label for="num1" class="level">Input 1st 2*2 Matrix</label>
            <input type="number" name="num11" value="<?php echo $num1 ?>" required>
            
            <label for="num1"></label>
            <input type="number" name="num12" value="<?php echo $num2 ?>" required>
            
            <label for="num1"></label>
            <input type="number" name="num13" value="<?php echo $num3 ?>" required>
            
            <label for="num1"></label>
            <input type="number" name="num14" value="<?php echo $num4 ?>"  required><br>
            
            <label class="level" for="num1">Input 2nd 2*2 Matrix</label>
            <input type="number" name="num15" value="<?php echo $num5 ?>" required>
            
            <label for="num1"></label>
            <input type="number" name="num16" value="<?php echo $num6 ?>" required>
            
            <label for="num1"></label>
            <input type="number" name="num17" value="<?php echo $num7 ?>" required>
            
            <label for="num1"></label>
            <input type="number" name="num18" value="<?php echo $num8 ?>" required><br><br>
    <!-- These 3 Input Type For Submit -->
            <input class="btn" style="margin-left: 107px;" type="submit" value="Add" name="operator">
            <input class="btn" type="submit" value="Sub" name="operator">
            <input class="btn" type="submit" value="Multi" name="operator"><br>
  <!-- 4 Input Type For Result -->
           <br>  <label for="num1" class="level">Your Result is here</label>
            <input type="number" name="num1"
            
            value="<?php 
            if(isset($oper) and $oper=="Multi"){
                echo $multi[0][0];
             }
             else{
                 echo $sum[0];
             }
            ?>" readonly>

            
            <label for="num1"></label>
            <input type="number" name="num1" 
            value="<?php 
                if(isset($oper) and $oper=="Multi"){
                echo $multi[0][1];
             }
             else{
                 echo $sum[1];
             }
            ?>" readonly>
            
            <label for="num1"></label>
            <input type="number" name="num1" value="<?php 
            
            if(isset($oper) and $oper=="Multi"){
                echo $multi[1][0];
             }
             else{
                 echo $sum[2];
             }
            
            
            ?>" readonly>
            
            <label for="num1"></label>
            <input type="number" name="num1" value="<?php 
            
            if(isset($oper) and $oper=="Multi"){
                echo $multi[1][1];
             }
             else{
                 echo $sum[3];
             }
            
            
            ?>" readonly><br>
            

        </form>
    </div>
</body>
</html>
