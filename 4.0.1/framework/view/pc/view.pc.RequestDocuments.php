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
            var key = $(this).find("td:first-child").attr("data-key");
            $(".Document" + key + "MetaData").show();
        });

        $(".unlinkbutton").click(function () {
            var buttonID = $(this).attr("id");
            var documentID = buttonID.replace(/unlink/gi, '');
            unlinkDocument(documentID);
        });

        $(".downloadButton").click(function () {
            var document_uri = $(this).attr("data-document_uri");
            DownloadEDMSDocument(document_uri);
        });
        
    });
</script>
<div class="summaryContainer">
    <h1>Documents</h1>
    <div>
        <input type="button"  class="openDocumentPopup" id="Documents" value="Link Document"/>
        
        <table id="requestDocumentTable" class=" sortable" title="" cellspacing="0">
            <thead>
                <tr>
                    <?php
                    if (strtoupper ($_SESSION['EDMSName']) == 'TRIM') {?>
                     <th>Record Number</th>     
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
                                <td data-key="<?php if (strtoupper ($_SESSION['EDMSName']) == 'TRIM'){echo $document->document_uri;}else{echo $document->document_id;} ?>"><?php echo $document->document_id; ?></td>
                                 <td><?php echo $document->document_desc; ?></td>
                                  <td><?php if (strtoupper ($_SESSION['EDMSName']) == 'TRIM') {?>
                                        <input type="button" data-document_uri="<?php echo $document->document_uri; ?>" class="downloadButton" value="View"/>
                                     <?php }else{ ?>
                                        <a target="_blank"  href="<?php echo $document->document_url; ?>"><input type="button" value="View"/></a>
                                      <?php } ?>
                                     &nbsp<input type="button" class="unlinkbutton" id="unlink<?php echo $document->document_uri; ?>" value="Unlink"/></td>
                            </tr>
                             <?php
                            $key = (strtoupper ($_SESSION['EDMSName']) == 'TRIM' ? $document->document_uri :  $document->document_id);
                             
                            for($var = 0; $var < count($document->document_metadata->doc_meta_data); $var++){
                                array_push($metaTagArray,$document->document_metadata->doc_meta_data[$var]->meta_tag);
                                array_push($metaDataArray, $document->document_metadata->doc_meta_data[$var]->meta_data);
                                array_push($metaDataDocumentID,  $key);
                            }
                        }
                    }elseif(isset($GLOBALS['result']['docdets']->document_details) && count($GLOBALS['result']['docdets']->document_details) == 1){
                        $document = $GLOBALS['result']['docdets']->document_details;
                    ?>
                <tr class="light_nocur" id="Document<?php echo $i; ?>ParentObject">
                     <td data-key="<?php if (strtoupper ($_SESSION['EDMSName']) == 'TRIM'){echo $document->document_uri;}else{echo $document->document_id;} ?>"><?php echo $document->document_id; ?></td>
                     <td><?php echo $document->document_desc; ?></td>
                      <td><?php if (strtoupper ($_SESSION['EDMSName']) == 'TRIM') {?>
                                        <input type="button" data-document_uri="<?php echo $document->document_uri; ?>" class="downloadButton" value="View"/>
                                     <?php }else{ ?>
                                        <a target="_blank"  href="<?php echo $document->document_url; ?>"><input type="button" value="View"/></a>
                                      <?php } ?>
                                     &nbsp<input type="button" class="unlinkbutton" id="unlink<?php echo $document->document_uri; ?>" value="Unlink"/></td>
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
<div class="popupDetail" id="DocumentsPopup">
        <script type="text/javascript">
            $(document).ready(function () {
                //hide search button if no value
                $('#searchDocument').attr('disabled', 'disabled');
                $('#linkbutton').attr('disabled', 'disabled');
                $('#searchterm').keyup(function () {
                    if ($(this).val() != '') {
                        $('#searchDocument').removeAttr('disabled');
                    } else {
                        $('#searchDocument').attr('disabled', 'disabled');
                    }
                });
                $("#searchDocument").click(function () {
                    searchDocument();
                });
                $("#newDocument").change(function () {
                    if ($("#newDocument").val() != "") {
                        $("#selectedDocDesc").html("Selected: <b>" + $("#newDocument").val().split('\\').pop() + "</b>");
                        $('#linkbutton').removeAttr('disabled');
                        $("#selectedDocument").val("_newDocument_");
                    } else {
                        $("#selectedDocDesc").html("Selected: <b>" + "</b>");
                        $("#selectedDocument").val("");
                    }
                });
            });
        </script>
      <h1>Link Document <span class="closePopup"><img src="images/delete-icon.png" /> Close</span></h1>
      <a title="Link Document"></a>
     <?php 
        $CustomerName = "";
        $DocumentName = "";
        $DocumentID = "";
        $Company = "";
        $FullText = "";
            if (strtoupper ($_SESSION['EDMSName']) == 'TRIM') {
                $CustomerName = "Author (surname,given)";
                $DocumentName = "Title Word";
                $DocumentID = "Record Number";
                $Company = "Company"; 
            } else { 
                $CustomerName = "Correspondent (surname,given)";
                $DocumentName = "Document Name/Description";
                $DocumentID = "Document ID";
                $Company = "Company"; 
                $FullText = "Full text";
            }
        ?>
      <form method="post" enctype="multipart/form-data" id="linkdocument" action="process.php">
       <input type="radio" id="search_type1" name="Search_type" checked value="CORRESPONDENT"><label for="search_type1"><b><?php echo $CustomerName;?></b></label>&nbsp
        <input type="radio" id="search_type2" name="Search_type" value="DOCNAME"><label for="search_type2"><b><?php echo $DocumentName;?></b></label>&nbsp
        <input type="radio" id="search_type3" name="Search_type" value="DOCID"><label for="search_type3"><b><?php echo $DocumentID;?></b></label>&nbsp
        <input type="radio" id="search_type4" name="Search_type" value="COMPANY"><label for="search_type4"><b><?php echo $Company;?></b></label>&nbsp
        <?php if(strtoupper($_SESSION['EDMSName']) != "TRIM"){?> 
            <input type="radio" id="search_type5" name="Search_type" value="KEYWORD"><label for="search_type5"><b><?php echo $FullText;?></b></label>&nbsp
        <?php } ?>
        <input type="button" id="searchDocument" value="Search"/>
        <?php if(strtoupper($_SESSION['EDMSName']) == "TRIM"){?> 
            <input type="file" id="newDocument" name="newDocument" value="" style="width:200px;padding-bottom:23px;float:right;"/>
        <?php } ?>
        <div class="column r55"><input type="text" id="searchterm" placeholder="Search...."/></div>
        <div class="summaryContainer">
            <input type="hidden" name="selectedDocument" id="selectedDocument"/>
            <div id="searchResults">

            </div>
            <input type="submit" id="linkbutton" value="Link Document"/>
            <span id="selectedDocDesc">Selected Doc: </span>
        </div>
          <input type="hidden" name="action" value="RequestLinkDocument" />
      </form>
</div>
<?php 
}else{
?>
<b>There was an error connecting to the EDMS database. Ensure you have access priveleges</b>
<?php 
}
?>