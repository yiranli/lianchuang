#!/usr/bin/python
# coding = utf-8
# Filename:ls.py
import os

l = raw_input('list:')
list = os.listdir(l)
list.sort()
for i in list: 
 print i
