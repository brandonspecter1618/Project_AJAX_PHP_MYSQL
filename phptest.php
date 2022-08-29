<?php

function phpTest(){
    $a    = $_POST["key1"];
    $b    = $_POST["key2"];
    $c    = $_POST["key3"];
    $host = "127.0.0.1";
    $user = "root";
    $pass = "22091992";
    $db   = "db_alunos";

    $dbConn = mysqli_connect($host, $user, $pass, $db);

        if($dbConn){
            echo("Connection Sucessfully!!!" . "<br>");
        }else{
            echo("Problem Connection!!!");
        }
    $querySelect = "select * from alunos";    
    $queryInsert = "insert into alunos(nome, email, age) values('$a', '$b', 29)";
    $queryExclude = "delete from alunos where id_aluno = $a";    
    
    if($c == 'mostrar'){
        $dbQuery = mysqli_query($dbConn, $querySelect);

        if($dbQuery){
    
            while ($row = mysqli_fetch_row($dbQuery)) {
                echo "ID: $row[0] <br> Nome: $row[1] <br>  E-mail: $row[2]  Idade:$row[3]";
                echo "<br><br>";
            }
        }else{
            echo("Connection Error" . mysqli_error());
        }
    }

    if($c == 'incluir'){
        $dbCreate = mysqli_query($dbConn, $queryInsert);

            if($dbCreate){
                echo("Insert row");
            }else{
                echo("Error Insert Row" . mysqli_error());
            }
    }

    if($c == 'excluir'){
            $dbCreate = mysqli_query($dbConn, $queryExclude);

            if($dbCreate){
                echo("Delete id $a");
            }else{
                echo("Error Delete id $a" . mysqli_error());
            }
    }
    

}

phpTest();

    

    


   

