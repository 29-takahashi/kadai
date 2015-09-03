<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Thanks</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="jumbotron text-center">
                <h1>Thanks</h1>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="text-center">
                        <?php
                            $name=$_POST['name'];
                            $mail=$_POST['mail'];
                            $age=$_POST['age'];
                            $sex=$_POST['sex'];
                            $hobby=$_POST['hobby'];
                            $toi=$_POST['toi'];
                            $name=htmlspecialchars($name);
                            $mail=htmlspecialchars($mail);
                            $age=htmlspecialchars($age);
                            $toi=htmlspecialchars($toi);
                            echo $name . 'さん<br/>';
                            echo 'アンケートへ、ご協力ありがとうございました。';
                            $array = array($name,$mail,$age,$sex,$hobby,$toi);
                            $file = fopen("./data/data.csv", "a");
                            if($file){
                                var_dump( fputcsv($file, $array));
                            }
                            fclose($file);
                        ?>
                        <p><a href="show_enq.php"><input type="button" value="Preview"></a></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>