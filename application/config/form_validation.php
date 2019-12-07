<?php
/**
 * Reglas de validacion para formularios
 */
$config = array(
       
        /**
         * add_formulario
         * */
        'addCategorias'
        => array(
            
            array('field' => 'nombre','label' => 'Nombre','rules' => 'required|is_string|trim'),
            array('field' => 'descripcion','label' => 'descripcion','rules' => 'required|is_string|trim'),
          
            
        ),  
 /**
         * login
         * */
        'login'
        => array(
            
           array('field' => 'correo','label' => 'Correo ','rules' => 'required|is_string|trim|valid_email'),
            array('field' => 'password','label' => 'Contraseña','rules' => 'required|is_string|trim'),
            
        ),        
        /**
         * add_formulario
         * */
        'addClientes'
        => array(
            
            array('field' => 'nombre','label' => 'Nombre','rules' => 'required|is_string|trim'),
            array('field' => 'apellidos','label' => 'Apellidos','rules' => 'required|is_string|trim'),
            array('field' => 'telefono','label' => 'Teléfono','rules' => 'numeric|trim'),
            array('field' => 'direccion','label' => 'Direcciòn','rules' => 'required|is_string|trim'),
           ),
          /**
         * add_formulario inventarios
         * */
        'addInventario'
        => array(
            
            array('field' => 'nombre','label' => 'Nombre','rules' => 'required|is_string|trim'),
            array('field' => 'talla','label' => 'Talla','rules' => 'required|is_string|trim'),
            array('field' => 'costo','label' => 'Costo','rules' => 'required|is_string|trim'),
            array('field' => 'precio','label' => 'Precio','rules' => 'required|is_string|trim'),
            array('field' => 'stock','label' => 'Existencias','rules' => 'required|is_string|trim'),
        
            
        ), 

            /**
         * add_formulario
         * */
        'addEscuela'
        => array(
            
            array('field' => 'nombre','label' => 'Nombre','rules' => 'required|is_string|trim'),
            array('field' => 'telefono','label' => 'Teléfono','rules' => 'numeric|trim'),
            array('field' => 'direccion','label' => 'Direcciòn','rules' => 'required|is_string|trim'),
           ), 
            /**
         * add_formulario
         * */
        'addstore'
        => array(
            
            array('field' => 'comprobantes','label' => 'Combrobante','rules' => 'required|is_string|trim'),
            
           ), 
        'addUser'
        => array(
            
            array('field' => 'nombre','label' => 'Nombre','rules' => 'required|is_string|trim'),
            array('field' => 'apellidos','label' => 'Apellidos','rules' => 'required|is_string|trim'),
            array('field' => 'telefono','label' => 'Teléfono','rules' => 'numeric|trim'),
           ),
        /**
         * add_formulario
         * */
        'addProveedores'
        => array(
            
            array('field' => 'nombre','label' => 'Nombre','rules' => 'required|is_string|trim'),
            array('field' => 'apellidos','label' => 'Apellidos','rules' => 'required|is_string|trim'),
            array('field' => 'telefono','label' => 'Teléfono','rules' => 'numeric|trim'),
            array('field' => 'direccion','label' => 'Direcciòn','rules' => 'required|is_string|trim'),
            array('field' => 'correo','label' => 'Correo','rules' => 'required|is_string|trim'),

           ),
         /**
         * add_compras
         * */
        
   //éste es el final      
);
