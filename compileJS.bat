@echo off
set /p vers= Enter Version:

DEL %vers%\inc\js\pcCompiled.js
DEL %vers%\inc\js\pcLOCompiled.js
DEL %vers%\inc\js\mobileCompiled.js

echo. 2>%vers%\inc\js\pcCompiled.js
copy /A %vers%\inc\js\pcCompiled.js+%vers%\inc\js\libraries\jquery-1.9.1.js %vers%\inc\js\pcCompiled.js
echo. >>%vers%\inc\js\pcCompiled.js
copy /A %vers%\inc\js\pcCompiled.js+%vers%\inc\js\libraries\jquery.validate.min.js %vers%\inc\js\pcCompiled.js
echo. >>%vers%\inc\js\pcCompiled.js
copy /A %vers%\inc\js\pcCompiled.js+%vers%\inc\js\libraries\sorttable.js %vers%\inc\js\pcCompiled.js
echo. >>%vers%\inc\js\pcCompiled.js
copy /A %vers%\inc\js\pcCompiled.js+%vers%\inc\js\libraries\jquery-ui-1.10.3.custom.js %vers%\inc\js\pcCompiled.js
echo. >>%vers%\inc\js\pcCompiled.js
copy /A %vers%\inc\js\pcCompiled.js+%vers%\inc\js\libraries\jquery.dataTables.js %vers%\inc\js\pcCompiled.js
echo. >>%vers%\inc\js\pcCompiled.js
copy /A %vers%\inc\js\pcCompiled.js+%vers%\inc\js\libraries\modernizr.js %vers%\inc\js\pcCompiled.js
echo. >>%vers%\inc\js\pcCompiled.js
copy /A %vers%\inc\js\pcCompiled.js+%vers%\inc\js\ajax.js %vers%\inc\js\pcCompiled.js
echo. >>%vers%\inc\js\pcCompiled.js
copy /A %vers%\inc\js\pcCompiled.js+%vers%\inc\js\global.js %vers%\inc\js\pcCompiled.js
echo. >>%vers%\inc\js\pcCompiled.js
copy /A %vers%\inc\js\pcCompiled.js+%vers%\inc\js\pc.js %vers%\inc\js\pcCompiled.js
echo. >>%vers%\inc\js\pcCompiled.js

echo. 2>%vers%\inc\js\pcLOCompiled.js
copy /A %vers%\inc\js\pcLOCompiled.js+%vers%\inc\js\libraries\jquery-1.9.1.js %vers%\inc\js\pcLOCompiled.js
echo. >>%vers%\inc\js\pcLOCompiled.js
copy /A %vers%\inc\js\pcLOCompiled.js+%vers%\inc\js\libraries\jquery.validate.min.js %vers%\inc\js\pcLOCompiled.js
echo. >>%vers%\inc\js\pcLOCompiled.js

echo. 2>%vers%\inc\js\mobileCompiled.js
copy /A %vers%\inc\js\mobileCompiled.js+%vers%\inc\js\libraries\jquery-1.9.1.js %vers%\inc\js\mobileCompiled.js
echo. >>%vers%\inc\js\mobileCompiled.js
copy /A %vers%\inc\js\mobileCompiled.js+%vers%\inc\js\libraries\jquery-mobile.js %vers%\inc\js\mobileCompiled.js
echo. >>%vers%\inc\js\mobileCompiled.js
copy /A %vers%\inc\js\mobileCompiled.js+%vers%\inc\js\libraries\jquery-ui-1.10.3.custom.js %vers%\inc\js\mobileCompiled.js
echo. >>%vers%\inc\js\mobileCompiled.js
copy /A %vers%\inc\js\mobileCompiled.js+%vers%\inc\js\libraries\jquery.validate.min.js %vers%\inc\js\mobileCompiled.js
echo. >>%vers%\inc\js\mobileCompiled.js
copy /A %vers%\inc\js\mobileCompiled.js+%vers%\inc\js\libraries\jquery.ui.map.min.js %vers%\inc\js\mobileCompiled.js
echo. >>%vers%\inc\js\mobileCompiled.js
copy /A %vers%\inc\js\mobileCompiled.js+%vers%\inc\js\libraries\jquery-ui-map.extensions.js %vers%\inc\js\mobileCompiled.js
echo. >>%vers%\inc\js\mobileCompiled.js
copy /A %vers%\inc\js\mobileCompiled.js+%vers%\inc\js\libraries\fastclick.js %vers%\inc\js\mobileCompiled.js
echo. >>%vers%\inc\js\mobileCompiled.js
copy /A %vers%\inc\js\mobileCompiled.js+%vers%\inc\js\ajax.js %vers%\inc\js\mobileCompiled.js
echo. >>%vers%\inc\js\mobileCompiled.js
copy /A %vers%\inc\js\mobileCompiled.js+%vers%\inc\js\global.js %vers%\inc\js\mobileCompiled.js
echo. >>%vers%\inc\js\mobileCompiled.js
copy /A %vers%\inc\js\mobileCompiled.js+%vers%\inc\js\mobile.js %vers%\inc\js\mobileCompiled.js
echo. >>%vers%\inc\js\mobileCompiled.js

pause 10