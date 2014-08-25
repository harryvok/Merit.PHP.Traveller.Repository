@echo off
set /p vers= Enter Version:

DEL %vers%\css\pc\pcCompiled.css
DEL %vers%\css\mobile\mobileCompiled.css


echo. 2>%vers%\css\pc\pcCompiled.css
copy /A %vers%\css\pc\pcCompiled.css+%vers%\css\pc\*.css %vers%\css\pc\pcCompiled.css
echo. >>%vers%\css\pc\pcCompiled.css
copy /A %vers%\css\pc\pcCompiled.css+%vers%\css\libraries\jquery-ui.css %vers%\css\pc\pcCompiled.css

echo. 2>%vers%\css\mobile\mobileCompiled.css
copy /A %vers%\css\mobile\mobileCompiled.css+%vers%\css\libraries\jquery-ui.css %vers%\css\mobile\mobileCompiled.css
echo. >>%vers%\css\mobile\mobileCompiled.css
copy /A %vers%\css\mobile\mobileCompiled.css+%vers%\css\libraries\jquery-mobile-min.css %vers%\css\mobile\mobileCompiled.css
echo. >>%vers%\css\mobile\mobileCompiled.css
copy /A %vers%\css\mobile\mobileCompiled.css+%vers%\css\mobile\*.css %vers%\css\mobile\mobileCompiled.css
echo. >>%vers%\css\mobile\mobileCompiled.css
copy /A %vers%\css\mobile\mobileCompiled.css+%vers%\css\libraries\jquery-mobile.css %vers%\css\mobile\mobileCompiled.css
echo. >>%vers%\css\mobile\mobileCompiled.css

pause 10