<!DOCTYPE html>
<html lang="en">
<head>
    <title>Solution of Assignment5</title>
    <style>
        .submit{
            margin-left: 50px;
            width: 60px;
            height: 30px;
            font-size: 30px;
        }
        span{
            margin-left: 270px;
            font-size: 23px;
        }
        label{
            margin-left: 40px;
        }
    </style>
</head>
<body>

<?php

if(isset($_POST['operator']) or isset($_POST['checking'])){

//Null input checking for restrict
     if(empty($_POST['A11'] && $_POST['A12'] && $_POST['A21'] && $_POST['A22'] && 
    $_POST['B11'] && $_POST['B12'] && $_POST['B21'] && $_POST['B22'])){

        echo "<span style='color:red'>Fill Up With Mattrix</span>";

         }


//String input cheking for restrict
       elseif(!is_numeric($_POST['A11']) or !is_numeric($_POST['A12']) or !is_numeric($_POST['A21']) or !is_numeric($_POST['A22']) or
              !is_numeric($_POST['B11']) or !is_numeric($_POST['B12']) or !is_numeric($_POST['B21']) or !is_numeric($_POST['B22'])){

             echo "<br> <span style='color:red'>Input only number</span>";

              }

//.......................Input Receive and checking and decorating...............................

        else{
            
//Input Checking Function
        function check($input){

            if(is_numeric($input)){
                $data = htmlspecialchars($input);
                $data = stripslashes($input);
                $data = (int)$input;
                return $data;
            }

        }


 // input Value Receive and Array Making
            $a11 = check($_POST['A11']);
            $a12 = check($_POST['A12']);
            $a21 = check($_POST['A21']);
            $a22 = check($_POST['A22']);
            $B11 = check($_POST['B11']);
            $B12 = check($_POST['B12']);
            $B21 = check($_POST['B21']);
            $B22 = check($_POST['B22']);
            

            $Array1 = array(
                array($a11,$a12),
                array($a21,$a22)
            );

            $Array2 = array(
                array($B11,$B12),
                array($B21,$B22)
            );

//.....................Operation function start.......................................


// Operation function for Addition 
            function addition($a1,$a2){
                if(isset($_POST['operator'])== '+'){
                    $result = array();
                    for($row=0; $row<2; $row++){
                        $coLength = count($a1[$row]);
                        for($col=0; $col<2;$col++){
                            $sum = $a1[$row][$col] + $a2[$row][$col];
                            array_push($result,$sum);
                        }
                    }
                    return $result;
                }
        }


 //Operation function for Subtraction
        function subtruction($matrix1,$matrix2){
            if(isset($_POST['operator'])== '-'){
                $sum = array();
                for($row=0; $row<count($matrix1); $row++){
                    $colLength = count($matrix1[$row]);
                    for($col=0; $col<$colLength; $col++){
                        array_push($sum,$matrix1[$row][$col]-$matrix2[$row][$col]);
                    }
        
        
                }
                return $sum;
            }
        }



//Operation function for Multiplication
        function multiplication($matrix1,$matrix2){
            $multi= array(
                array(0,0),
                array(0,0)
            );
            if(isset($_POST['operator'])== '*'){
                for($row=0; $row<count($matrix1); $row++){
                    $colLength = count($matrix1[$row]);
                    for($col=0; $col<$colLength; $col++){
                        for($i=0; $i<2; $i++){
                            $multi[$row][$col] = $multi[$row][$col]+ $matrix1[$row][$i]*$matrix2[$i][$col];
        
                        }
                            }
        
        
                }   

            }
            return $multi;
        }


//Operation Object
        $add = addition($Array1,$Array2);
        $sub = subtruction($Array1,$Array2);
        $multi = multiplication($Array1,$Array2);



 // Chek array or not function
        function arrayCheck($array1,$array2){
        
            echo "<br><span style='color:blue; margin-left:5px'>Matrix A:  </span>";
            var_dump($array1);
            echo "<br>";
            echo "<span style='color:blue; margin-left:5px'>Matrix B:  </span>";
            var_dump($array2);
            echo "<br>";
           if(isset($_POST['checking'])){
               $result = array(
                   array($_POST['R11'],$_POST['R12']),
                   array($_POST['R21'],$_POST['R22'])
                );
           }   
           echo "<span style='color:green; margin-left:5px'>Matrix(Result):  </span>";
           var_dump($result);     
        }



            }
}

?>





    <form action="" method="POST">
        <br><br>

<!--Mattrix(A) -->
        <label for="a">Mattrix(A):</label>
        <input type="text" name="A11" id="" placeholder="A11" value="<?php if(isset($_POST['A11'])) echo $_POST['A11'];?>">
        <input type="text" name="A12" id="" placeholder="A12" value="<?php if(isset($_POST['A12'])) echo $_POST['A12'];?>"><br>
        <input  type="text" name="A21" id="" placeholder="A21" value="<?php if(isset($_POST['A21'])) echo $_POST['A21'];?>" style="margin-left: 120px;">
        <input type="text" name="A22" id="" placeholder="A22" value="<?php if(isset($_POST['A12'])) echo $_POST['A22'];?>"><br>
                    <br>
<!-- Mattrix(B) -->
        <label for="a">Mattrix(B):</label>
        <input type="text" name="B11" id="" placeholder="B11" value="<?php if(isset($_POST['B12'])) echo $_POST['B11'];?>">
        <input type="text" name="B12" id="" placeholder="B12" value="<?php if(isset($_POST['B12'])) echo $_POST['B12'];?>"><br>
        <input type="text" name="B21" id="" placeholder="B21" value="<?php if(isset($_POST['B21'])) echo $_POST['B21'];?>" style="margin-left: 120px;">
        <input type="text" name="B22" id="" placeholder="B22" value="<?php if(isset($_POST['B22'])) echo $_POST['B22'];?>">
                    <br><br>
<!-- Operation Button -->
        <input type="submit" name="operator" style="margin-left: 150px;" class="submit" value="+">
        <input type="submit" name="operator" class="submit" value="-">
        <input type="submit" name="operator" class="submit" value="*">

                    <br><br>

<!--Result showing coding here      -->
        <label for="a" style="font-size: 18px;">Result:</label>
        <input type="text" name="R11" id="" readonly 
        value="
        <?php if(isset($add) && isset($multi) && isset($sub)){
             if($_POST['operator'] == '+'){
                 echo $add[0];
             }
             elseif($_POST['operator']=='-'){
                 echo $sub[0];
             }
             else{
                 echo $multi[0][0];
             }
        }

        if(isset($_POST['checking'])){
            if(isset($_POST["R11"])){
                echo $_POST['R11'];
            }
        }
        ?>">


     <input type="text" name="R12" id="" readonly 
        value="
        <?php if(isset($add) && isset($multi) && isset($sub)){

             if($_POST['operator'] == '+'){
                 echo $add[1];
             }
             elseif($_POST['operator']=='-'){
                 echo $sub[1];
             }
             else{
                 echo $multi[0][1];
             }
        }

        if(isset($_POST['checking'])){
            if(isset($_POST["R12"])){
                echo $_POST['R12'];
            }
        }
        ?>">


     <input type="text" name="R21" id="" readonly 
        value="
        <?php if(isset($add) && isset($multi) && isset($sub)){
             if($_POST['operator'] == '+'){
                 echo $add[2];
             }
             elseif($_POST['operator']=='-'){
                 echo $sub[2];
             }
             else{
                 echo $multi[1][0] ;
             }
        }

        if(isset($_POST['checking'])){
            if(isset($_POST["R21"])){
                echo $_POST['R21'];
            }
        }
        ?>">


     <input type="text" name="R22" id="" readonly 
        value="
        <?php if(isset($add) && isset($multi) && isset($sub)){
             if($_POST['operator'] == '+'){
                 echo $add[3];
             }
             elseif($_POST['operator']=='-'){
                 echo $sub[3];
             }
             else{
                 echo $multi[1][1];
             }
        }

        if(isset($_POST['checking'])){
            if(isset($_POST["R22"])){
                echo $_POST['R22'];
            }
        }
        ?>">


<!-- Checking array -->

                    <br><br>
        <input type="submit" name="checking" value="check_Array" style="font-size: 19px;">
        <?php 
        if(isset($_POST['checking']) && isset($Array1) && isset($Array2)){

             arrayCheck($Array1,$Array2); } 
        ?>

    </form>
</body>
</html>