
    <?php
/**
 * Plugin Name: Contact-treatment
**/
        
            if (isset($_POST['id'])) {
                $ID = intval($_POST['id']);

                $pdo = new PDO('mysql:host=extranetmgrtdev.mysql.db;dbname=extranetmgrtdev', 'extranetmgrtdev', 'JQshzVbUJFG48xBF');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = 'DELETE FROM `wp_contacts` WHERE ID = '. $ID .';';
                $prepare = $pdo->prepare($sql);
                $prepare->execute();

            }
        
    
    ?>