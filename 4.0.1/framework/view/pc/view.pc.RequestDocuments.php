<?php 
if($GLOBALS['result']['errorConnecting']== false){
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
        });

    });
</script>
<div class="summaryContainer">
    <h1>Documents</h1>
    <div>
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
                    if(isset($GLOBALS['result']['docdets']->document_details) && count($GLOBALS['result']['docdets']->document_details) > 1){
                        $i=-1;
                        foreach($GLOBALS['result']['docdets']->document_details as $document){
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
                                 <td><a href="<?php echo $document->document_url; ?>"><?php echo $document->document_url; ?></a></td>
                            </tr>
                             <?php
                            for($var = 0; $var < count($document->document_metadata->doc_meta_data); $var++){
                                array_push($metaTagArray,$document->document_metadata->doc_meta_data[$var]->meta_tag);
                                array_push($metaDataArray, $document->document_metadata->doc_meta_data[$var]->meta_data);
                                array_push($metaDataDocumentID,  $document->document_id);
                            }
                        }
                    }elseif(isset($GLOBALS['result']['docdets']->document_details) && count($GLOBALS['result']['docdets']->document_details) == 1){
                        $document = $GLOBALS['result']['docdets']->document_details[0];
                    ?>
                <tr class="<?php echo $class; ?>" id="Document<?php echo $i; ?>ParentObject">
                     <td><?php echo $document->document_id; ?></td>
                     <td><?php echo $document->document_desc; ?></td>
                     <td><a href="<?php echo $document->document_url; ?>"><?php echo $document->document_url; ?></a></td>
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
        <br />
        <b>Metadata. (Click on a document to view Metadata)</b>
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
<?php 
}else{
?>
<b>There was an error connecting to the EDMS database. Ensure you have access priveleges</b>
<?php 
}
?>