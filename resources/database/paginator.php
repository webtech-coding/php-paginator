<?php
final class Paginator{

    private $item_per_page;
    private $total_items;
    private $current_page;

    public function __construct($page=1,$item_per_page=10,$total_items=0){
        
        $this->item_per_page=(int)$item_per_page;
        $this->total_items=(int)$total_items;
        $this->current_page=(int)$page;
        
    }

    public function next_page(){
        return $this->current_page+1;
    }

    public function previous_page(){
       return $this->current_page-1;
    }

    public function total_pages(){
        return ceil($this->total_items/$this->item_per_page);
    }

    public function isNext(){
        return ($this->next_page()<=$this->total_pages())?true:false;
    }

    public function isPrevious(){
        return ($this->previous_page()>=1) ? true:false;
    }

    public function itemOffset(){
                     
       return ($this->current_page-1)*$this->item_per_page;
    }

}