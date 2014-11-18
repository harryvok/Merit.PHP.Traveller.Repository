<?php
include("../../framework/controller.php");
$rand = rand(0, 100000000);
try{
	if(!is_dir("../../attachments/")){
		mkdir("../../attachments/");
	}
	if(copy($_POST['path'], "../../attachments/".$rand.basename($_POST['path']))){
		?>
        <script type="text/javascript">
            /*setTimeout(function () {
                var startY = 0;
                var startX = 0;
                var b = document.body;
                b.addEventListener('touchstart', function (event) {
                    parent.window.scrollTo(0, 1);
                    startY = event.targetTouches[0].pageY;
                    startX = event.targetTouches[0].pageX;
                });
                b.addEventListener('touchmove', function (event) {
                    event.preventDefault();
                    var posy = event.targetTouches[0].pageY;
                    var h = parent.document.getElementById("scroller");
                    var sty = h.scrollTop;

                    var posx = event.targetTouches[0].pageX;
                    var stx = h.scrollLeft;
                    h.scrollTop = sty - (posy - startY);
                    h.scrollLeft = stx - (posx - startX);
                    startY = posy;
                    startX = posx;
                });
            }, 1000);*/
        </script>
        <div style="font-size:11px; text-align:center; padding:10px;"><a target="_blank" href="<?php echo WEBSITE."attachments/".$rand.basename($_POST['path']); ?>">View Full (Closes app)</a></div>
        <div id="scroller" style="width:100%; display: block; height:400px; overflow: auto; -webkit-overflow-scrolling:touch;">
		    <iframe width="0" height="0" src="<?php echo WEBSITE."attachments/".$rand.basename($_POST['path']); ?>"></iframe>
        </div>
		<?php
	}
	else{
		?>
        Failed to load.
        <?php	
	}
}
catch(Exception $e){
	echo $e -> getMessage();
}
?>