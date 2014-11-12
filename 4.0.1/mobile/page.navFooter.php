<div data-role="footer" data-id="Traveller" data-position="fixed !important">
        <div data-role="navbar" data-iconpos="bottom" >
        <ul>
            <?php if($_SESSION['roleSecurity']->allow_action == "Y") { ?><li><a href="index.php?page=actions&navstate" data-icon="bars">Actions</a></li><?php } ?>
            <?php if($_SESSION['roleSecurity']->allow_request == "Y") { ?><li><a href="index.php?page=requests&navstate" data-icon="bars">Requests</a></li><?php } ?>
           <?php if($_SESSION['roleSecurity']->maint_new_request== "Y") { ?> <li><a href="index.php?page=newRequest&navstate" data-icon="edit">New</a></li><?php } ?>
           <?php if($_SESSION['roleSecurity']->allow_search == "Y") { ?> <li><a href="index.php?page=search&navstate" data-icon="search">Search</a></li><?php } ?>
             <li><a href="process.php?action=logout" data-icon="delete">Logout</a></li>
        </ul>
        </div>
    </div>
</div>