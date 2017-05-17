function valida(){
    if(document.getElementById("caja2").value!=""){
        
        
        
    }else{
        
        alert("Ingresa el código del examen que te proporcionó tu docente");
        
    }
    
    
    
}

function extraer(){
    var k=0;

 var resul=parseInt((document.getElementById('num').value))+1;
        
      
        
       document.getElementById('pregunta').style.visibility="visible";
       document.getElementById('opcA').style.visibility="visible";
        document.getElementById('opcB').style.visibility="visible";
        document.getElementById('opcC').style.visibility="visible";
        document.getElementById('radioA').style.visibility="visible";
      document.getElementById('radioB').style.visibility="visible";
       document.getElementById('radioC').style.visibility="visible";
        document.getElementById('num').style.visibility="visible";
        
         document.getElementById('num').value=resul;
       
    
    
    
    
  
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


