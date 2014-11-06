#!/usr/bin/python
# coding = utf-8
# Filename:ls-i.py
import os
l = raw_input('list:')
list = os.listdir(l)
list.sort()
for i in list: 
 if(i[0] == '.'):
  pass
 else:
  print i

