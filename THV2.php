<?php  
class Device{
    private $name;
    private $price;

    public function __construct($n,$p){

    $this->name=$n;
    $this->price=$p;
    }
    public function __toString(){

    return "name: ".$this->name."-price : ".$this->price."\n";
    }
}

 $devices=[];
 for($i=0;$i<4;$i++){
    $devices[]=new Device("device".$i,rand(100,1000));
 }

$f=fopen("devices.txt","w");
foreach($devices as $d){
    fwrite($f,$d->__toString());
}
fclose($f);








?>