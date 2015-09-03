<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Preview</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="jumbotron text-center">
                <h1>Preview</h1>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="text-center">
                        <?php
                            $file = "./data/data.csv";
                            if ( ( $handle = fopen ( $file, "r" ) ) !== FALSE ) {
                                echo "<table class=\"table table-striped\">\n";
                                while ( ( $data = fgetcsv ( $handle, 1000, ",", '"' ) ) !== FALSE ) {
                                    echo "\t<tr>\n";
                                    for ( $i = 0; $i < count( $data ); $i++ ) {
                                        echo "\t\t<td>{$data[$i]}</td>\n";
                                    }
                                    echo "\t</tr>\n";
                                }
                                echo "</table>\n";
                                fclose ( $handle );
                            }
                        ?>
                        <p><a href="index.html"><input type="button" value="Top"></a></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>