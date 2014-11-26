<?php 
if(isset($GLOBALS['result']->doc_dets->document_details) && count($GLOBALS['result']->doc_dets->document_details) > 0){
?>
<script type="text/javascript">
    $(".edit").on(eventName, function () {
        var self = this;
        var id = $(this).attr("id");

        $("#" + id + "Label").slideUp("fast");
        $("#" + id + "Edit").slideDown("fast");

        $("#" + id + "Close").on(eventName, function () {
            $("input:focus").blur().delay(350);
            $("#" + id + "Edit").slideUp();
            $("#" + id + "Label").slideDown("fast");
            $("#" + id + "TextVal").val($("#" + id + "Label").html());
        });
        $("#" + id + "Submit").on(eventName, function () {
            var action = $(this).attr("data-action");
            var dataExtra = $("#" + id + "TextVal").data();
            delete dataExtra.mobileTextinput;
            $("input:focus").blur().delay(350);
            $("#" + id + "Edit").slideUp("fast");
            var OldText = $("#" + id + "Label").html();
            $("#" + id + "Label").html($("#" + id + "TextVal").val());
            $("#" + id + "Label").slideDown("fast");

            $.ajax({
                url: 'inc/ajax/ajax.modify' + action + '.php',
                type: 'post',
                dataType: "json",
                data: { id: id, commentText: $("#" + id + "TextVal").val(), extra: dataExtra },
                success: function (data) {
                    if (data.status == false) {
                        alert("Error modifying. Please contact Merit or try again later.");
                        $("#" + id + "Label").html(OldText);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("Error modifying. Please contact Merit or try again later.");
                    $("#" + id + "Label").html(OldText);
                }
            });

        });
    });

    $(".Metadata").on(eventName, function () {
        var rownum = $(this).attr("data-rownum");
        $("#SearchDocument" + rownum + "MetaData").toggle();
    });
    $(".closeEdit").on(eventName, function () {
        var id = $(this).attr("id");
        $("#" + id + "Edit").toggle();
    });
    $(".Link").on(eventName, function () {
        var docid = $(this).attr("data-docid");
        $("#selectedDocument").val(docid);
        
       // if view request/action documents. else new request
        if ($("#linkdocument").length > 0) {
            Load();
            $("#linkdocument").submit();
        } else {
            var selectedDocument = $("#selectedDocument").val();
            var currentdocuments = $("#documentsToLink").val();
            if (currentdocuments != "") {
                if (currentdocuments.indexOf(selectedDocument) >= 0) {
                    alert("You have already selected that document");
                } else {
                    if (confirm("Click OK to link this document when request is saved")) {
                        $("#documentsToLink").val(currentdocuments + "-" + selectedDocument);
                    }
                }
            } else {
                if (confirm("Click OK to link this document when request is saved")) {
                    $("#documentsToLink").val(selectedDocument);
                }
            }
        }
    });
</script>


<ul class="no-ellipses" data-role="listview" data-filter="true" data-filter-placeholder="Search Documents..." data-inset="true">
 <?php

    if(isset($GLOBALS['result']->doc_dets->document_details) && count($GLOBALS['result']->doc_dets->document_details) > 1){
        $i=-1;
        foreach($GLOBALS['result']->doc_dets->document_details as $document){
            $i++;
 ?>
       <li id="SearchDocument<?php echo $i; ?>ParentObject">
           <a data-icon="modify" href="#" class="edit" id="SearchDocument<?php echo $i; ?>">
              <p><b>Document ID:</b> <?php echo $document->document_id; ?></p>
              <p><b>Description:</b> <?php echo $document->document_desc; ?></p>
           </a>
      </li>
      <li id="SearchDocument<?php echo $i; ?>Edit" style="display:none">
            <p>
             <a class="View" target="_blank" href="<?php echo $document->document_url; ?>"  data-role="button" > View</a>
             <a class="Metadata" href="#" data-rownum="<?php echo $i; ?>" data-role="button" > Metadata</a>
             <a class="Link" href="#" data-docid="<?php echo $document->document_id; ?>" data-reqid="<?php echo $_GET["id"] ?>"  data-role="button" > Link</a>
             <a class="closeEdit" href="#" id="SearchDocument<?php echo $i; ?>Close">Close</a> 
            </p>
            <div id="SearchDocument<?php echo $i; ?>MetaData" hidden >
                
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
    }elseif(isset($GLOBALS['result']->doc_dets->document_details) && count($GLOBALS['result']->doc_dets->document_details) == 1){
        $document = $GLOBALS['result']->doc_dets->document_details;
 ?>

    <li id="SearchDocument0ParentObject">
           <a data-icon="modify" href="#" class="edit" id="SearchDocument0">
              <p><b>Document ID:</b> <?php echo $document->document_id; ?></p>
              <p><b>Description:</b> <?php echo $document->document_desc; ?></p>
           </a>
      </li>
      <li id="SearchDocument0Edit" style="display:none">
            <p>
             <a class="View" target="_blank" href="<?php echo $document->document_url; ?>"  data-role="button" > View</a>
             <a class="Metadata" href="#" data-rownum="0" data-role="button" > Metadata</a>
             <a class="Link" href="#" data-docid="<?php echo $document->document_id; ?>" data-reqid="<?php echo $_GET["id"] ?>"  data-role="button" > Link</a>
             <a class="closeEdit" href="#" id="SearchDocument0Close">Close</a> 
            </p>
            <div id="SearchDocument0MetaData" hidden >
                
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


<?php }else{ ?>
No Results found
<?php }?>