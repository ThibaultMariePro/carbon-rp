## Variables
BYellow = \033[1;93m
GREEN = \033[0;32m
BGreen = \033[1;92m
NC = \033[0m

DC = docker compose
DCYML = docker-compose-dev.yml
EXEC = docker exec
CRPE = carbonRP_Env

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
	echo "Usage: make <action>"
	awk '/^[a-zA-Z\-\_0-9]+:/ { \
		separator = match(lastLine, /^## --/); \
		if (separator) { \
			helpCommand = substr($$1, 0, index($$1, ":")-1); \
			printf "\t${BYellow}= %s =${NC}\n", helpCommand; \
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
	$(DC) -f $(DCYML) up -d
.PHONY: up

## up all containers & logging in this terminal
live:
	$(DC) -f $(DCYML) up
.PHONY: live

## down all containers
down:
	$(DC) -f $(DCYML) down
.PHONY: down

## restart all containers
downup:
	make down
	make up
.PHONY: downup

## open a bash terminal in carbonRP_symfony_core container
sfbash:
	$(EXEC) -it carbonRP_symfony_core bash
.PHONY: sfbash

## open a bash terminal in carbonRP_mariadb container
mariabash:
	$(EXEC) -it carbonRP_mariadb bash
.PHONY: mariabash

## git pull that repo yo
pull:
	git pull
.PHONY: pull