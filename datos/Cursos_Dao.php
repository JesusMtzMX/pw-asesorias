<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../modelo/Cursos.php'; /*importa el modelo */

class Cursos_Dao
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

			$sentenciaSQL = $this->conexion->prepare("SELECT IDCurso, Nombre, Descripcion, AreaEstudio, Temario, Precio, IDAsesor
			FROM cursos"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new Cursos();

				$obj->IDCurso= $fila->IDCurso;
				$obj->Nombre = 	$fila->Nombre;
				$obj->Descripcion = $fila->Descripcion;
				$obj->AreaEstudio = $fila->AreaEstudio;
				$obj->Temario = $fila->Temario;
				$obj->Precio = $fila->Precio;
				$obj->IDAsesor = $fila->IDAsesor;
				
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
	public function obtenerUno($IDCurso)
	{
		try
		{ 
            $this->conectar();
            
			$registro = null; /*Se declara una variable  que almacenará el registro obtenido de la BD*/
            
			$sentenciaSQL = $this->conexion->prepare("SELECT IDCurso, Nombre, Descripcion, AreaEstudio, Temario, Precio, IDAsesor
			from cursos WHERE IDCurso = ?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			$sentenciaSQL->execute([$IDCurso]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
            $registro = new Cursos();
			$registro->IDCurso = $fila->IDCurso;
			$registro->Nombre = $fila->Nombre;
			$registro->Descripcion = $fila->Descripcion;
			$registro->AreaEstudio = $fila->AreaEstudio;
			$registro->Temario = $fila->Temario;
			$registro->Precio = $fila->Precio;
			$registro->IDAsesor = $fila->IDAsesor;
			
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
	public function eliminar($IDCurso)
	{
		try 
		{
			$this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM cursos WHERE IDCurso = ?");			          
            
			$sentenciaSQL->execute(array($IDCurso));
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


	//Agrega un nuevo alumno de acuerdo al objeto recibido como parámetro
	public function agregar(Cursos $obj)
	{
        $IDCurso=0;
		try 
		{
            $sql = "INSERT INTO cursos (IDCurso, Nombre, Descripcion, AreaEstudio, Temario, Precio, IDAsesor) values(?, ?, ?, ?, ?, ?, ?)";
            var_dump($sql);
            $this->conectar();
            $this->conexion->prepare($sql)
                 ->execute(
                array(
					$obj->IDCurso,
					$obj->Nombre,
					$obj->Descripcion,
					$obj->AreaEstudio,
					$obj->Temario,
					$obj->Precio,
					$obj->IDAsesor		
				));
            $IDCurso=$this->conexion->lastInsertId();
            var_dump($IDCurso);
            return $IDCurso;
		}
		catch (Exception $e)
		{
			echo $e->getMessage();
			return $IDCurso;
		}
		finally
		{
            /*
            En caso de que se necesite manejar transacciones, no deberá desconectarse mientras la transacción deba persistir
            */
            Conexion::cerrarConexion();
        }
	}

	public function editar($IDCurso)
	{
		try 
		{
			$sql = "UPDATE cursos SET Nombre = ?, Descripcion = ?, AreaEstudio = ?, Temario = ?, Precio = ? WHERE IDCurso = ?";
            
            $this->conectar();
			
            $sentenciaSQL = $this->conexion->prepare($sql);
			$sentenciaSQL->execute(
				array(                    
					$obj->Nombre,
					$obj->Descripcion,
					$obj->AreaEstudio,
					$obj->Temario,
					$obj->Precio
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