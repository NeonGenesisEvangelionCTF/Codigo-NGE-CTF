@echo off
set MYSQLDUMP_PATH=C:\xampp\mysql\bin\mysqldump.exe
set USER=root
set DATABASE=nge_ctf
set BACKUP_PATH=C:\backup\nge_ctf.sql


"%MYSQLDUMP_PATH%" -u %USER% %DATABASE% > "%BACKUP_PATH%"