import os
import sys ,json
from dvbobjects.PSI.SDT import *
from dvbobjects.PSI.PMT import *
from dvbobjects.PSI.PAT import *
from dvbobjects.PSI.NIT import *
from dvbobjects.DVB.Descriptors import *
from dvbobjects.MPEG.Descriptors import *
from dvbobjects.MHP.AIT import *
from dvbobjects.HBBTV.Descriptors import *

#os.system('python /home/Hbb-server/darabi/kill_mux.py')
#os.system("rm /home/Hbb-server/darabi/server_backend/fifo*.ts")
#os.system("mkfifo /home/Hbb-server/darabi/server_backend/fifo22.ts")
#os.system("mkfifo /home/Hbb-server/darabi/server_backend/fifo11.ts")
#os.system("chmod 777  /home/Hbb-server/darabi/server_backend/fifo*.ts")


try:
        parms=json.loads(sys.argv[1]);
except:
        print "errore"
i=sys.argv[2]
#print(net_parms)

total_br=13270356


video_ts=['asrejadid','formool1','amadi_finall','kame-shirin_finall','cartoon_finall','samte_khoda']
video_br=[2133000,1264000,2358000,1815000,1650000,5212000]

video_ts='../opencaster/'+video_ts[2]+'_810.ts'
video_br=video_br[2]

pat_br=int(parms['PAT_bitrate'])
pmt_br=int(parms['PMT_bitrate'])
sdt_br=int(parms["SDT_bitrate"])
nit_br=int(parms['NIT_bitrate'])
ait_br=int(parms["AIT_bitrate"])
nit_pid=int(parms["NIT_pid"])
sdt_pid=int(parms['SDT_pid'])
ait_pid=int(parms['AIT_pid'])
pmt_pid=int(parms['PMT_pid'])
pmt_ver=int(parms["pmt_version"])
video_pid=int(parms["video_pid"])
audio_pid=int(parms["audio_pid"])
audio_stream_type=int(parms["audio_stream_type"])
video_stream_type=int(parms["video_stream_type"])
carousel_br=int(parms["carousel_bitrate"])
Service_ID=int(parms['service_id'])
Service_name=str(parms['service_name'])
Service_provider_name= str(parms["service_provider_name"])
Transport_stream_id = int(parms['transport_stream_id'])
Original_network_id =int( parms["original_net_id"])
Net_name=str(parms['net_name'])
#print Net_name
app_type=int(parms["application_type"])
Net_id=int(parms['net_id'])
appli_name = str(parms["application_name"])
appli_root=str(parms["application_folder_path"])
appli_path = str(parms["application_index_file"])
organisationId=int(parms["organisation_id"])
applicationId =int(parms["application_id"])
app_priority =int(parms["application_priority"])
ACC=[1,2,7,4]
app_ctl_code =ACC[int(parms["application_control_code"])]
carousel_pid = int(parms['carousel_pid'])
dsmcc_association_tag = int(parms['carousel_association_tag'])
carousel_id = int(parms['carousel_id'])
#carousel_id=dsmcc_association_tag
app_vr=int(parms["application_version"])
AV=[0,1,3]
app_visibility=AV[int(parms["visibility"])]
#print('visibility:',app_visibility)
AP=[0,1,2,4]
app_profile=[AP[int(parms["application_profile"])],int(parms["application_profile_maj"]),int(parms["application_profile_min"]),int(parms["application_profile_mic"])]
service_bound=int(parms["service_bound_flag"])
modules_version=parms['module_version']
smart_compress_the_carousel=int(parms['smart_compress_the_carousel'])
streamevent_componenttag=int(parms['component_tag'])
streamevent_pid=int(parms['streamevent_pid'])
C_pad=0
DDB_size=int(parms['DDB_size'])
TPI=[3,1]
Transport_protocol_ID=TPI[int(parms['transport_protocol_id'])]

null_br=total_br-(pat_br+pmt_br+sdt_br+nit_br+ait_br+video_br)
mount_frequency=parms['mount_frequency']
app_usage=int(parms['application_usage'])


path="/home/Hbb-server/darabi/server_backend"
os.chdir(path)

extra_ts=""
#..........................................................................................

new_stream_loop = [
              stream_loop_item(
                                stream_type =video_stream_type , # h.264 video stream type
                                elementary_PID = video_pid,
                                element_info_descriptor_loop = []
                       ),
              stream_loop_item(
                        stream_type = audio_stream_type, # mpeg2 audio stream type
                        elementary_PID = audio_pid,
                        element_info_descriptor_loop = []
                ),

              stream_loop_item(
                        stream_type = 5, # AIT stream type
                        elementary_PID = ait_pid,
                        element_info_descriptor_loop = [
                            application_signalling_descriptor(
                                application_type = app_type, # HbbTV service
                                AIT_version = 1,  # current ait version
                            ),
                        ]
                ),
        ]


if (Transport_protocol_ID==3):
	# Application Informaton Table (ETSI TS 101 812 10.4.6)

	ait = application_information_section(
        application_type = app_type,
        common_descriptor_loop = [
		external_application_authorisation_descriptor(
			application_identifiers = [[organisationId,applicationId]],
			application_priority =[app_priority],
			) 
		],
        application_loop = [
		application_loop_item(
			organisation_id = organisationId,  # this is a demo value, dvb.org should assign an unique value
			application_id = applicationId, 
			application_control_code =app_ctl_code, 
			application_descriptors_loop = [
				transport_protocol_descriptor(
					protocol_id = Transport_protocol_ID, # HTTP transport protocol
					URL_base = appli_root,
					URL_extensions = [],
					transport_protocol_label = Transport_protocol_ID, # HTTP transport protocol
				),  

				application_descriptor(
					application_profile =app_profile[0], #0x0000,
					version_major = app_profile[1], # corresponding to version 1.1.1
					version_minor = app_profile[2],
					version_micro = app_profile[3],
					service_bound_flag =service_bound,  #1, # 1 means the application is expected to die on service change, 0 will wait after the service change to receive all the AITs and check if the same app is signalled or not
					visibility =app_visibility,  #3, # 3 the applications is visible to the user, 1 the application is visible only to other applications
					application_priority = app_priority, # 1 is lowset, it is used when more than 1 applications is executing
					transport_protocol_labels = [3], # If more than one protocol is signalled then each protocol is an alternative delivery mechanism. The ordering indicates 
													 # the broadcaster's view of which transport connection will provide the best user experience (first is best)
				),
				application_name_descriptor(
					application_name = appli_name,
					 ISO_639_language_code = "FRA"
				),
				simple_application_location_descriptor(initial_path_bytes = appli_path),		
                                #application_usage_descriptor(usage_type=app_usage),

			]
		),
		
   	],
        version_number = app_vr,
        section_number = 0,
        last_section_number = 0,
	)

if( Transport_protocol_ID==1):
	new_stream_loop.append(    stream_loop_item(
                                stream_type = 11, # DSMCC stream type
                                elementary_PID = carousel_pid,
                                element_info_descriptor_loop = [
                                # a number of descriptors follow specifying the DSMCC properites
                    association_tag_descriptor(
                                                association_tag = dsmcc_association_tag,  # this association tag identifys the carousel, it is used also while generati$
                                                use = 0,  # some default values follow, don't change then, different values are not supported
                                                selector_lenght = 0, # ...
                                                transaction_id = 0x80000000, # ...
                                                timeout = 0xFFFFFFFF, # ...
                                                private_data = "",
                    ),
                    stream_identifier_descriptor(
                                                component_tag = dsmcc_association_tag, # it is the same as the assocation tag, some decoders will look for the componen$
                    ),
                    carousel_identifier_descriptor(
                        carousel_ID = carousel_id, # carousel id number, it's a different number from association/component tag, but it h$
                        format_ID = 0, # no enhanced boot supported
                        private_data = "",
                    ),
                    data_broadcast_id_descriptor(
                        data_broadcast_ID = 291, # for HbbTv Carousel (http://www.dvbservices.com/identifiers/data_broadcast_id?page=3)
                        ID_selector_bytes = "",
                    ),
                                ],
                        ))
	# Application Informaton Table (ETSI TS 101 812 10.4.6)

	ait = application_information_section(
			application_type = app_type,
			common_descriptor_loop = [
			#	external_application_authorisation_descriptor(
			#		application_identifiers = [[organisationId,applicationId]],
			#		application_priority =[app_priority],
			#	) 
			],
			application_loop = [
				application_loop_item(
				organisation_id = organisationId,  # this is a demo value, dvb.org should assign an unique value
				application_id = applicationId, 
				application_control_code =app_ctl_code, 
				application_descriptors_loop = [
					transport_protocol_descriptor(
			                        protocol_id = Transport_protocol_ID, # the application is broadcasted on a DSMCC
			                        transport_protocol_label = 1, # the application is broadcasted on a DSMCC
			                        remote_connection = 0, # shall be 0 for HbbTV
                        			component_tag = dsmcc_association_tag, # carousel common tag and association tag
					),  
					application_descriptor(
						application_profile =app_profile[0], #0x0000,
						version_major = app_profile[1], # corresponding to version 1.1.1
						version_minor = app_profile[2],
						version_micro = app_profile[3],
						service_bound_flag =service_bound,  #1, # 1 means the application is expected to die on service change, 0 will wait after the service change to receive all the AITs and check if the same app is signalled or not
						visibility =app_visibility,  #3, # 3 the applications is visible to the user, 1 the application is visible only to other applications
						application_priority = app_priority, # 1 is lowset, it is used when more than 1 applications is executing
						transport_protocol_labels = [1], # If more than one protocol is signalled then each protocol is an alternative delivery mechanism. The ordering indicates 
													 # the broadcaster's view of which transport connection will provide the best user experience (first is best)
					),
					application_name_descriptor(
						application_name = appli_name,
						ISO_639_language_code = "FRA"
					),
					simple_application_location_descriptor(initial_path_bytes = appli_path),
					#application_usage_descriptor(usage_type=app_usage),
					]
				),
			],
        version_number = app_vr,
        section_number = 0,
        last_section_number = 0,
		)
 	carfolder="/var/www/html/darabi-hbbtv-server2/Directory_Managment/carousels/"+appli_root
	cmd=" oc-update "+carfolder+" "+hex(dsmcc_association_tag)+" "+ hex(modules_version) +" "+str(carousel_pid)+" "+str(carousel_id)+" "+str(smart_compress_the_carousel)+" 0 0 " +str(DDB_size)+" 0 "+ str(mount_frequency)
	#print(cmd)
#        cmd="oc-update /var/www/html/darabi-hbbtv-server2/Directory_Managment/carousels/global_pi  0xB 0x5 2003 1 0 0 0 4066 0 2"

	os.system(cmd)
	print(appli_root+str(i)+".ts")
	os.system("cp "+ carfolder+".ts temp/"+ appli_root+str(i)+".ts")



if(int(parms['component_tag'])!=0):
	new_stream_loop.append(
		stream_loop_item(
			stream_type = 12, # Stream Event stream type
			elementary_PID = int(parms['streamevent_pid']),
			element_info_descriptor_loop = [
				stream_identifier_descriptor(
					component_tag = int(parms['component_tag']),
				),
			]
		))	





pmt = program_map_section(
                program_number = Service_ID,
                PCR_PID = video_pid, # usualy the same than the video
                hasInteractiveApp=True,
                program_info_descriptor_loop = [],
                stream_loop = new_stream_loop,
	        version_number = pmt_ver, # you need to change the table number every time you edit, so the decoder will compare its version with the new one and update the ta$
        	section_number = 0,
	        last_section_number = 0,
        )




out = open("./temp/pmt.sec", "wb")
out.write(pmt.pack())
out.close
out = open("./temp/pmt.sec", "wb") # python   flush bug
out.close
os.system('sec2ts ' + str(pmt_pid) + ' < ./temp/pmt.sec > ./temp/pmt'+str(i)+'.ts')
print('pmt.ts')

out = open("./temp/ait.sec", "wb")
out.write(ait.pack())
out.close
out = open("./temp/ait.sec", "wb") # python   flush bug
out.close
os.system('sec2ts ' + str(ait_pid) + ' < ./temp/ait.sec > ./temp/ait'+str(i)+'.ts')
print('ait.ts')

#............................................................................................................................


#return json.dumps(new_stream_loop)

#extra_ts=''
#car_br=0;
#if(Transport_protocol_ID==1):
#	extra_ts= ' b:'+str(carousel_br)+' '+carfolder+"01.ts"
#	null_br=null_br-1000000
	
#cmd="tscbrmuxer"+" b:"+str(video_br)+" "+video_ts+" b:"+str(pat_br)+" pat.ts"+" b:"+str(pmt_br)+" pmt.ts"+" b:"+str(sdt_br)+" sdt.ts"+" b:"+str(nit_br)+" nit.ts"+" b:"+str(ait_br)+" ait.ts"+" b:"+str(carousel_br)+ extra_ts+" b:"+str(null_br)+" null.ts > fifo11.ts & "

#print(cmd)
#os.system(cmd)
#cmd="tsstamp fifo11.ts "+str(total_br)+" > fifo22.ts &"
#os.system(cmd)


