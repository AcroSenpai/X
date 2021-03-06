<?php

	namespace X\Sys;

	/**
	*
	*
	*@author Aitor 
	*
	* Session, Crea, guarda, da acceso y borra las variables de session
	*
	*
	**/

	Class Session{

		//iniciamos la variable de session
		static function init(){
			session_start();
			self::set('id',session_id());
		}

		//crea la variable de session
		static function set($key,$value){
			$_SESSION[$key]=$value;
		}

		//recogemos la variable de session
		static function get(){
			if(self::exists($key)){
				return $_SESSION[$key];
			}else{
				return null;
			}
			
		}
		//preguntamos si existe la varible de session
		static function exists($key){
			if(array_key_exists($key, _SESSION)){
				return true;
			}else{
				return false;
			}
		}

		//borrmos la variable de session
		static function del($key){
			if(self::exists($key)){
				unset($_SESSION[$key]);
			}
		}
		
		//destruimos todas las varibales de session
		static function destroy(){
			session_destroy;
		}
	}