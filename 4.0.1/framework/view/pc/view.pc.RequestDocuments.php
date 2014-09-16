<?php
?>
<div class="summaryContainer">
    <h1>Documents</h1>

    <table id="requestCommentsTable" class=" sortable" title="" cellspacing="0">
        <thead>
            <tr>
                <th>Document ID</th>
                <th>Description</th>
                <th>URL</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $number=0;
                if(isset($GLOBALS['result']->request_remark_details) && count($GLOBALS['result']->request_remark_details) > 1){
                    $i=-1;
                    foreach($GLOBALS['result']->request_remark_details as $result_c_get){
                        $i=$i+1;
                        $number = $number+1;
                        if($number == 2){
                            $class = "dark";
                            $number = 0;
                        }
                        else{
                            $class = "light";
                        }
                ?>

             <?php
                                                                                                                                                                                                                                                                                                          
                        }
                    }
                    elseif(isset($GLOBALS['result']->request_remark_details) && count($GLOBALS['result']->request_remark_details) == 1){
                        $result_c_get = $GLOBALS['result']->request_remark_details;
                    ?>

            <?php
                    }
                
                        ?>
        </tbody>
    </table>
</div>
