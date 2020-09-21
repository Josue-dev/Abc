<?php
	const SERVER ="192.168.0.29";
	const DB="seguridad";
	const USER="rescobar";
	const PASS="rescobar123";

	const SGBD="mysql:host=".SERVER.";dbname=".DB;

	const METHOD="AES-256-CBC";
	const SECRET_IV='4232020';//Contiene un numero unico cualquiera
	const SECRET_KEY='YYYEEESSS@2020';//esto se puede cambiar antes de que allan registro en la DB