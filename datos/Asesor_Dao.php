<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../modelo/Asesor.php'; /*importa el modelo */

class Asesor_Dao
{
    
	private $conexion; /*Crea una variable conexion*/
        
    private function conectar(){
        try{
			$this->conexion = Conexion::abrirConexion(); /*inicializa la variable conexion, llamando el metodo abrirConexion(); de la clase Conexion por medio de una instancia*/
		}
		catch(Exception $e)
		{
			die($e->getMessage()); /*Si la conexion no se establece se cortara el flujo enviando un mensaje con el error*/
		}
    }
    
    
   /*Metodo que obtiene todos los alumnos de la base de datos, retorna una lista de objetos */
	public function obtenerTodos()
	{
		try
		{
            $this->conectar();
            
			$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

			$sentenciaSQL = $this->conexion->prepare("SELECT IDAsesor, Nombre, Apellidos, Email, ClaveAcceso, Telefono, DescripcionPerfil, TemasOfrecidos, Foto
			FROM asesores"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new Asesor();

					$obj->IDAsesor = $fila->IDAsesor;
					$obj->Nombre = 	$fila->Nombre;
					$obj->Apellidos = $fila->Apellidos;
					$obj->Email = $fila->Email;
					$obj->ClaveAcceso = $fila->ClaveAcceso;
					$obj->Telefono = $fila->Telefono;
					$obj->DescripcionPerfil = $fila->DescripcionPerfil;
					$obj->TemasOfrecidos = $fila->TemasOfrecidos;
					$obj->Foto = $fila->Foto;
					
					$lista[] = $obj;
			
			}
            
			return $lista;
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
			return null;
		}
		finally
		{
            Conexion::cerrarConexion();
        }
	}
    
    /*Metodo que obtiene un registro de la base de datos, retorna un objeto */
	public function obtenerUno($IDAsesor)
	{
		try
		{ 
            $this->conectar();
            
			$registro = null; /*Se declara una variable  que almacenará el registro obtenido de la BD*/
            
			$sentenciaSQL = $this->conexion->prepare("SELECT IDAsesor, Nombre, Apellidos, Email, ClaveAcceso, Telefono, DescripcionPerfil, TemasOfrecidos, Foto
			FROM asesores WHERE IDAsesor=?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			$sentenciaSQL->execute([$IDAsesor]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
            $registro = new Asesor;
			$registro->IDAsesor  = $fila->IDAsesor;
			$registro->Nombre = $fila->Nombre;
			$registro->Apellidos = $fila->Apellidos;
			$registro->Email = $fila->Email;
			$registro->ClaveAcceso = $fila->ClaveAcceso;
			$registro->Telefono = $fila->Telefono;
			$registro->DescripcionPerfil = $fila->DescripcionPerfil;
			$registro->TemasOfrecidos = $fila->TemasOfrecidos;
			$registro->Foto = $fila->Foto;
			
			return $registro; //Registro es un Empleado (objeto Empleado)
		}
		catch(Exception $e)
		{
            echo $e->getMessage();
            return null;
		}
		finally
		{
            Conexion::cerrarConexion();
        }
	}
    
    //Elimina el alumno con el id indicado como parámetro
	public function eliminar($IDAsesor)
	{
		try 
		{
			$this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM asesores WHERE IDAsesor = ?");			          
            
			$sentenciaSQL->execute(array($IDAsesor));
            return true;
		}
		catch (Exception $e) 
		{
            return false;
		}
		finally
		{
            Conexion::cerrarConexion();
        }
        
	}

	public function agregar(Asesor $obj)
	{
        $IDAsesor=0;
		try 
		{
            $sql = "INSERT INTO asesores (IDAsesor, Nombre, Apellidos, Email, ClaveAcceso, Telefono, DescripcionPerfil, TemasOfrecidos, Foto)
			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
			
			var_dump($sql);
			$this->conectar();
			
            $this->conexion->prepare($sql)
                 ->execute(
                array(
					$obj->IDAsesor ,
					$obj->Nombre,
					$obj->Apellidos,
					$obj->Email,
					$obj->ClaveAcceso,
					$obj->Telefono,
					$obj->DescripcionPerfil,
					$obj->TemasOfrecidos,
					$obj->Foto	
				));

            $IDAsesor=$this->conexion->lastInsertId();
			var_dump($IDAsesor);
			
			return $IDAsesor;
			
		}
		catch (Exception $e)
		{
			echo $e->getMessage();
			return $IDAsesor;
		}
		finally
		{
            /*
            En caso de que se necesite manejar transacciones, no deberá desconectarse mientras la transacción deba persistir
            */
            Conexion::cerrarConexion();
        }
	}

	public function editar($IDAsesor)
	{
		try 
		{
			$sql = "UPDATE asesores SET Nombre = ?, Apellidos = ?, Email = ?, ClaveAcceso = ?, 
			Telefono = ?, DescripcionPerfil = ?, TemasOfrecidos = ?, Foto = ?
			WHERE IDAsesor = ?";

            $this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare($sql);			          
			$sentenciaSQL->execute(
				array(
					$obj->Nombre,
					$obj->Apellidos,
					$obj->Email,
					$obj->ClaveAcceso,
					$obj->DescripcionPerfil,
					$obj->TemasOfrecidos,
					$obj->Foto
				));

			return true;
			
		}
		catch (Exception $e)
		{
			echo $e->getMessage();
			return false;
		}
		finally
		{
            Conexion::cerrarConexion();
        }
	}
}