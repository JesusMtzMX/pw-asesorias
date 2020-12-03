<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../modelo/Comentario.php'; /*importa el modelo */

class Comentario_Dao
{
    
	private $conexion; /*Crea una variable conexion*/
        
    private function conectar(){
        try{
			$this->conexion = Conexion::abrirConexion(); /*inicializa la variable conexion, llamando el metodo abrirConexion(); de la clase Conexion por medio de una instancia*/
		}
		catch(Exception $e)
		{
			die($e->getMessage()); /*Si la conexion no se establece se cortara el flujo enviando un Mensaje con el error*/
		}
    }
    
    
   /*Metodo que obtiene todos los Alumnos de la base de datos, retorna una lista de objetos */
	public function obtenerTodos()
	{
		try
		{
            $this->conectar();
            
			$lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

			$sentenciaSQL = $this->conexion->prepare("SELECT IDComentario, Alumno, Titulo, Mensaje, IDCurso
			FROM comentarios"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new Comentario();

				$obj->IDComentario= $fila->IDComentario;
				$obj->Alumno = 	$fila->Alumno;
				$obj->Titulo = $fila->Titulo;
				$obj->Mensaje = $fila->Mensaje;
				$obj->IDCurso = $fila->IDCurso;
				
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
	public function obtenerUno($IDComentario)
	{
		try
		{ 
            $this->conectar();
            
			$registro = null; /*Se declara una variable  que almacenará el registro obtenido de la BD*/
            
			$sentenciaSQL = $this->conexion->prepare("SELECT IDComentario, Alumno, Titulo, Mensaje, IDCurso
			FROM comentarios WHERE IDComentario = ?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			$sentenciaSQL->execute([$IDComentario]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
            $registro = new Comentario();
			$registro->IDComentario = $fila->IDComentario;
			$registro->Alumno = $fila->Alumno;
			$registro->Titulo = $fila->Titulo;
			$registro->Mensaje = $fila->Mensaje;
			$registro->IDCurso = $fila->IDCurso;
                
			
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
    
    //Elimina el Alumno con el id indicado como parámetro
	public function eliminar($IDComentario)
	{
		try 
		{
			$this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM comentarios WHERE IDComentario = ?");			          
            
			$sentenciaSQL->execute(array($IDComentario));
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

	//Agrega un nuevo Alumno de acuerdo al objeto recibido como parámetro
	public function agregar(Comentario $obj)
	{
        $clave=0;
		try 
		{
            $sql = "INSERT INTO comentarios (IDComentario, Alumno, Titulo, Mensaje, IDCurso) values(?, ?, ?, ?, ?)";
            var_dump($sql);
            $this->conectar();
            $this->conexion->prepare($sql)
                 ->execute(
                array($obj->IDComentario,
						$obj->Alumno,
						$obj->Titulo,
						$obj->Mensaje,
						$obj->IDCurso
					));
            $clave=$this->conexion->lastInsertId();
            var_dump($IDComentario);
            return $IDComentario;
		}
		catch (Exception $e)
		{
			echo $e->getMessage();
			return $IDComentario;
		}
		finally
		{
            /*
            En caso de que se necesite manejar transacciones, no deberá desconectarse mientras la transacción deba persistir
            */
            Conexion::cerrarConexion();
        }
	}

	public function editar($IDComentario)
	{
		try 
		{
			$sql = "UPDATE comentarios SET Titulo = ?, Mensaje = ? WHERE IDComentario = ?";
            
            $this->conectar();
			
            $sentenciaSQL = $this->conexion->prepare($sql);
			$sentenciaSQL->execute(
				array(
                    $obj->Titulo,
                    $obj->Mensaje
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