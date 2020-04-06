<?php

// 會員中心尋找好友功能，php用%?%代入時無法對sql進行中文字搜索

require_once "./db.inc.php";

$_nickname = "{$_POST['nickname']}";

// $sql="
// SELECT `mbNick`, `mbCountry`, `mbDes`
// FROM `mbinfo`
// WHERE `mbNick` like N'%?%'
// ";

// 將導入的中文字設計成新的字串
$name = '%' . $_nickname . '%';
$sql = "SELECT `mbNick`, `mbCountry`, `mbDes`
        FROM `mbinfo`
        WHERE `mbNick` like :NAME
       ";
// $d = $this->$pdo->prepare($sql);
// $d->bindParam(":NAME", $name);
// $d->execute();
// $data = $d->fetchAll();

$search_stmt = $pdo->prepare($sql);
// 將設計好的字串綁入，這時不再受到prepare影響??
$search_stmt->bindParam(":NAME", $name);
$search_stmt->execute();

$arr = $search_stmt->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($arr);
// echo '</pre>';
// exit();

// echo $change=urlencode($_nickname);
// echo urldecode($change);

// $arr2=$arr[0];

// $arr[1]= $arr2;

// echo "<pre>";
// print_r($arr);
// echo "</pre>";
// exit();

// 搜尋結果會產生亂碼，需要用urlencode進行編碼後再轉JSON

$collect = [];

for ($i = 0; $i < count($arr); $i++) {
    foreach ($arr[$i] as $key => $value) {
        // 透過urlencode讓陣列中的中文字消失
        $testJSON[$i][$key] = urlencode($value);

    }
    //key:value pair塞入array
    $collect[$i] = $testJSON[$i];

    // echo urldecode ( json_encode ( $testJSON[$i] ) );

}
//將完成的arry，轉JSON
$jsontransfer = json_encode($collect);
//反解中文字出來
$d = urldecode($jsontransfer);
//印出JSON，導入前端
echo $d;

exit();
