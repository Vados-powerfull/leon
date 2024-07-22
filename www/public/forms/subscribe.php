<? 
    session_start();
    include ('../../core/model/common.php');
    

$email = $_POST['email'];



mqo("INSERT INTO `mailing` (email) VALUES ('$email')")
                

    
?>