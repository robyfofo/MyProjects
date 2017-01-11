<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-core/renderAvatarDB.php v.3.0.0. 04/11/2016
*/

define('PATH','../');
include_once(PATH."include/configuration.inc.php");
include_once(PATH."include/connectionDB.inc.php");

if (isset($_GET['id'])) {
   $id = @intval($_GET['id']);
   if (intval($id) > 0) {
      try {
         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "SELECT avatar,avatar_info FROM ".Sql::getTablePrefix()."users WHERE id = :id";
         $result = $db->prepare($sql);		
         $result->bindParam(':id',$id,PDO::PARAM_INT);
         $result->execute();
         if ($db->query("SELECT FOUND_ROWS()")->fetchColumn() > 0) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $array_avatarInfo = unserialize($row['avatar_info']);
            $img = $row['avatar'];
            @header ("Content-type: ".$array_avatarInfo['type']);
            echo $img;
            }
         } catch (PDOException $e) {
            echo 'Si è verificata una eccezione PDO Exception.';
            echo 'Errore restituito dal DB: ';
            echo 'SQL Query: ', $query;
            echo 'Errore: ' . $e->getMessage();
            }
      } else {
         echo 'Impossibile soddisfare la richiesta.';
         }
   } else {
      echo 'Impossibile soddisfare la richiesta.';
      }
?>