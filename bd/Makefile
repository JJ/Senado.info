DBNAME= sena2
TABLE= persona
#PREFIX = -h mercurio

all: db table 

db:
	echo 'create database $(DBNAME)' | mysql 

table:
	for i in $(TABLE); do ( echo ">>>>>Creating $$i"; mysql   < $$i\.sql $(DBNAME)); done

clean:
	echo 'drop database $(DBNAME)' | mysql 
