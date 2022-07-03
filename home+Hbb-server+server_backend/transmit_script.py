import os
import sys,json
import signal
import subprocess

total_br=13000000
ipaddress=sys.argv[3]
portnum=sys.argv[4]
rf=sys.argv[1]
udp=sys.argv[2]


path="/home/Hbb-server/darabi/server_backend"
os.chdir(path)
#f = open("lastcmd.txt", "r")
#cmd=f.readline()
#os.system(cmd)
#print cmd
#cmd="tstdt fifo11.ts"+" > fifo23.ts &"
#print cmd
#os.system(cmd)
#cmd="tsstamp fifo23.ts "+str(total_br)+" > fifo22.ts &"
#print cmd
#os.system(cmd)
ff=open("lastcmd_transmition.txt","w")
ff.write("python /home/Hbb-server/darabi/server_backend/transmit_script.py "+rf+" "+udp+" "+ipaddress+" "+portnum)
ff.close()

if(rf=='1'):
   subprocess1 = subprocess.Popen(['pgrep', '-f','./DtPlay'], stdout=subprocess.PIPE)
   lines, error = subprocess1.communicate()
   print(lines)
   if(lines):
	print("DtPlay is running")
   else:
   	os.system("screen -dms DtPlay ./DtPlay  fifo22.ts -r "+str(total_br)+" -l 0 -i 2 ")
if(udp=='1'):
   subprocess2 = subprocess.Popen(['pgrep', '-f','tsudpsend'], stdout=subprocess.PIPE)
   lines, error = subprocess2.communicate()
   print(lines)
   if(lines):
	print("tsudpsend is running")
   else:
	cmd="screen -dms udp " +"tsudpsend fifo22.ts "+ipaddress+" "+portnum+" "+str(total_br)
	os.system(cmd)

if(rf=='0'):
   subprocess1 = subprocess.Popen(['pgrep', '-f','./DtPlay'], stdout=subprocess.PIPE)
   lines, error = subprocess1.communicate()
   print(lines)
   if(lines):
     for line in lines.splitlines():
         pid = int(line.split(None, 1)[0])
         os.kill(pid,9)

if(udp=='0'):
   subprocess2 = subprocess.Popen(['pgrep', '-f','tsudpsend'], stdout=subprocess.PIPE)
   lines, error = subprocess2.communicate()
   print(lines)
   if(lines):
        for line in lines.splitlines():
             pid = int(line.split(None, 1)[0])
             os.kill(pid,9)

