<?php
// ▲下載成為data.json檔
// 如果有data.json檔就讀該檔，沒有就現抓
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

$data = file_get_contents("https://quality.data.gov.tw/dq_download_json.php?nid=35286&md5_url=bb773532bfb3a5bfc22d68925755714b");

// echo $data;
// echo出來後，發現是複雜的json，於是我們用json_decode接受一個JSON 格式的字符串並且把它轉換為PHP 陣列
$data=json_decode($data);
echo "<pre>";
print_r($data);
echo "</pre>";
