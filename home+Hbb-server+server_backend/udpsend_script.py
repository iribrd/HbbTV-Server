import os
import sys
total_br=13000000
ipaddress="224.0.1.2"
portnum="7001"
path="/home/Hbb-server/darabi/server_backend"
os.chdir(path)
f = open("lastcmd.txt", "r")
cmd=f.readline()
os.system(cmd)
print cmd
cmd="tstdt fifo11.ts"+" > fifo23.ts &"
print cmd
os.system(cmd)
cmd="tsstamp fifo23.ts "+str(total_br)+" > fifo22.ts &"
print cmd
os.system(cmd)
#os.system("./DtPlay  fifo22.ts -r  13000000 -l 0 -i 2 ")
cmd="tsudpsend fifo22.ts "+ipaddress+" "+portnum+" "+str(total_br)
print cmd
os.system(cmd)

