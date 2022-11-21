import psycopg2 as psy
import serial
import time
from time import sleep
import datetime

con = psy.connect(
    database = 'd8fmabj1shl4a',
    user = 'ybogbpxkirczwo',
    password = 'b46e9c739f274198bbd85fbc6a5441e2706acd0e06f450eb1510d0fd4f0948f7',
    host = 'ec2-54-167-152-185.compute-1.amazonaws.com',
    port = 5432
)
se = serial.Serial('/dev/ttyACMO',115200,timeout = 2) #2sec wait
i = 0
j = 1
k = 0
list=[0,0,0]

for i in range(80): #実験用の為ループ回数を設定
    cur = con.cursor()
    now = datetime.datetime.now()
    ymdx = now.strftime("%Y-%m-%d %X")
    b = 0

    #--in_datetime update----
    sd = se.read()
    dd = sd.decode()
    print(dd)
    if(dd =='1' or dd =='2' or dd=='3'):
        b = int(dd)
        print("dd=",b)

    if(k == 0):
        cur.execute("update proceeds set in_datetime = %s, joutai = 2 where no =1",[ymdx])
        con.commit()
        print("in_a ok")
        time.sleep(1)

        cur.execute("update proceeds set in_datetime = %s, joutai = 2 where no =2",[ymdx])
        con.commit()
        print("in_a ok")
        time.sleep(1)

        cur.execute("update proceeds set in_datetime = %s, joutai = 2 where no =3",[ymdx])
        con.commit()
        print("in_a ok")
        time.sleep(1)
        k += 1
    #------------------------

    #--3days ago kakunin-----
    if(j == 4):
        j = 1
    cur.execute("select in_datetime from proceeds where no = %s",[j])
    in_d = cur.fetchall()
    con.commit()
    ind = in_d[0][0]

    days = (now - ind).days

    if(days >= 3 and list[j-1]==0):
        cur.execute("update proceeds set joutai = 0 where no = %s",[j])
        con.commit()
        list[j-1] = 1
        print("send none")
        time.sleep(1)
    print("rolls :",j)
    j += 1
    #------------------------
    if(b >= 1 and list[b-1]==0):
        cur.execute("update proceeds set out_datetime = %s , joutai = 1 where no = %s",(ymdx,b))
        con.commit()
        cur.execute("insert into warehouse2 (out_datetime, joutai, no) values(%s,%s,%s)",(ymdx,'1',b))
        con.commit()
        print("send ok")
        time.sleep(1)
    #-------------
    
se.close()
cur.close()
con.close()