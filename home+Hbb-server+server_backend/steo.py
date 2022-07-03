import os
import sys ,json
from dvbobjects.DSMCC.BIOP.Tap import * 
from dvbobjects.DSMCC.STEO import * 
from dvbobjects.utils import * 


from dvbobjects.DSMCC.STE import *


try:
        streamevents=tuple(json.loads(sys.argv[1]));
except:
        print "errore"

ste_pid=sys.argv[4]
service_id=sys.argv[5]

carousel_folder=sys.argv[3]
events_name=[]
events_id=[]
events_count=0


for x in streamevents:
     events_name.append(str(x['event_name']))
     events_id.append(x['event_id'])
     events_count=events_count+1



tap = str_event_use_tap() 
tap.set(
        id = 0,
	assocTag = int(sys.argv[2]), # association tag defined into PMT for the Stream Event
	) 
taps = Taps (
        taps_count = 1,
	tap_loop = [ tap,],
    ) 

event_names = Event_names (
        eventnames_count = events_count,
        event_name_loop = events_name, # name of the events
    ) 
event_ids = Event_ids (
        eventids_count = events_count,
        event_id_loop = events_id, # id of the events
    ) 

os.system("rm -r "+carousel_folder+"/test.event")
os.system("mkdir "+carousel_folder+"/test.event")
os.system("chmod -R 777  "+carousel_folder+"/test.event")

#os.system("mkdir "+carousel_folder+"/test.event")
out = open(carousel_folder+"/test.event/"+".tap", "wb") 
out.write(taps.pack()) 
out.close 
out = open(carousel_folder+"/test.event/"+".eid", "wb") 
out.write(event_ids.pack()) 
out.close 
out = open(carousel_folder+"/test.event/"+".ename", "wb") 
out.write(event_names.pack())
out.close
print("Stream event objects is created...tap,.eid,.ename.......................................................................................")


i=1

#os.system('rm '+ '/var/www/html/darabi-hbbtv-server2/Directory_Managment/carousels/ste_'+str(service_id)+'_*.ts')
os.system('rm '+ '/home/Hbb-server/darabi/server_backend/temp/ste_'+str(service_id)+'_*.ts')

for y in streamevents:
	ste = stream_event_section(
	        event_id = y['event_id'],
        	stream_event_descriptor_loop = [
	            stream_event_do_it_now_descriptor(
		        event_id = y['event_id'],
			private_data = str(y['event_data']),
	    		),
			],
	        version_number = i,
        	section_number = 0,
	        last_section_number = 0,
		) 
	#out = open("/var/www/html/darabi-hbbtv-server2/Directory_Managment/carousels/ste.sec", "wb") 
        out = open("/home/Hbb-server/darabi/server_backend/temp/ste.sec", "wb")

	out.write(ste.pack()) 
	out.close 
	#out = open("/var/www/html/darabi-hbbtv-server2/Directory_Managment/carousels/ste.sec", "wb") # python flush bug out.close
	#os.system('sec2ts ' + str(ste_pid) + ' < /var/www/html/darabi-hbbtv-server2/Directory_Managment/carousels/ste.sec >'+ '/var/www/html/darabi-hbbtv-server2/Directory_Managment/carousels/ste_'+str(service_id)+'_'+str(i)+'.ts')
        out = open("/home/Hbb-server/darabi/server_backend/temp/ste.sec", "wb") # python flush bug out.close
        os.system('sec2ts ' + str(ste_pid) + ' < /home/Hbb-server/darabi/server_backend/temp/ste.sec >'+ '/home/Hbb-server/darabi/server_backend/temp/ste_'+str(service_id)+'_'+str(i)+'.ts')
        print("Event ste_"+str(service_id)+'_'+str(i)+".ts is created..............................................................................")
	i=i+1

