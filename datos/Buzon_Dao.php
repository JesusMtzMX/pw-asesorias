<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../modelo/Buzon.php'; /*importa el modelo */

class Buzon_Dao
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

			$sentenciaSQL = $this->conexion->prepare("SELECT IDComentario, IDAsesorado, Tipo, Descripcion
			FROM buzon"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			
			$sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Se recorre el cursor para obtener los datos*/
			foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
			{
				$obj = new Buzon();

                $obj->IDComentario = $fila->IDComentario;
                $obj->IDAsesorado = $fila->IDAsesorado;
                $obj->Tipo = $fila->Tipo;
                $obj->Descripcion = $fila->Descripcion;
					
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
            
			$sentenciaSQL = $this->conexion->prepare("SELECT IDComentario, IDAsesorado, Tipo, Descripcion
			from buzon WHERE IDComentario = ?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/
			$sentenciaSQL->execute([$IDComentario]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/
            
            /*Obtiene los datos*/
			$fila = $sentenciaSQL->fetch(PDO::FETCH_OBJ);
			
            $registro = new Buzon();

            $registro->IDComentario = $fila->IDComentario;
            $registro->IDAsesorado = $fila->IDAsesorado;
            $registro->Tipo = $fila->Tipo;
            $registro->Descripcion = $fila->Descripcion;
			
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
	public function eliminar($IDComentario)
	{
		try 
		{
			$this->conectar();
            
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM buzon WHERE IDComentario = ?");			          
            
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
	
	public function agregar(Buzon $obj)
	{
        $IDComentario=0;
		try 
		{
            $sql = "INSERT INTO buzon (IDComentario, IDAsesorado, Tipo, Descripcion) values (?, ?, ?, ?)";
            var_dump($sql);
            $this->conectar();
            
            $this->conexion->prepare($sql)
                ->execute(
                array($obj->IDComentario,
						$obj->IDAsesorado,
						$obj->Tipo,
						$obj->Descripcion						
                ));
                    
            $IDComentario=$this->conexion->lastInsertId();
            
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
			$sql = "UPDATE buzon SET Tipo = ?, Descripcion = ? WHERE IDComentario = ?";
            
            $this->conectar();
			
            $sentenciaSQL = $this->conexion->prepare($sql);
			$sentenciaSQL->execute(
				array(
                    $obj->Tipo,
                    $obj->Descripcion,                    
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