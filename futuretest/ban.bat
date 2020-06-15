set TIMESTAMP=%DATE:~10,4%%DATE:~4,2%%DATE:~7,2%

REM Export all databases into file C:\xampp\mysql\bin\databases.[year][month][day].sql
"C:\xampp\mysql\bin\mysqldump.exe" ban  --result-file="C:\xampp\mysql\bin\databases.%TIMESTAMP%.sql" --user=root --password=

rem REM Change working directory to the location of the DB dump file.
rem C:
rem CD \xampp\mysql\bin

rem REM Compress DB dump file into CAB file (use "EXPAND file.cab" to decompress).
rem MAKECAB "databases.%TIMESTAMP%.sql" "databases.%TIMESTAMP%.sql.cab"

rem REM Delete uncompressed DB dump file.
rem DEL /q /f "databases.%TIMESTAMP%.sql"
rem GRANT ALL on billing.table TO root@192.168.0.115 IDENTIFIED BY .billing,table
"C:\xampp\mysql\bin\mysql.exe" --host=sql146.main-hosting.eu. --user="u462049373_check" --password="jOcsfvOH9OCG" --database="u462049373_check" < "C:\xampp\mysql\bin\databases.%TIMESTAMP%.sql"