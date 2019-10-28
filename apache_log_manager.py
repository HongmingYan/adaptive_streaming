#!/usr/bin/env python
# -*- coding: utf-8 -*-
#
#  apache_log_parser.py
#  
#  
#  

import argparse
import time
import os


def mkdate(datestr):
    """ """
    #return time.strptime(datestr, '%H-%M-%S')
    #return time.strptime(datestr, '%Y-%m-%d-%H-%M-%S')
    return time.strptime(datestr, '%d-%H-%M-%S')


def main(args):
    parser = argparse.ArgumentParser()
    #parser.add_argument('-start_time', '--start_time', default=None, type=mkdate)
    #parser.add_argument('-end_time', '--end_time', default=None, type=mkdate)
    parser.add_argument('-clear_log', '--clear_log', action='store_true')
    parser.add_argument("-name", '--name', required=True, type=str)
    args = parser.parse_args()
    
    '''
    if args.clear_log and (args.start_time or args.end_time):
        print("invalid parameters:", args)
        return 1
    
    print(args.start_time, args.end_time)
    if(args.start_time and args.end_time and
       args.start_time > args.end_time):
            print("invalid time duration parameters:", args.start_time, args.end_time)
            return 1
    '''
    #el
    if not os.path.isdir('log_files'):
        print("log_files directory does not exist (bash install.sh (-clean))")
        return 1
    if args.clear_log:
        print("CLEARING Apache Log")
        exit()
        os.system("bash clear_apache_log.sh")
    else:
        #print("Not clearing log")
        #exit
        # TODO: make this work for OS X and Linux
        #Linux
        os.system("cp /var/log/apache2/access.log ./log_files/" + args.name)
    
    
    return 0

if __name__ == '__main__':
    import sys
    sys.exit(main(sys.argv))
