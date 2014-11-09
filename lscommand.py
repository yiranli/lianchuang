#!/usr/bin/python
# coding = utf-8
# Filename:lscommand.py


import os,pwd,grp,time,stat,math,sys
command = raw_input('command:')
l = raw_input('list:')
list = os.listdir(l)
list.sort()
if(command == 'ls -a'):
 for i in list:
  print i

elif(command == 'ls -l'):
 for i in list:
  if(i[0] == '.'):
   pass
  else:
   info = os.stat(i)
   mode = info.st_mode
   if stat.S_ISDIR(mode):
    type = 'd'
   elif stat.S_ISLNK(mode):
    type = 'l'
   elif stat.S_ISREG(mode):
    type = '-'
   elif stat.S_ISBLK(mode):
    type = 'b'
   elif stat.S_ISCHR(mode):
    type = 'c'
   elif stat.S_ISSOCK(mode):
    type = 's'
   elif stat.S_ISFIFO(mode):
    type = 'p'  
 
   m = '---------'
   if mode&stat.S_IRUSR:
    m = 'r'+ m[1:]
   if mode&stat.S_IWUSR:
    m = m[0] + 'w' + m[2:]
   if mode&stat.S_IXUSR:
    m = m[:2] + 'x' + m[3:]
   if mode&stat.S_IRGRP:
    m = m[:3] + 'r' + m[4:]
   if mode&stat.S_IWGRP:
    m = m[:4] + 'w' + m[5:]
   if mode&stat.S_IXGRP:
    m = m[:5] + 'x' + m[6:]
   if mode&stat.S_IROTH:
    m = m[:6] + 'r' + m[7:]
   if mode&stat.S_IWOTH:
    m = m[:7] + 'w' + m[8]
   if mode&stat.S_IXOTH:
    m = m[:8] + 'x'
   u = pwd.getpwuid(info.st_uid)
   g = grp.getgrgid(info.st_uid)
   ctime = time.ctime(info.st_ctime)
   print type+m,info.st_nlink,u[0],g[0],info.st_size,ctime,i

elif(command == 'ls -R'):
 path = os.walk(l)
 for root,dirs,files in path:
  print ''
  print root+':'
  for d in dirs:
   print d
  for f in files:
   print f

elif(command == 'ls'):
 for i in list:
  if(i[0] == '.'):
   pass
  else:
   print i
elif(command == 'ls -i'):
 for i in list:
  if(i[0] == '.'):
   pass
  else:
   print os.stat(i).st_ino,i
#  if type == 'd':
#   all.extend(['\033[1;34;40m',i,'\033[0m'])
#   print all
#  elif m[2] == 'x':
#   all.extend(['\033[1;32;40m',i,'\033[0m'])
#   print all
#  else:
#   all.append(i)
#   print all

