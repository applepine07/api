<?php
// ▲下載成為data.json檔
// 如果有data.json檔就讀該檔，沒有就現抓存成json檔
// if (!file_exists('data.json')) {
// $data = file_get_contents("https://quality.data.gov.tw/dq_download_json.php?nid=35286&md5_url=bb773532bfb3a5bfc22d68925755714b");
// fopen('本地文件檔名/URL','開啟模式')
// w 写入方式打开，将文件指针指向文件头并将文件大小截为零。如果文件不存在则尝试创建之。
// $file = fopen('data.json', 'w');
// fwrite(規定要寫入的打開文件，規定要寫入文件的字符串)
// fwrite($file, $data);
// fclose($file);
// }
// echo file_get_contents('data.json');

$data = file_get_contents('data.json');
// $data = json_decode($data);
// echo "<pre>";
// print_r($data);
// print_r($data[0]->Identifier);
// echo "</pre>";

// echo $data;
// 將資料中的單引號變成上引號
// $data = str_replace("'", "`", $data);
// // echo出來後，發現是json，於是我們用json_decode接受一個JSON 格式的字符串並且把它轉換為PHP 陣列，後面加上true去掉陣列中包的stdClass變成陣列
$data = json_decode($data,true);
// 轉成陣列後，用下方去掉重複的值變成一個新陣列，這樣原陣列的245就會被去掉
$data = array_map('unserialize', array_unique(array_map('serialize', $data)));
echo "<pre>";
print_r($data);
// print_r($data[93]);
echo "</pre>";
$dsn = "mysql:host=localhost;charset=utf8;dbname=culture";
$pdo = new PDO($dsn, 'root', '');

foreach ($data as $key => $item) {
    if (!is_null($item)) {
        $sql = "INSERT INTO art_collection (`Identifier`, `MainTitle`, `Creator`, `CreatedYear`, `Size`, `Type`, `Owner`, `AcquiredDate`, `OriginalUrl`, `OwnerCollectionsWebsite`, `OwnerWebsite`, `ApplicationGuide`, `Description`, `ImageUrl`)
    VALUES('{$item['Identifier']}', '{$item['MainTitle']}', '{$item['Creator']}', '{$item['CreatedYear']}', '{$item['Size']}', '{$item['Type']}', '{$item['Owner']}', '{$item['AcquiredDate']}', '{$item['OriginalUrl']}', '{$item['OwnerCollectionsWebsite']}', '{$item['OwnerWebsite']}', '{$item['ApplicationGuide']}', '{$item['Description']}', '{$item['ImageUrl']}')";
        $pdo->exec($sql);
    }
}
echo "新增完成";
