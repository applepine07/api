<?php

// CORS問題解決方法一，不用jquery，而在php檔用file_get_contents取得後，再用jquery拿php處理過後的
echo file_get_contents("https://quality.data.gov.tw/dq_download_json.php?nid=11339&md5_url=c27e986d791b4754f962dae762edf38c");

?>