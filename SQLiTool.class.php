
<?php
    class SQLiTool{
    	
    	public $mysqli;
    	public $db="airMonitor";
    	public $username="root";
    	public $password="xxdxxd123";
    	public $host="localhost";
    	
    	public function __construct() {
    		
              $this->mysqli=new MySQLi($this->host,$this->username,$this->password,$this->db);
    		  
              if($this->mysqli->connect_error){
              	
              	die("Á¬½ÓÊ§°Ü".$this->mysqli->connect_error);
              }
    	}
    
    	public function execute_dql_pageDiv($sql1,$sql2,$pageDiv){
    
    	    
    	    $res=$this->mysqli->query($sql1) or die($mysqli->error());
    	 
    	    $arr=array();
    	    while($row=$res->fetch_assoc()){
    	        
    	        $arr[]=$row;
    	    }
    	    $res->free();
    	    
    	    $res2=$this->mysqli->query($sql2) or die($mysqli->error());
    	    
    	    if($row=$res2->fetch_row()){
    	        
    	        $pageDiv->pageCount=ceil($row[0]/$pageDiv->pageSize);
    	        $pageDiv->rowCount=$row[0];
    	    }
    	    $res2->free();
    	    
    	   
    	    if($pageDiv->pageNow>1){
   	              $prePage=$pageDiv->pageNow-1;
                  $navigate1="<a href='{$pageDiv->gotoUrl}?pageNow=$prePage'>ä¸Šä¸€é¡µ</a> &nbsp;";
            }
            if($pageDiv->pageNow<$pageDiv->pageCount){
                $nextPage=$pageDiv->pageNow+1;
                $navigate2="<a href='{$pageDiv->gotoUrl}?pageNow=$nextPage'>ä¸‹ä¸€é¡µ</a> &nbsp;";
            }
            $page_Whole=10;
            $start=floor(($pageDiv->pageNow-1)/$page_Whole)*$page_Whole+1;
            $index=$start;
           
            if($pageDiv->pageNow>$page_Whole){
                $navigate3.= "<a href='{$pageDiv->gotoUrl}?pageNow=".($start-1)."'><<</a>";
            }
          
            for(;$start<$index+$page_Whole;$start++){
                 
                $navigate3.= "<a href='{$pageDiv->gotoUrl}?pageNow=$start'>[$start]</a>";
                 
            }
                $navigate3.= "<a href='{$pageDiv->gotoUrl}?pageNow=$start'>>></a>";
            
          
    	    $pageDiv->res_array=$arr; 
    	    $pageDiv->navigate1= $navigate1;
    	    $pageDiv->navigate2= $navigate2;
    	    $pageDiv->navigate3= $navigate3;
    	      	    
    	}
    	
    	public function execute_dql($sql){
    		
    		$res=$this->mysqli->query($sql);
    		
    		return $res;
    		
    		
    	}
    
    	public function execute_dql2($sql){
    	    
    	    $arr=array();
    	    $res=$this->mysqli->query($sql);
    	   
    	    while($row=$res->fetch_assoc()){
    	        
    	        $arr[]=$row;
    	    }
    	  
    	    $res->free_result();
    	    return $arr;
    	    
    	}
    	public function execute_dml($sql){
    		
    		$b=$this->mysqli->query($sql);
    		
    		if(!$b){
    			
    			return 0;//fail
    		}else{
    			if($this->mysqli->affected_rows>0){
    				
    				return 1;//success
    			}else{
    				
    				return 2;//no effect
    			}
    			
    			
    		}
    		
    		
    	}
    	
    	
    }
?>
