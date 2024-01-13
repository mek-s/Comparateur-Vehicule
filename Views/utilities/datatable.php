<?php
class dataTable{
    private $columns;
    private $items;
    private $nbActions;

    public function __construct(array $columns , array $items , $nbActions){
       $this->columns = $columns;
       $this->items = $items;
       $this->nbActions = $nbActions;
    }

    public function render(){?>
        <table id="myTable" class="table table-striped" style="width:100%">
                       <thead>
                           <tr>
                                <?php 
                                for ($i = 1; $i <= count($this->columns); $i++) { 
                                    echo '<th scope="col">'.$this->columns[$i].'</th>';
                                }
                               
                                for ($i = 1; $i <= $this->nbActions; $i++) { 
                                    echo '<th scope="col"></th>';
                                }
                                    
                                 ?>    
                           </tr>
                       </thead>
                         
                       <tbody>
                           <?php  foreach($this->items as $item) { ?>
                                  
                                <tr>
                                   <?php for ($i = 1; $i < count($item); $i++) { 
                                      echo '<td>'.$item['param'.$i].'</td>';
                                    }

                                    foreach ($item['actions'] as $action) {
                                        echo '<td>';
                                        
                                        if ($action['type'] === 'link') {
                                            echo '<a href="' . $action['href'] . '" class="' . $action['class'] . '">' . $action['text'] . '</a>';
                                        } elseif ($action['type'] === 'form') {
                                            echo '<form method="POST">';
                                            echo '<input type="hidden" name="' . $action['hidden_name'] . '" value="' . $action['hidden_value'] . '">';
                                            echo '<button type="submit" name="' . $action['button_name'] . '">' . $action['button_text'] . '</button>';
                                            echo '</form>';
                                        }
                                    
                                        echo '</td>';
                                    }  ?>
                                </tr>
                           <?php } ?>
                       </tbody>
                </table>

    <?php 

}

}

?>