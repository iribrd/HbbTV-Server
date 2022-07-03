import os
import sys
path="/home/Hbb-server/darabi/server_backend"
os.chdir(path)
f = open("lastcmd.txt", "r")
cmd=f.readline()
#print cmd
os.system(cmd)
cmd="tstdt fifo11.ts"+" > fifo23.ts &"
os.system(cmd)
cmd="tsstamp fifo23.ts "+str(total_br)+" > fifo22.ts &"

os.system(cmd)
os.system("./DtPlay  fifo22.ts -r  8000000 -l 0 -i 2 ")


