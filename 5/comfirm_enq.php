<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Comfirm</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="jumbotron text-center">
                <h1>Comfirm</h1>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="text-center">
                        <?php
                            $name=$_POST['name'];
                            $name=htmlspecialchars($name);
                            $mail=$_POST['mail'];
                            $mail=htmlspecialchars($mail);
                            $age=$_POST['age'];
                            $age=htmlspecialchars($age);
                            $toi=$_POST['toi'];
                            $toi=htmlspecialchars($toi);
                            if($name==''){
                                echo'名前が入力されていません。<br/>';
                            }
                            else{
                                echo'ようこそ：'.$name.'<br/>';
                            }
                            if($mail==''){
                                echo'メールが入力されていません。<br/>';
                            }
                            else{
                                echo'メールアドレス：'.$mail.'<br/>';
                            }
                            if($age==''){
                                echo'年齢が入力されていません。<br/>';
                            }
                            else{
                                echo'年齢：'.$age.'歳<br/>';
                            }
                            if(empty($_POST['sex'])){
                                echo'性別が選択されていません。<br/>';
                            }
                            else{
                                $sex = $_POST['sex'];
                                echo'性別：'.$sex.'<br/>';
                            }
                            if(empty($_POST['hobby'])){
                                echo'趣味が選択されていません。<br/>';
                            }
                            else{
                                $hobby = $_POST['hobby'];
                                foreach ($hobby as $key => $value){
                                    echo $value . '<br/>';
                                    $hobby_a[] = $value; 
                                }
                            }
                            if($toi==''){
                                echo'内容が入力されていません。<br/>';
                            }
                            else{
                                echo'内容：'.$toi.'<br/>';
                            }
                            if($name==''||$mail==''||$toi==''||$age==''||$sex==''||$hobby==''){
                                echo'<from>';
                                echo'<input type="button" onclick="history.back()" value="BACK">';
                                echo'</form>';
                            }
                            else{
                                echo'<form method="post" action="input_finish.php">';
                                echo'<input type="hidden" name="name" value="'.$name.'">';
                                echo'<input type="hidden" name="mail" value="'.$mail.'">';
                                echo'<input type="hidden" name="age" value="'.$age.'">';
                                echo'<input type="hidden" name="sex" value="'.$sex.'">';
                                $hobby_s = implode(",", $hobby_a);
                                echo'<input type="hidden" name="hobby" value="'.$hobby_s.'">';
                                echo'<input type="hidden" name="toi" value="'.$toi.'">';
                                echo'<input type="button" onclick="history.back()" value="BACK">';
                                echo'<input type="submit" value="OK">';
                                echo'</form>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>