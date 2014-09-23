@echo off
set /p vers= Enter Version:
cls
IF NOT EXIST C:\Temp\CRM\%vers% GOTO NOWINDIR
rmdir /s /q "C:\Temp\CRM\%vers%"
:NOWINDIR

mkdir C:\Temp\CRM\%vers%

XCOPY C:\projects\Merit2013\Merit.PHP.Traveller\Merit.PHP.Traveller.Repository\%vers% C:\Temp\CRM\%vers% /E 

rmdir /s /q "C:\Temp\CRM\%vers%\attachments"
rmdir /s /q "C:\Temp\CRM\%vers%\Properties"
DEL C:\Temp\CRM\%vers%\%vers%.phpproj"
DEL C:\Temp\CRM\%vers%\%vers%.phpproj.user"
DEL C:\Temp\CRM\%vers%\framework\settings.php

COPY C:\projects\Merit2013\Merit.PHP.Traveller\Merit.PHP.Traveller.Repository\default.php C:\Temp\CRM\%vers%\framework\settings.php

echo ---
echo Zipping up Standalone. Please wait...
echo ---
CScript  zip.vbs  "C:\Temp\CRM\%vers%\" "P:\Devt\Merit Traveller\V3\TRAVELLER-v%vers%-STANDALONE.zip"

DEL C:\Temp\CRM\%vers%\framework\settings.php

echo ---
echo Zipping up Update. Please wait...
echo ---
CScript  zip.vbs  "C:\Temp\CRM\%vers%\" "P:\Devt\Merit Traveller\V3\TRAVELLER-v%vers%-UPDATE.zip"

rmdir /s /q "C:\Temp\CRM"

%SystemRoot%\explorer.exe \\MERIT-DOMAINSVR\Pbase\Devt\Merit Traveller\V3