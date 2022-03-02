<?php

    $data = [1,98,444,2,11];
    echo ($data[1]."<br />");
    $data[] = 77;
    echo ($data[5]."<br />");

    for($i=0; $i< 7; $i++){
        echo ($i."-й элемент равен ".$data[$i]."<br />");
    }

    $people = [
        ["Yurii","Andreenko",12345],
        ["Vasya","Pupkin",1342],
        ["Masha","Mashkina",3221],
    ];

    for ($i=0; $i < count($people) ; $i++) { 
        echo($people[$i][0]." - ".$people[$i][2]."<br />");
    }

    $people2 = [
        array("FirstName"=>"Yurii","LastName"=>"Andreenko","Salary" =>12345),
        array("FirstName"=>"Vasya","LastName"=>"Pupkin","Salary" =>1342),
        array("FirstName"=>"Masha","LastName"=>"Mashkina","Salary" =>3221),
    ];
        
    for ($i=0; $i < count($people2) ; $i++) { 
        echo($people2[$i]["FirstName"]." - ".$people2[$i]["Salary"]."<br />");
    }