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
            var id = $(this).find("td:first-child").html();
            $(".Document" + id + "MetaData").show();
            var desc = $(this).find("td:nth-child(2)").html();
            $("#selectedDocument").val(id);
            $("#selectedDocDesc").html("Selected: <b>" + desc+"</b>");
            $('#linkbutton').removeAttr('disabled');

            //for use in new request customer documents popup
            $("#cust_selectedDocument").val(id);
            $("#cust_selectedDocDesc").html("Selected: <b>" + desc + "</b>");
            $('#cust_linkbutton').removeAttr('disabled');

        });  
    });
</script>
<div class="summaryContainer">
    <br />
    <div style="overflow: auto;max-height: 280px;">
        <table id="requestDocumentTable" class=" sortable" title="" cellspacing="0">
            <thead>
                <tr>
                    <th>Document ID</th>
                    <th>Description</th>
                    <th>URL</th>
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
                                 <td><?php echo $document->document_id; ?></td>
                                 <td><?php echo $document->document_desc; ?></td>
                                 <td><a target="_blank"  href="<?php echo $document->document_url; ?>"><input type="button" value="View"/></a></td>
                            </tr>
                             <?php
                        for($var = 0; $var < count($document->document_metadata->doc_meta_data); $var++){
                            array_push($metaTagArray,$document->document_metadata->doc_meta_data[$var]->meta_tag);
                            array_push($metaDataArray, $document->document_metadata->doc_meta_data[$var]->meta_data);
                            array_push($metaDataDocumentID,  $document->document_id);
                        }
                    }
                }elseif(isset($GLOBALS['result']->doc_dets->document_details) && count($GLOBALS['result']->doc_dets->document_details) == 1){
                    $document = $GLOBALS['result']->doc_dets->document_details;
                             ?>
                <tr class="light_nocur" id="Document<?php echo $i; ?>ParentObject">
                     <td><?php echo $document->document_id; ?></td>
                     <td><?php echo $document->document_desc; ?></td>
                     <td><a target="_blank"  href="<?php echo $document->document_url; ?>"><input type="button" value="view"/></a></td>
                </tr>
                <?php
                    for($var = 0; $var < count($document->document_metadata->doc_meta_data); $var++){
                        array_push($metaTagArray,$document->document_metadata->doc_meta_data[$var]->meta_tag);
                        array_push($metaDataArray, $document->document_metadata->doc_meta_data[$var]->meta_data);
                        array_push($metaDataDocumentID,  $document->document_id);
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
                <tr class="<?php echo $class; ?>Document<?php echo $metaDataDocumentID[$i]; ?>MetaData" id="DocumentMetaData<?php echo $i; ?>ParentObject">
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