#!/usr/bin/python
#-*- coding = utf-8 -*-
#Filename:ls.py
import os


l = raw_input('list:')
list = os.walk(l)
for root,dirs,files in list:
 print 'directory<'+root+'>:'
 
 for d in dirs:
  print d
 for f in files:
  print f



