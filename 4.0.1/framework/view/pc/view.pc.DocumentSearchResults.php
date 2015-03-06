<?php 
if(isset($GLOBALS['result']->doc_dets->document_details) && count($GLOBALS['result']->doc_dets->document_details) > 0){
?>
<script type="text/javascript">
    $(document).ready(function () {
        //hide all rows at the beginning
        $("#requestDocumentMetadataTable tbody tr").hide();


        //show rows based on user click event
        $("#requestDocumentTable tbody tr ").click(function () {
            $("#requestDocumentMetadataTable tbody tr").hide();

            //document_id or document_uri 
            var key = $(this).find("td:first-child").attr("data-key");

            $(".Document" + String(key) + "MetaData").show();
            var desc = $(this).find("td:nth-child(2)").html();
            $("#selectedDocument").val(key);
            $("#selectedDocDesc").html("Selected: <b>" + desc+"</b>");
            $('#linkbutton').removeAttr('disabled');

            //for use in new request customer documents popup
            $("#cust_selectedDocument").val(key);
            $("#cust_selectedDocDesc").html("Selected: <b>" + desc + "</b>");
            $('#cust_linkbutton').removeAttr('disabled');

        });

        $(".downloadButton").click(function () {
            var document_uri = $(this).attr("data-document_uri");
            DownloadEDMSDocument(document_uri);
        });
    });
</script>
<div class="summaryContainer">
    <br />
    <div style="overflow: auto;max-height: 280px;">
        <table id="requestDocumentTable" class=" sortable" title="" cellspacing="0">
            <thead>
                <tr>
                    
                <?php
                    if (strtoupper ($_SESSION['EDMSName']) == 'TRIM') {?>
                     <th>Record Number</th>
                     <th>Record Type</th>     
                <?php }else{ ?>
                    <th>Document ID</th>  
                <?php } ?>    
                    <th>Description</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php

                
                //store metadata here to be used later on in metadatatable
                $metaDataDocumentID= array();
                $metaTagArray= array();
                $metaDataArray= array();
                
                $number=0;
                if(isset($GLOBALS['result']->doc_dets->document_details) && count($GLOBALS['result']->doc_dets->document_details) > 1){
                    $i=-1;
                    foreach($GLOBALS['result']->doc_dets->document_details as $document){
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
                            <tr class="<?php echo $class; ?>" id="Document<?php echo $i; ?>ParentObject">
                                 <td data-key="<?php if (strtoupper ($_SESSION['EDMSName']) == 'TRIM'){echo $document->document_uri;}else{echo $document->document_id;} ?>"><?php echo $document->document_id; ?></td>
                                 <?php if (strtoupper ($_SESSION['EDMSName']) == 'TRIM') {?>
                                 <td><?php echo $document->document_record_type; ?></td>
                                 <?php } ?>
                                 <td><?php echo $document->document_desc; ?></td>
                                 <td>
                                     <?php if (strtoupper ($_SESSION['EDMSName']) == 'TRIM') {?>
                                        <input type="button" data-document_uri="<?php echo $document->document_uri; ?>" class="downloadButton" value="View"/>
                                     <?php }else{ ?>
                                        <a target="_blank"  href="<?php echo $document->document_url; ?>"><input type="button" value="View"/></a>
                                      <?php } ?>
                                 </td>
                            </tr>
                             <?php
                             
                        $key = (strtoupper ($_SESSION['EDMSName']) == 'TRIM' ? $document->document_uri :  $document->document_id);
                             
                        for($var = 0; $var < count($document->document_metadata->doc_meta_data); $var++){
                            array_push($metaTagArray,$document->document_metadata->doc_meta_data[$var]->meta_tag);
                            array_push($metaDataArray, $document->document_metadata->doc_meta_data[$var]->meta_data);
                            array_push($metaDataDocumentID,  $key);
                        }
                    }
                }elseif(isset($GLOBALS['result']->doc_dets->document_details) && count($GLOBALS['result']->doc_dets->document_details) == 1){
                    $document = $GLOBALS['result']->doc_dets->document_details;
                             ?>
                <tr class="light_nocur" id="Document<?php echo $i; ?>ParentObject">
                     <td data-key="<?php if (strtoupper ($_SESSION['EDMSName']) == 'TRIM'){echo $document->document_uri;}else{echo $document->document_id;} ?>"><?php echo $document->document_id; ?></td>
                     <?php if (strtoupper ($_SESSION['EDMSName']) == 'TRIM') {?>
                     <td><?php echo $document->document_record_type; ?></td>
                     <?php } ?>
                     <td><?php echo $document->document_desc; ?></td>
                     <td>
                        <?php if (strtoupper ($_SESSION['EDMSName']) == 'TRIM') {?>
                            <input type="button" data-document_uri="<?php echo $document->document_uri; ?>"  class="downloadButton" value="View"/>                
                        <?php }else{ ?>
                            <a target="_blank"  href="<?php echo $document->document_url; ?>"><input type="button" value="View"/></a>
                        <?php } ?>
                    </td>
                </tr>
                <?php
                  
                    $key = (strtoupper ($_SESSION['EDMSName']) == 'TRIM' ? $document->document_uri :  $document->document_id);
                    for($var = 0; $var < count($document->document_metadata->doc_meta_data); $var++){
                        array_push($metaTagArray,$document->document_metadata->doc_meta_data[$var]->meta_tag);
                        array_push($metaDataArray, $document->document_metadata->doc_meta_data[$var]->meta_data);
                        array_push($metaDataDocumentID,  $key);
                    }
                }?>
            </tbody>
        </table>
        </div>
        <b>Metadata. (Click on a document to view Metadata)</b>
        <div style="overflow: auto;max-height: 160px;">
        <table id="requestDocumentMetadataTable" class=" sortable" title="" cellspacing="0">
            <thead>
                <tr>
                    <th>Meta Tag</th>
                    <th>Meta Data</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php
                if(count($metaDataDocumentID)> 0){
                    $i=-1;
                    foreach($metaDataDocumentID as $metadata){
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
                <tr class="<?php echo $class; ?> Document<?php echo $metaDataDocumentID[$i]; ?>MetaData" id="DocumentMetaData<?php echo $i; ?>ParentObject">
                    <td><?php echo $metaTagArray[$i]; ?></td>
                    <td><?php echo $metaDataArray[$i]; ?></td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        
    </div>
</div>
<?php }else{ ?>
No Results found
<?php }?>