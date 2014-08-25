<span class="graytitle">History of actual changes</span>
<div id="ChangesShow">
    <ul class="pageitem">
        <li class="button">
            <input type="button" value="Show" class="openSection" id="Changes" />
        </li>
    </ul>
    </div>
<div id="ChangesSection" style="display:none;">

    <ul class="pageitem">
       <?php
        if(isset($GLOBALS['result']->request_remark_details)  && count($GLOBALS['result']->request_remark_details) > 1){
            foreach($GLOBALS['result']->request_remark_details as $result_c_ar){
                if($result_c_ar->sub_type == "Change"){
                    ?>
                    <li class="textbox">
                        <?php echo $result_c_ar->note_datetime; ?> - <?php echo base64_decode($result_c_ar->comment); ?>
                    </li>
                    <?php
                }
            }
        }
        elseif(isset($GLOBALS['result']->request_remark_details)  && count($GLOBALS['result']->request_remark_details) == 1){
            if($GLOBALS['result']->request_remark_details->sub_type == "Change"){
            ?>
                <tr class="dark" title="">
                    <td><?php echo $GLOBALS['result']->request_remark_details->note_datetime; ?> - <?php echo base64_decode($GLOBALS['result']->request_remark_details->comment); ?></td>
                <?php
            }
        }
    ?>
    <li class="button">
            <input type="button" value="Hide" class="closeSection" id="Changes" />
        </li>
    </ul>
    </div>