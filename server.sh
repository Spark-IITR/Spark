#!/bin/bash

while(true);
	do
	php -S localhost:4001 |& tee serverlog.log

done
