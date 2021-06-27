<?
class jdb{
    public static function query($f=[]){
        if(!file_exists("data.json")){
            file_put_contents('data.json', "[]");
        }
        $s = file_get_contents('data.json');
        $arr = json_decode($s,true);
        $re =[];
        if(empty($f)){
            $re=$arr;
        }else{
            foreach ($arr as $vv){
                $ok=false;
                foreach($f as $k=>$v)
                {
                       $ok=($vv[$k]==$v);
                }
                if($ok){ $re[]=$vv; }
            }
        }
      
        return $re;
    }
    
    public static function find($f=[]){
        if(!file_exists("data.json")){
            file_put_contents('data.json', "[]");
        }
        $s = file_get_contents('data.json');
        $arr = json_decode($s,true);
        $re =[];
        if(empty($f)){
            $re=$arr[0];
        }else{
            foreach ($arr as $vv){
                $ok=false;
                foreach($f as $k=>$v)
                {
                       $ok=($vv[$k]==$v);
                }
                if($ok){ $re[]=$vv; break;}
            }
        }
      
        return $re[0];
    }
    
    public static function one($key,$f=[]){
        if(!file_exists("data.json")){
            file_put_contents('data.json', "[]");
        }
        $s = file_get_contents('data.json');
        $arr = json_decode($s,true);
        $re =[];
        if(empty($f)){
            $re=$arr[0];
        }else{
            foreach ($arr as $vv){
                $ok=false;
                foreach($f as $k=>$v)
                {
                       $ok=($vv[$k]==$v);
                }
                if($ok){ $re[]=$vv; break; }
            }
        }
      
        return $re[0][$key];
    }
    
    public static function add($m){
         if(!file_exists("data.json")){
            file_put_contents('data.json', "[]");
        }
         $s = file_get_contents('data.json');
         $arr = json_decode($s,true);
         $arr[]=$m;
         file_put_contents('data.json', json_encode($arr,256));
         return "ok";
    }
    
     public static function edit($m,$f=[]){
        if(!file_exists("data.json")){
            file_put_contents('data.json', "[]");
        }
        $s = file_get_contents('data.json');
        $arr = json_decode($s,true);
        if(!empty($f)){
            foreach ($arr as $kk=>&$vv){
                $ok=false;
                foreach($f as $k=>$v)
                {
                       $ok=($vv[$k]==$v);
                }
                if($ok){ 
                    foreach($m as $mk=>$mv)
                    {
                        $arr[$kk][$mk]=$mv;
                    }
                }
            }
        }
        file_put_contents('data.json', json_encode($arr,256));
        return "ok";
    }
    
    public static function del($f=[]){
        if(!file_exists("data.json")){
            file_put_contents('data.json', "[]");
        }
        $s = file_get_contents('data.json');
        $arr = json_decode($s,true);
        if(!empty($f)){
            foreach ($arr as $kk=>&$vv){
                $ok=false;
                foreach($f as $k=>$v)
                {
                       $ok=($vv[$k]==$v);
                }
                if($ok){ 
                  unset($arr[$kk]);
                }
            }
        }
        file_put_contents('data.json', json_encode($arr,256));
        return "ok";
    }
}


?>
