#!/bin/bash

INFOMSG='\033[0;36m'
ERRORMSG='\033[0;31m'
COMMAND='\033[0;105m'
EXECUTED="\e[3;95m"

NC='\033[0m' # No Color
base=`basename ${PWD}`
crpf="carbonRP_Env"
echo -e ${INFOMSG}Execute me from /carbonRP_Env, a\'ight ?${NC}
echo -e ${INFOMSG}here is ${base}${NC}

if [[ "$base" == "$mtf" ]];then
    echo -e ${INFOMSG}This script will install everything QoL${NC}
    sudo apt-get update
    echo -e ${EXECUTED}"Executed:"${COMMAND}"sudo apt-get update"${NC}
    sudo apt install -y make
    echo -e ${EXECUTED}"Executed:"${COMMAND}"apt install -y make"${NC}
    echo -e ${INFOMSG}Make is here with us${NC}
    sudo apt-get install -y cowsay
    echo -e ${EXECUTED}"Executed:"${COMMAND}"apt-get install -y cowsay"${NC}
    echo -e ${INFOMSG}There is no cowlevel${NC}
    sudo cp ./QoL/MakefileToMoveUp ../Makefile
    echo -e ${EXECUTED}"Executed:"${COMMAND}"sudo cp ./QoL/MakefileToMoveUp ../Makefile"${NC}
    echo -e ${INFOMSG}What is that portal I see ?${NC}
    echo -e ${INFOMSG}Are there any special cows in here ?${NC}
    ls ./QoL/cows/
    sudo cp ./QoL/cows/* ~/../../usr/share/cowsay/cows/
    echo -e ${EXECUTED}"Executed:"${COMMAND}"sudo cp ./QoL/cows/* ~/../../usr/share/cowsay/cows/"${NC}
    make -C ../ cowfreeman
    echo -e ${EXECUTED}"Executed:"${COMMAND}"make -C ../../ cowfreeman"${NC}
    echo -e ${INFOMSG}Well done master !${NC}
    exit 0
else
    echo -e ${ERRORMSG}HEY YO execute me from /carbonRP_Env, a\'ight !${NC}
    exit 1
fi
