<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="index.css"/>
    </head>

    <body>
        <div class="main">  
            <header class="sample_header">
                <h1>Sample Header</h1> 
            </header>

            <div class="lorem_ipsum">
                <div class="li_txtBox">
                    <div class="top_text">
                        <h1>NEVER GONNA GIVE YOU UP,</h1>
                        <h3>Never gonna let you down...</h3>
                        <a href="form_sample.php"><button>Sign UP!</button></a>
                    </div>


                    <?php
                        $server_name = 'localhost';
                        $username = 'root';
                        $database = 'sample_db';

                        
                        $conn = mysqli_connect($server_name, $username, '', $database);
                        if(!$conn)
                        {
                            die("Connection failed! ". mysqli_connect_error());
                            $conn->close();
                        }
                    ?>

                    
                </div>
            </div>

            <footer class="sample_footer">
                <p>&copy 2024 Created by Emman Isaac Conggas.</p>
            </footer>
        </div>
    </body>
</html>
