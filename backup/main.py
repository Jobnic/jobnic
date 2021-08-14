import datetime
import time
import os

now = datetime.datetime.now()

ndate = now.strftime("%X")
ntime = now.strftime("%x")

name = f"{ndate}-{ntime}"

while True:
    os.system(f"mysqldump jobnic > bcps/backup.sql")
    
    time.sleep(600)