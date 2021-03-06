<?php 
if($GLOBALS['result']['errorConnecting']== false){
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#newDocument").change(function () {
            if ($("#newDocument").val() != "") {
                $("#selectedDocument").val("_newDocument_");
            } else {
                $("#selectedDocument").val("");
            }
        });
        $(".downloadButton").click(function () {
            var document_uri = $(this).attr("data-document_uri");
            DownloadEDMSDocument(document_uri);
        });
        $(".View").click(function () {
            var link = $(this).attr("data-link");
            window.open(link, '_blank');
        });

    });
</script>
<?php if(strtoupper($_SESSION['EDMSName']) != "DATAWORKS"){ ?>
<a  href="#" class="toggleLinkDocForm" data-role="button">Link Document</a>
<?php } ?>
<form method="post" enctype="multipart/form-data" id="linkdocument" action="process.php" hidden>
    <script>
        $(document).ready(function () {
            $("#linkdocument").keypress(function () {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    $(".documentSearchButton").trigger('click');
                }
            });
            $('form').submit(function () {
                $("#submitButton").prop('disabled', 'disabled').button('disable');
            });
        });
    </script>
    <label>Search</label>
    <input class="text" name='keyword' id="searchterm"  placeholder="Search...">
    <?php 
    if (strtoupper ($_SESSION['EDMSName']) == 'TRIM') {?>
        <label for="search_type1"><b>Author (surname,given)</b></label><input type="radio" id="search_type1" name="Search_type" checked value="CORRESPONDENT">
        <label for="search_type2"><b>Title Word</b></label><input type="radio" id="search_type2" name="Search_type" value="DOCNAME">
        <label for="search_type3"><b>Record Number</b></label><input type="radio" id="search_type3" name="Search_type" value="DOCID">
        <label for="search_type4"><b>Company</b></label><input type="radio" id="search_type4" name="Search_type" value="COMPANY">
    <?php 
    }else if(strtoupper ($_SESSION['EDMSName']) == 'OBJECTIVE'){?>
        <label for="search_type1"><b>Name ID</b></label><input type="radio" id="search_type1" name="Search_type" checked value="CORRESPONDENT">
        <label for="search_type2"><b>Address ID</b></label><input type="radio" id="search_type2" name="Search_type" value="DOCNAME">
        <label for="search_type3"><b>Request ID</b></label><input type="radio" id="search_type3" name="Search_type" value="DOCID">
    <?php 
    }else { //INFOXPERT?>
        <label for="search_type1"><b>Correspondent (surname,given)</b></label><input type="radio" id="search_type1" name="Search_type" checked value="CORRESPONDENT">
        <label for="search_type2"><b>Document Name/Description</b></label><input type="radio" id="search_type2" name="Search_type" value="DOCNAME">
        <label for="search_type3"><b>Document ID</b></label><input type="radio" id="search_type3" name="Search_type" value="DOCID">
        <label for="search_type4"><b>Company</b></label><input type="radio" id="search_type4" name="Search_type" value="COMPANY">
        <label for="search_type5"><b>Full text</b></label><input type="radio" id="search_type5" name="Search_type" value="KEYWORD">

    <?php 
    }
    ?>
    <a data-role="button" class="button left documentSearchButton" href="#">Search...</a>
    <!--<input  class="button left documentSearchButton" type='button' value='Search...' />-->
    <div id="searchResults"></div>
    <?php if(strtoupper($_SESSION['EDMSName']) == "TRIM" || strtoupper($_SESSION['EDMSName']) == "INFOXPERT" || strtoupper($_SESSION['EDMSName']) == "OBJECTIVE"){?> 
    <hr />
    <label>New File</label>
    <input type="file" id="newDocument" name="newDocument" />
    <input id="submitButton" class="button left" type='submit' value='Submit' />
    <?php } ?>

    <input type="hidden" name="selectedDocument" id="selectedDocument" />
    <input type="hidden" name="action" value="RequestLinkDocument" />
    
</form>

<br />
<h4>Documents <span class="ui-li-count ui-btn-up-c ui-btn-corner-all"><?php echo count($GLOBALS['result']['docdets']->document_details) ?></span></h4>
<ul class="no-ellipses" data-role="listview" data-filter="true" data-filter-placeholder="Search Linked Documents..." data-inset="true">
 <?php

    if(isset($GLOBALS['result']['docdets']->document_details) && count($GLOBALS['result']['docdets']->document_details) > 1){
        $i=-1;
        foreach($GLOBALS['result']['docdets']->document_details as $document){
            $i++;
 ?>
       <li id="Document<?php echo $i; ?>ParentObject">
           <a data-icon="modify" href="#" class="edit" id="Document<?php echo $i; ?>">
               <?php if(strtoupper($_SESSION['EDMSName']) == "TRIM"){?>
               <p><b>Record Number:</b> <?php echo $document->document_id; ?></p> 
               <?php }else{?>
               <p><b>Document ID:</b> <?php echo $document->document_id; ?></p>
               <?php }?>
               <p><b>Description:</b> <?php echo $document->document_desc; ?></p>
           </a>
      </li>
      <li id="Document<?php echo $i; ?>Edit" style="display:none;min-height:60px;">
            <p>
             <?php if(strtoupper($_SESSION['EDMSName']) == "TRIM"){?>
                 <a class="downloadButton DocumentOptionButton" href="#" data-document_uri="<?php echo $document->document_uri; ?>"  data-role="button" > View</a>
             <?php }else{?>
                <a class="View DocumentOptionButton" target="_blank"  href="#" data-link="<?php echo $document->document_url; ?>"  data-role="button" > View</a>
             <?php }?>

             <a class="Metadata DocumentOptionButton" href="#" data-rownum="<?php echo $i; ?>" data-role="button" > Metadata</a>
             <a class="Unlink DocumentOptionButton" href="#" data-docid="<?php if (strtoupper ($_SESSION['EDMSName']) == 'TRIM'){echo $document->document_uri;}else{echo $document->document_id;} ?>" data-reqid="<?php echo $_GET["id"] ?>"  data-role="button" > Unlink</a>
             <a class="closeEdit" href="#" id="Document<?php echo $i; ?>Close">Close</a> 
            </p>
            <br /><br /><br /><br />
            <div id="Document<?php echo $i; ?>MetaData" hidden >
                  <?php if(strtoupper($_SESSION['EDMSName']) == "TRIM"){?>
                    <?php for($var = 0; $var < count($document->document_metadata->doc_meta_data); $var++){ ?>
                        <?php if($document->document_metadata->doc_meta_data[$var]->meta_tag == "Author" ||
                                  $document->document_metadata->doc_meta_data[$var]->meta_tag == "Date Created" ||
                                  $document->document_metadata->doc_meta_data[$var]->meta_tag == "Date Registered" ||
                                  $document->document_metadata->doc_meta_data[$var]->meta_tag == "Container" ||
                                  $document->document_metadata->doc_meta_data[$var]->meta_tag == "Assignee" ||
                                  $document->document_metadata->doc_meta_data[$var]->meta_tag == "Edit Status" ||
                                  $document->document_metadata->doc_meta_data[$var]->meta_tag == "Addressee"){
                        ?>
                            <span><?php echo $document->document_metadata->doc_meta_data[$var]->meta_tag ?></span><br /> <span style="font-weight:normal"><?php if($document->document_metadata->doc_meta_data[$var]->meta_data !="") {echo $document->document_metadata->doc_meta_data[$var]->meta_data;}else{echo "-";} ?></span><br /><br />
                        <?php }?>  
                    <?php } ?>
                 <?php }else{?>  

                     <?php for($var = 0; $var < count($document->document_metadata->doc_meta_data); $var++){ ?>
                        <?php if($document->document_metadata->doc_meta_data[$var]->meta_tag == "Name" ||
                                  $document->document_metadata->doc_meta_data[$var]->meta_tag == "CreationDate" ||
                                  $document->document_metadata->doc_meta_data[$var]->meta_tag == "ModificationDate" ||
                                  $document->document_metadata->doc_meta_data[$var]->meta_tag == "CheckoutBy" ||
                                  $document->document_metadata->doc_meta_data[$var]->meta_tag == "RegisterDate" ||
                                  $document->document_metadata->doc_meta_data[$var]->meta_tag == "RegisteredBy" ||
                                  $document->document_metadata->doc_meta_data[$var]->meta_tag == "Author" ||
                                  $document->document_metadata->doc_meta_data[$var]->meta_tag == "FolderId" ||
                                  strpos($document->document_metadata->doc_meta_data[$var]->meta_tag,"IX_CORRESPONDENT") !== false ||
                                  strpos($document->document_metadata->doc_meta_data[$var]->meta_tag,"IX_INTEGRATION") !== false){
                        ?>
                            <span><?php echo $document->document_metadata->doc_meta_data[$var]->meta_tag ?></span><br /> <span style="font-weight:normal"><?php if($document->document_metadata->doc_meta_data[$var]->meta_data !="") {echo $document->document_metadata->doc_meta_data[$var]->meta_data;}else{echo "-";} ?></span><br /><br />
                        <?php }?>  
                    <?php } ?>
                <?php }?>  
            </div>
              
      </li>
      
      
 <?php 
        }
    }elseif(isset($GLOBALS['result']['docdets']->document_details) && count($GLOBALS['result']['docdets']->document_details) == 1){
        $document = $GLOBALS['result']['docdets']->document_details;
 ?>

    <li id="Document0ParentObject">
           <a data-icon="modify" href="#" class="edit" id="Document0">
              <?php if(strtoupper($_SESSION['EDMSName']) == "TRIM"){?>
               <p><b>Record Number:</b> <?php echo $document->document_id; ?></p> 
               <?php }else{?>
               <p><b>Document ID:</b> <?php echo $document->document_id; ?></p>
               <?php }?>
              <p><b>Description:</b> <?php echo $document->document_desc; ?></p>
           </a>
      </li>
      <li id="Document0Edit" style="display:none;min-width:60px;">
            <p>
            <?php if(strtoupper($_SESSION['EDMSName']) == "TRIM"){?>
             <a class="downloadButton DocumentOptionButton" href="#" data-document_uri="<?php echo $document->document_uri; ?>"  data-role="button" > View</a>
             <?php }else{?>
             <a class="View DocumentOptionButton" target="_blank"  href="#" data-link="<?php echo $document->document_url; ?>"  data-role="button" > View</a>
             <?php }?>
             <a class="Metadata DocumentOptionButton" href="#" data-rownum="0" data-role="button" > Metadata</a>
             <a class="Unlink DocumentOptionButton" href="#" data-docid="<?php if (strtoupper ($_SESSION['EDMSName']) == 'TRIM'){echo $document->document_uri;}else{echo $document->document_id;} ?>" data-reqid="<?php echo $_GET["id"] ?>"  data-role="button" > Unlink</a>
             <br /><br /><br /><br />
             <a class="closeEdit" href="#" id="Document0Close">Close</a> 
            </p>
            <div id="Document0MetaData" hidden >
                  <?php for($var = 0; $var < count($document->document_metadata->doc_meta_data); $var++){ ?>
                    <?php if($document->document_metadata->doc_meta_data[$var]->meta_tag == "Name" ||
                              $document->document_metadata->doc_meta_data[$var]->meta_tag == "CreationDate" ||
                              $document->document_metadata->doc_meta_data[$var]->meta_tag == "ModificationDate" ||
                              $document->document_metadata->doc_meta_data[$var]->meta_tag == "CheckoutBy" ||
                              $document->document_metadata->doc_meta_data[$var]->meta_tag == "RegisterDate" ||
                              $document->document_metadata->doc_meta_data[$var]->meta_tag == "RegisteredBy" ||
                              $document->document_metadata->doc_meta_data[$var]->meta_tag == "Author" ||
                              $document->document_metadata->doc_meta_data[$var]->meta_tag == "FolderId" ||
                              strpos($document->document_metadata->doc_meta_data[$var]->meta_tag,"IX_CORRESPONDENT") !== false ||
                              strpos($document->document_metadata->doc_meta_data[$var]->meta_tag,"IX_INTEGRATION") !== false){
                    ?>
                        <span><?php echo $document->document_metadata->doc_meta_data[$var]->meta_tag ?></span><br /> <span style="font-weight:normal"><?php if($document->document_metadata->doc_meta_data[$var]->meta_data !="") {echo $document->document_metadata->doc_meta_data[$var]->meta_data;}else{echo "-";} ?></span><br /><br />
                    <?php }?>  
                <?php } ?>
            </div>
              
      </li>


<?php } ?>
</ul>

<?php 
}else{
?>
<b>There was an error connecting to the EDMS database. Ensure you have access priveleges</b>
<?php 
}
?>