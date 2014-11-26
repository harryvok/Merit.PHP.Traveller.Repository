<?php 
if($GLOBALS['result']['errorConnecting']== false){
?>
<a  href="#" class="toggleLinkDocForm" data-role="button">Link Document</a>
<form method="post" enctype="multipart/form-data" id="linkdocument" action="process.php" hidden>
    <label>Search</label>
    <input class="text" name='keyword' id="searchterm"  placeholder="Search...">

    <label for="search_type1"><b>Correspondent (surname,given)</b></label><input type="radio" id="search_type1" name="Search_type" checked value="CORRESPONDENT">
    <label for="search_type2"><b>Document Name/Description</b></label><input type="radio" id="search_type2" name="Search_type" value="DOCNAME">
    <label for="search_type3"><b>Document ID</b></label><input type="radio" id="search_type3" name="Search_type" value="DOCID">
    <label for="search_type4"><b>Company</b></label><input type="radio" id="search_type4" name="Search_type" value="COMPANY">
    <label for="search_type5"><b>Full text</b></label><input type="radio" id="search_type5" name="Search_type" value="KEYWORD">
    <a data-role="button" class="documentSearchButton" href="#">Search...</a>
    
    <div id="searchResults"></div>
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
              <p><b>Document ID:</b> <?php echo $document->document_id; ?></p>
              <p><b>Description:</b> <?php echo $document->document_desc; ?></p>
           </a>
      </li>
      <li id="Document<?php echo $i; ?>Edit" style="display:none">
            <p>
             <a class="View" href="<?php echo $document->document_url; ?>"  data-role="button" > View</a>
             <a class="Metadata" href="#" data-rownum="<?php echo $i; ?>" data-role="button" > Metadata</a>
             <a class="Unlink" href="#" data-docid="<?php echo $document->document_id; ?>" data-reqid="<?php echo $_GET["id"] ?>"  data-role="button" > Unlink</a>
             <a class="closeEdit" href="#" id="Document<?php echo $i; ?>Close">Close</a> 
            </p>
            <div id="Document<?php echo $i; ?>MetaData" hidden >
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
      
      
 <?php 
        }
    }elseif(isset($GLOBALS['result']['docdets']->document_details) && count($GLOBALS['result']['docdets']->document_details) == 1){
        $document = $GLOBALS['result']['docdets']->document_details;
 ?>

    <li id="Document0ParentObject">
           <a data-icon="modify" href="#" class="edit" id="Document0">
              <p><b>Document ID:</b> <?php echo $document->document_id; ?></p>
              <p><b>Description:</b> <?php echo $document->document_desc; ?></p>
           </a>
      </li>
      <li id="Document0Edit" style="display:none">
            <p>
             <a class="View" href="<?php echo $document->document_url; ?>"  data-role="button" > View</a>
             <a class="Metadata" href="#" data-rownum="0" data-role="button" > Metadata</a>
             <a class="Unlink" href="#" data-docid="<?php echo $document->document_id; ?>" data-reqid="<?php echo $_GET["id"] ?>"  data-role="button" > Unlink</a>
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