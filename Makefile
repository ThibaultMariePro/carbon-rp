## Variables
BYellow = \033[1;93m
GREEN = \033[0;32m
BGreen = \033[1;92m
NC = \033[0m

DC = docker compose
EXEC = docker exec
CRPE = carbon-rp_env/

.DEFAULT_GOAL := help
.SILENT :

# Commands with arguments
SUPPORTED_COMMANDS := install,clone
SUPPORTS_MAKE_ARGS := $(findstring $(firstword $(MAKECMDGOALS)), $(SUPPORTED_COMMANDS))
ifneq "$(SUPPORTS_MAKE_ARGS)" ""
  COMMAND_ARGS := $(wordlist 2,$(words $(MAKECMDGOALS)),$(MAKECMDGOALS))
  $(eval $(COMMAND_ARGS):;@:)
endif

## Display this help dialog
help:
	echo "This Makefile help you using your local development environment."
	echo "It triggers Makefile commands located in carbon-rp_env/"
	echo "-----------------------------------------------------"
	echo "To work properly you'll need cowsay and custom cowfiles"
	echo "like freeman.cow, jesus.cow, lahey.cow, and patrick.cow."
	echo "Usage: make <action>"
	echo "-----------------------------------------------------"
	awk '/^[a-zA-Z\-\_0-9]+:/ { \
		separator = match(lastLine, /^## --/); \
		if (separator) { \
			helpCommand = substr($$1, 0, index($$1, ":")-1); \
			printf "\t${BYellow 	}= %s =${NC}\n", helpCommand; \
		} \
		helpMessage = match(lastLine, /^## (.*)/); \
		if (helpMessage) { \
			helpCommand = substr($$1, 0, index($$1, ":")); \
			helpMessage = substr(lastLine, RSTART + 3, RLENGTH); \
			if(helpMessage!="--") { \
				printf "\t${GREEN}%-20s${NC} %s\n", helpCommand, helpMessage; \
			} \
		} \
	} \
	{ lastLine = $$0 }' $(MAKEFILE_LIST)
.PHONY: help

## up all containers
up:
	make -C $(CRPE) up
	cowsay -f moss I put it with the rest of the containers.
.PHONY: up

## up all containers & logging in this terminal
live:
	cowsay -f meeseeks2 I have to fulfill my purpose so I can go away. Existence is pain!
	make -C $(CRPE) live
	cowsay -f meeseeks2  Ooh, nice! \(Stops existing\)
.PHONY: live

## down all containers
down:
	make -C $(CRPE) down
	cowsay -f patrick No, this is containers down.
.PHONY: down

## restart all containers
downup:
	make down
	make up
.PHONY: downup

## open a bash terminal in carbonRP_symfony_core container
sfbash:
	make -C $(CRPE) sfbash
.PHONY: sfbash

## open a bash terminal in carbonRP_mariaDB container
mariabash:
	make -C $(CRPE) mariabash
.PHONY: mariabash

## test your inner Freeman
cowfreeman:
	cowsay -f freeman Vous savez, moi je ne crois pas qu’il y ait de bonne ou de mauvaise situation. Moi, si je devais résumer ma vie aujourd’hui avec vous, je dirais que c’est d’abord des rencontres. Des gens qui m’ont tendu la main, peut-être à un moment où je ne pouvais pas, où j’étais seul chez moi. Et c’est assez curieux de se dire que les hasards, les rencontres forgent une destinée… Parce que quand on a le goût de la chose, quand on a le goût de la chose bien faite, le beau geste, parfois on ne trouve pas l’interlocuteur en face je dirais, le miroir qui vous aide à avancer. Alors ça n’est pas mon cas, comme je disais là, puisque moi au contraire, j’ai pu : et je dis merci à la vie, je lui dis merci, je chante la vie, je danse la vie… je ne suis qu’amour ! Et finalement, quand beaucoup de gens aujourd’hui me disent « Mais comment fais-tu pour avoir cette humanité ? », et bien je leur réponds très simplement, je leur dis que c’est ce goût de l’amour ce goût donc qui m’a poussé aujourd’hui à entreprendre une construction mécanique, mais demain qui sait ? Peut-être simplement à me mettre au service de la communauté, à faire le don, le don de soi… 
.PHONY: cowfreeman

## test your faith
cowjesus:
	cowsay -f jesus Vous allez finir par vous aimer les uns les autres, bordel de merde?
.PHONY: cowjesus

## test your patrick
cowpatrick:
	cowsay -f patrick La mayonnaise est-elle un instrument ?
.PHONY: cowpatrick

## test your ability to become a Concepteur Developper D'Application
cowlahey:
	cowsay -f lahey I am the liquor.
.PHONY: cowlahey