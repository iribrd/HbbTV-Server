import os
import sys ,json
import signal
import subprocess


import mysql.connector

import MySQLdb.cursors 

from dvbobjects.PSI.SDT import * 
from dvbobjects.PSI.PMT import * 
from dvbobjects.PSI.PAT import *
from dvbobjects.PSI.NIT import *

from dvbobjects.DVB.Descriptors import * 
from dvbobjects.MPEG.Descriptors import * 
from dvbobjects.MHP.AIT import *
from dvbobjects.HBBTV.Descriptors import *

#print("")

#os.system('python /home/Hbb-server/darabi/kill_mux.py') 
#os.system("rm /home/Hbb-server/darabi/server_backend/fifo*.ts") 
#os.system("rm /home/Hbb-server/darabi/server_backend/pat.ts")
#os.system("rm /home/Hbb-server/darabi/server_backend/pat.sec")
#os.system("rm /home/Hbb-server/darabi/server_backend/nit.ts")
#os.system("rm /home/Hbb-server/darabi/server_backend/nit.sec")
#os.system("rm /home/Hbb-server/darabi/server_backend/sdt.ts")
#os.system("rm /home/Hbb-server/darabi/server_backend/sdt.sec")
#os.system("rm /home/Hbb-server/darabi/server_backend/pmt*.ts")
#os.system("rm /home/Hbb-server/darabi/server_backend/pmt*.sec")
#os.system("rm /home/Hbb-server/darabi/server_backend/ait*.ts")

#os.system("rm /home/Hbb-server/darabi/server_backend/tempste_*.ts")


#os.system("mkfifo /home/Hbb-server/darabi/server_backend/fifo22.ts") 
#os.system("mkfifo /home/Hbb-server/darabi/server_backend/fifo23.ts")
#os.system("mkfifo /home/Hbb-server/darabi/server_backend/fifo11.ts")
#os.system("chmod 777  /home/Hbb-server/darabi/server_backend/fifo*.ts")

DB = MySQLdb.connect(
	host="localhost",
	user="root",
	password="hbbtv2018",
	database="HbbtvAppDB",
	cursorclass=MySQLdb.cursors.DictCursor
	)

#total_br=13270356
total_br=13000000
carousels_root='/var/www/html/darabi-hbbtv-server2/Directory_Managment/carousels/'
null_br=total_br
cursor=DB.cursor()
sql="SELECT * FROM mux   WHERE state="+'1'
cursor.execute(sql)
mux_records=cursor.fetchall()
i=0
Service_loop=[]
Program_loop=[]
Dvb_service_descriptor_loop=[]
#cmd="rm /home/Hbb-server/darabi/server_backend/new_black*.ts"
#os.system(cmd)

path="/home/Hbb-server/darabi/server_backend"
os.chdir(path)
#os.system('cp null.ts tempste.ts ')
f=open("myfile.txt","w")

mux_cmd="tscbrmuxer"

if(mux_records):
  for mux_record in mux_records:
	print('..................................................................................')
	sql="SELECT * FROM services WHERE id="+str(mux_record['service_setting_ID'])
	#print(sql)
	cursor.execute(sql)
	service_record=cursor.fetchall()
	if (i==0):
		f.write(mux_record['service_name'])
	else:
                f.write('\n'+mux_record['service_name'])


	sql="SELECT * FROM nets WHERE id="+str(service_record[0]['net_setting_ID'])
	cursor.execute(sql)
	net_record=cursor.fetchall()

	#print(net_record[0]['net_ID'])
	#for x in net_record:
	#	print(x)

	sql="SELECT * FROM  pids_bitrates  WHERE id="+str(service_record[0]['pid_br_setting_ID'])
	cursor.execute(sql)
	pid_br_record=cursor.fetchall()

	#for x in pid_br_record:
	 #       print(x)
	sql="SELECT * FROM Apps WHERE id="+str(service_record[0]['app_setting_ID'])
	cursor.execute(sql)
	app_record=cursor.fetchall()

	#for x in app_record:
        #	print(x)
	parms=[]
	parms=net_record[0]
	parms.update(pid_br_record[0])
	parms.update(app_record[0])
	parms.update(service_record[0])
	#parms2=net_record[0]+pid_br_record[0]+app_record[0]+service_record[0]
	

	Dvb_service_descriptor_loop.append(service_descriptor_loop_item(service_ID = parms['service_id'],service_type = 0x1))
	Program_loop.append(program_loop_item( program_number =parms['service_id'],PID = parms['PMT_pid'] ))
	Service_loop.append(service_loop_item(service_ID = parms['service_id'],	EIT_schedule_flag = 0,EIT_present_following_flag = 0, running_status = 4, free_CA_mode = 0, service_descriptor_loop = [	service_descriptor(service_type = 1,service_provider_name = parms['service_provider_name'],service_name = parms['service_name']	),],))




	print("service recorde:.......................................................................")
	print(parms)
	if(parms['component_tag']!=0):
	       	sql="SELECT * FROM streamEvents  WHERE component_tag="+str(parms['component_tag'])
	        cursor.execute(sql)
        	streamevents=cursor.fetchall()
		
                cmd_temp="python /home/Hbb-server/darabi/server_backend/steo.py '"+json.dumps(streamevents)+"' "+str(parms['component_tag'])+" "+carousels_root+parms['application_folder_path']+" " + str(parms['streamevent_pid'])+" " + str(parms['service_id'])
		#print(cmd_temp)
	        os.system(cmd_temp)
		mux_cmd=mux_cmd+" b:"+str(parms['streamevent_bitrate'])+"  /home/Hbb-server/darabi/server_backend/temp/tempste_"+str(parms['service_id'])+"_.ts"

		#cmd_temp= 'mkfifo /home/Hbb-server/darabi/server_backend/tempste_'+str(parms['service_id'])+'_.ts'
		#os.system(cmd_temp)
                #cmd_temp='cp  null.ts /var/www/html/darabi-hbbtv-server2/Directory_Managment/carousels/ste_'+str(parms['service_id'])+'_0.ts' 
                cmd_temp='cp  null.ts /home/Hbb-server/darabi/server_backend/temp/ste_'+str(parms['service_id'])+'_0.ts'

                #print(cmd_temp)
                os.system(cmd_temp)


		cmd_temp='cp  null.ts   /home/Hbb-server/darabi/server_backend/temp/tempste_'+str(parms['service_id'])+'_.ts '
                #print(cmd_temp)
                os.system(cmd_temp)
                os.system("chmod 777  /home/Hbb-server/darabi/server_backend/temp/tempste_"+str(parms['service_id'])+'_.ts ')

                #os.system('cp  ste_'+str(parms['service_id'])+'_1.ts  tempste_'+str(parms['service_id'])+'_.ts ') #for test


		null_br=null_br-parms['streamevent_bitrate']

                event_count=len(streamevents)
                event_prefix='ste_'+str(parms['service_id'])+'_'
                mux_index=mux_record['id']
		sql="UPDATE  mux SET  streamevent_count="+str(event_count)+", streamevent_prefix='"+event_prefix+ "', streamevent_componenttag="+str(parms['component_tag']) +" WHERE  id="+str(mux_index)
		#print(sql)
	        cursor.execute(sql)
		DB.commit()
        if(parms['component_tag']==0):
                mux_index=mux_record['id']
		sql="UPDATE  mux SET  streamevent_count=0, streamevent_prefix='', streamevent_componenttag=0  WHERE   id="+str(mux_index)
                cursor.execute(sql)
                DB.commit()

        if(parms['application_usage']==0):
       		cmd="python /home/Hbb-server/darabi/server_backend/newcore5.py '"+ json.dumps(parms)+"' "+str(i)
        if(parms['application_usage']==1):
                cmd="python /home/Hbb-server/darabi/server_backend/newcore5_teletext.py '"+ json.dumps(parms)+"' "+str(i)
		print("teletext is on !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!")
	#print(cmd)
	os.system(cmd)
	#print(cmd)
        #cmd="python /home/Hbb-server/darabi/server_backend/newcore5.py '"+ json.dumps(parms)+"' "+str(i)
        #print(os.system(cmd))

	#print(Dvb_service_descriptor_loop)
	#print(Program_loop)
	#print(Service_loop)

	
	print('...........................................................')
	cmd="tstool /home/Hbb-server/darabi/server_backend/color_bar_a.ts  -c  257:"+str(parms['audio_pid'])+" -o /home/Hbb-server/darabi/server_backend/temp/color_bar_a"+str(parms['audio_pid'])+".ts > /dev/null"
	print("color_bar_a"+str(parms['audio_pid'])+".ts" )
	os.system(cmd)
	#cmd="tstool /home/Hbb-server/darabi/server_backend/black_sv.ts -c  256:"+str(parms['video_pid'])+" -o /home/Hbb-server/darabi/server_backend/new_blackv"+str(parms['video_pid'])+".ts"
        cmd="tstool /home/Hbb-server/darabi/server_backend/color_bar_v.ts  -c  256:"+str(parms['video_pid'])+" -o /home/Hbb-server/darabi/server_backend/temp/color_bar_v"+str(parms['video_pid'])+".ts > /dev/null"
	print("color_bar_v"+str(parms['video_pid'])+".ts")
	os.system(cmd)
        mux_cmd=mux_cmd+" b:384000  temp/color_bar_a"+str(parms['audio_pid'])+".ts"+" b:997000 temp/color_bar_v"+ str(parms['video_pid'])+".ts"
        null_br=null_br-384000-997000-parms['PMT_bitrate']-parms['AIT_bitrate']
        #null_br=null_br-parms['PMT_bitrate']-parms['AIT_bitrate']
	mux_cmd=mux_cmd+" b:"+str(parms['PMT_bitrate'])+" temp/pmt"+str(i)+".ts"+" b:"+str(parms['AIT_bitrate'])+" temp/ait"+str(i)+".ts" 

	if (parms['transport_protocol_id']==1):
		mux_cmd=mux_cmd+ ' b:'+str(parms['carousel_bitrate'])+' '+'temp/'+parms['application_folder_path']+str(i)+".ts"
		null_br=null_br-parms['carousel_bitrate']
	i=i+1


#.............................NIT...............................................

  nit = network_information_section(
		network_id = parms['net_id'],
	        network_descriptor_loop = [
		    network_descriptor(network_name = parms['net_name'])
            	],
		transport_stream_loop = [
			transport_stream_loop_item(
			transport_stream_id = parms['transport_stream_id'],
			original_network_id = parms['original_net_id'],
			transport_descriptor_loop = [
				service_list_descriptor(
				dvb_service_descriptor_loop = Dvb_service_descriptor_loop
		    ),
		],
	     ),
	  ],
        version_number = 1, # you need to change the table number every time you edit, so the decoder will compare its version with the new one and update the 
        section_number = 0,
        last_section_number = 0,
        )
#print(mux_cmd)

  null_br=null_br-parms['NIT_bitrate']


  out = open("/home/Hbb-server/darabi/server_backend/temp/nit.sec", "wb") 
  out.write(nit.pack()) 
  out.close 
  out = open("/home/Hbb-server/darabi/server_backend/temp/nit.sec", "wb") # python flush bug out.close
  os.system('sec2ts '+str(parms['NIT_pid'])+ ' < /home/Hbb-server/darabi/server_backend/temp/nit.sec > /home/Hbb-server/darabi/server_backend/temp/nit.ts')
  print('nit.ts')
  mux_cmd=mux_cmd+" b:" +str(parms['NIT_bitrate'])+" temp/nit.ts"
#...................................................................................................
#.................................SDT...............................................................
  sdt = service_description_section(
	transport_stream_id = parms['transport_stream_id'],
	original_network_id =  parms['original_net_id'],
        service_loop = Service_loop,
        version_number = 1, # you need to change the table number every time you edit, so the decoder will compare its version with the new one and update the 
        section_number = 0,
        last_section_number = 0,
        )
#print(mux_cmd)

  out = open("./temp/sdt.sec", "wb") 
  out.write(sdt.pack()) 
  out.close 
  out = open("./temp/sdt.sec", "wb") # python flush bug out.close
  os.system('sec2ts '+str(parms['SDT_pid'])+ ' < ./temp/sdt.sec > ./temp/sdt.ts')
  print('sdt.ts')
  mux_cmd=mux_cmd+" b:" +str(parms['SDT_bitrate'])+" temp/sdt.ts"
  null_br=null_br-parms['SDT_bitrate']

#.....................................................................................................

  Program_loop.append(program_loop_item(program_number=0,PID=parms['NIT_pid']))

  pat = program_association_section(
	transport_stream_id = parms['transport_stream_id'],
        program_loop = Program_loop,
        version_number = 1, # you need to change the table number every time you edit, so the decoder will compare its version with the new one and update the 
        section_number = 0,
        last_section_number = 0,
        ) 
#print(mux_cmd) 
  out = open("./temp/pat.sec", "wb") 
  out.write(pat.pack()) 
  out.close 
  out = open("./temp/pat.sec", "wb") # python flush bug out.close
  os.system('sec2ts 0 < ./temp/pat.sec > ./temp/pat.ts')
  null_br=null_br-parms['PAT_bitrate']
  mux_cmd=mux_cmd+" b:" +str(parms['PAT_bitrate'])+" temp/pat.ts"
  print('pat.ts')
if(null_br>0):
   final_mux_cmd=mux_cmd+" b:"+str(null_br)+" null.ts  > fifo11.ts &"
   print("................................................................")
   print(final_mux_cmd)
   ff=open("lastcmd.txt","w")
   ff.write(final_mux_cmd)
   ff.close()
   subprocess1 = subprocess.Popen(['pgrep', '-f','tscbrmuxer'], stdout=subprocess.PIPE)
   lines, error = subprocess1.communicate()
   print(lines)
   if(lines):
        subprocess = subprocess.Popen(['pgrep', '-f','tsstamp'], stdout=subprocess.PIPE)
        l, e = subprocess.communicate()
        if(l):
           os.system(final_mux_cmd)
	else: 
          os.system('python /home/Hbb-server/darabi/server_backend/startup_script1.py')

	for line in lines.splitlines():
		pid = int(line.split(None, 1)[0])
		os.kill(pid,9)
   else:
	os.system('python /home/Hbb-server/darabi/server_backend/startup_script1.py')
   f.write("................   sucessfully")
else:
   f.write("!!!!!!!!!!!!!!!!!! Errore: Bitrate is out of range")

print("-------------------------------------------------------------------------------------------------------------------------------------------------------")
f.close()



#cmd="tstdt fifo11.ts"+" > fifo23.ts &"
#os.system(cmd)
#cmd="timeout 30  tsstamp fifo23.ts "+str(total_br)+" > test.ts" #fifo22.ts &"
#cmd="tsstamp fifo23.ts "+str(total_br)+" > fifo22.ts &"

#os.system(cmd)

#......................................................................








#os.system("./DtPlay  fifo22.ts -r  8000000 -l 0 -i 2 ")

#os.system("bg")
#......................................................................


#os.system("timeout  30s "+mux_cmd+" b:" +str(parms['PAT_bitrate'])+" pat.ts"+" b:"+str(null_br)+" null.ts  > test0.ts ")   # for save output for 2s
#os.system("tstdt test0.ts > test1.ts") #for save test
#os.system("tsstamp test1.ts "+str(total_br)+" > test.ts ")     # for save output






#os.system("tsudpsend fifo22.ts 224.0.1.2 7001 13270356")

##os.system('python /home/Hbb-server/darabi/kill_mux.py') # for save output
##print("output saved")

#.......................................










#...........................................................................................................
