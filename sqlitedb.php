<?
class sdb{
    public static function query($db,$sql){
        $db = new PDO('sqlite:'.$db, '', '', []);
        $arr=[];
        $ret = $db->query($sql);
        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
            $arr[]=$row;
        }
        $db->close();
        return $arr;
    }
    
     public static function add($db,$sql){
        $sqlite_db = new PDO('sqlite:'.$db, '', '', []);
        $sqlite_db->beginTransaction();
        $sqlite_db->exec($sql);
        $sqlite_db->commit();
    }
    
    
      public static function create($db,$sql){
        $sqlite_db = new PDO('sqlite:'.$db, '', '', []);
        $sqlite_db->beginTransaction();
        $sqlite_db->exec($sql);
        $sqlite_db->commit();
    }
}


?>
