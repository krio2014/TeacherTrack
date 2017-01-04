<?php

class address {
    
    public $people;
    public $person1;
    public $person2;
    public $person3;
    
    
    public function __construct(){
        
        
        $this->person1 = new person('adam',"03/06/1987", "328 worle moor");
        $this->person2 = new person('Anne-marie',"24/10/1989", "328 worle moor");
        $this->person3 = new person('steve',"19/10/1957", "1 The Road");

        echo '<pre>';
        global $people;
        
        $people[] = $this->person1;
        
//        echo 'after 1:<p/>';
//        var_dump($people);
        
//        var_dump($this->person1);
        
        $people[] = $this->person2;
        
//        echo 'after 2:<p/>';
//        var_dump($people);
        
        $people[] = $this->person3;
        
//        echo 'after 3:<p/>';
//        var_dump($people);
        
        echo '</pre>';

        
//        return $people;
        
    }
    
//    public function test(){
//        echo 'enter test<p>';
//        global $people;
//        return $this->people;
//    }
    
    function getPerson($numberPerson){
        global $people;
        
//        var_dump($people[$numberPerson]);
        
        return $people[$numberPerson];
    }
    
    function getPersonName($index){
//        var_dump($this->people);
        return $this->people[$index]->getName;
        
        
    }
    
    public function getPeople(){
        



    }
    
    
}