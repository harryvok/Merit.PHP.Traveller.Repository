<script type="text/javascript">
    $(document).ready(function () {
        $("#popup").fadeIn("fast");
        $("#popup").css("width", "50%");
        $("#popup").css("margin", "110px auto");
        $("#bookingService").html($("#serviceInput").val());
        $("#bookingRequest").html($("#requestInput").val());
        $("#bookingFunction").html($("#functionInput").val());
        var addr = $("#lno").val();
        if ($("#lfno").val() != "" && $("#lfno").val() != null) {
            addr += " /" + $("#lfno").val();
        }
        addr += " " + $("#lstreet").val() + " " + $("#ltype").val() + " " + $("#lsuburb").val() + " " + $("#lpostcode").val();
        $("#location_addr").html(addr);

        $("#stop").click(function () {
            $("#popup").fadeOut("fast");
        });

        $("#placeaAllowance").click(function () {
            $("#process_allowance").val("Yes");
            $("#popup").fadeOut("fast");
        });
    });
</script>
<div class="summaryContainer">
    <h1>Address Booked Services<span  class="closePopup"><img src="images/delete-icon.png" /> Close</span></h1>
    <br /><br /><br /><br />
    <b>Service / Request / Function: </b><span id="bookingService"></span> / <span id="bookingRequest"></span> / <span id="bookingFunction"></span> <br />
    <br /><br />
    <b>Location address: </b><span id="location_addr"></span><br />
    <br /><br />
    <b>Number to Allocate: </b><input type="text" name="alloc_no" id="alloc_no" value="<?php if ($GLOBALS['result']->available_count > 0) echo 1; else echo 0; ?>" disabled="disabled" style="width:30px;"/> <?php echo "( ".$GLOBALS['result']->available_text." )";  ?>
    <br /><br />
    <div>
        <table id="allowance_bookings" title="" cellspacing="0">
            <thead>
                <tr>
                    <th style="text-align:center">Description</th>
                    <th style="text-align:center">Used</th>
                    <th style="text-align:center">Number</th>                    
                </tr>
            </thead>
            <tbody> 
                <?php
                if(isset($GLOBALS['result']->allowance_history->annual_allowance_history) && count($GLOBALS['result']->allowance_history->annual_allowance_history) > 0){
                     foreach($GLOBALS['result']->allowance_history->annual_allowance_history as $allowance_detail){
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
                        <tr class="<?php echo $class; ?>">                                                       
                            <td style="width:75%"><?php echo $allowance_detail->srf_description; ?></td>
                            <td style="text-align:center; width:15%"><?php echo $allowance_detail->allowance_date; ?></td>
                            <td style="text-align:center; width:10%"><?php echo $allowance_detail->number_used; ?></td>                                
                        </tr>
                        <?php
                      }
                 }
                else{
                    ?>
                    <tr class="light"> 
                        <td colspan="3" style="text-align:center">No data found</td>   
                    </tr>
                <?php
                }
                ?>                 
            </tbody>
        </table>
    </div>       
    <div>        
        <br /><br />
        <input type="button" value="    Ok    " id="placeaAllowance" <?php if (count($GLOBALS['result']->allowance_history->annual_allowance_history) == $GLOBALS['result']->annual_allowance_count) echo "disabled='disabled'"; ?> />       
        <input type="button" id="stop" name="stop" value="Cancel"/>
    </div>
</div>

