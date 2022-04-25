<?php

$data=file_get_contents("data.json");
$data=json_decode($data);
echo "<pre>";
print_r($data[0]);
echo "</pre>";
 $dsn="mysql:host=localhost;charset=utf8;dbname=culture";
 $pdo=new PDO($dsn,'root','');

 foreach($data as $item){
     $sql="INSERT INTO art_collection (`Identifier`, `MainTitle`, `Creator`, `CreatedYear`, `Size`, `Type`, `Owner`, `AcquiredDate`, `OriginalUrl`, `OwnerCollectionsWebsite`, `OwnerWebsite`, `ApplicationGuide`, `Description`, `ImageUrl`)
            VALUES('{$item->Identifier}', '{$item->MainTitle}', '{$item->Creator}', '{$item->CreatedYear}', '{$item->Size}', '{$item->Type}', '{$item->Owner}', '{$item->AcquiredDate}', '{$item->OriginalUrl}', '{$item->OwnerCollectionsWebsite}', '{$item->OwnerWebsite}', '{$item->ApplicationGuide}', '{$item->Description}', '{$item->ImageUrl}')";
    
    $pdo->exec($sql);

 }
 echo "新增完成";





