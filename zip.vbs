Set objArgs = WScript.Arguments
ZipFile = objArgs(1)

' Create empty ZIP file and open for adding
CreateObject("Scripting.FileSystemObject").CreateTextFile(ZipFile, True).Write "PK" & Chr(5) & Chr(6) & String(18, vbNullChar)
Set zip = CreateObject("Shell.Application").NameSpace(ZipFile)

' Add all files/directories to the .zip file

  zip.CopyHere(objArgs(0))
  WScript.Sleep 7000 'REQUIRED!! (Depending on file/dir size)
