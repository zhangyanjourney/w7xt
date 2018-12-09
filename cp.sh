#!/bin/bash
src_dir="/www/wwwroot/we7"
exclude="attachment"
dest_dir="./"
for file in `ls $src_dir`
do
	if [ $file"x" == $exclude"x" ]
	then
		continue
	fi 
	cp -r ${src_dir}/${file} ${dest_dir}
done
