
var e = document.getElementById("secsoup");
                var selectedEquipmentDropdown = e.options[e.selectedIndex].value;//change it here
                 var selectedE = e.options[e.selectedIndex].text;

function dayweek(){

        var fech=$("#dateDay").val()+" 23:37:22";
        var lunes='<li role="presentation" class="active"> <a href="#tours" aria-controls="tours" role="tab" data-toggle="tab"> <i ><img src="https://img.icons8.com/metro/26/000000/monday.png"/></i> Lunes </a></li>';
        var martes='<li role="presentation" class="active"> <a href="#tours" aria-controls="tours" role="tab" data-toggle="tab"> <i ><img src="https://img.icons8.com/metro/26/000000/tuesday.png"/></i> Martes</a></li>';
        var miércoles='<li role="presentation" class="active"> <a href="#tours" aria-controls="tours" role="tab" data-toggle="tab"> <i ><img src="https://img.icons8.com/metro/26/000000/wednesday.png"/></i> Miercoles </a></li>';
        var jueves='<li role="presentation" class="active"> <a href="#tours" aria-controls="tours" role="tab" data-toggle="tab"> <i ><img src="https://img.icons8.com/metro/26/000000/thursday.png"/></i> Jueves</a></li>';
        var viernes='<li role="presentation" class="active"> <a href="#tours" aria-controls="tours" role="tab" data-toggle="tab"><i> <img src="https://img.icons8.com/metro/26/000000/friday.png"/></i> Viernes </a></li>';
        var sábado='<li role="presentation" class="active"> <a href="#tours" aria-controls="tours" role="tab" data-toggle="tab"> <i > <img src="https://img.icons8.com/metro/26/000000/saturday.png"/></i> Sabado </a></li>';
        var domingo='<li role="presentation" class="active"> <a href="#tours" aria-controls="tours" role="tab" data-toggle="tab"> <i ><img src="https://img.icons8.com/metro/26/000000/sunday.png"/></i> Domingo </a></li>';
        
        const fechaComoCadena = "2020-11-17 23:37:22"; // día lunes
        const dias = [
          domingo,
          lunes,
          martes,
          miércoles,
          jueves,
          viernes,
          sábado,
          domingo,
        ];
        const numeroDia = new Date(fech).getDay();
        const nombreDia = dias[numeroDia];
        document.getElementById("daySel").innerHTML=nombreDia;
        
}

               
function aggsoup(){  

    
               
                                
                                if(($('input[name="ltsoups[]"]').length)===0){
                                    var a = document.getElementById("secsoup");
                                    var selecdEquipmentDropdown = a.options[a.selectedIndex].value;//change it here
                                    var selecdE = e.options[a.selectedIndex].text;
                                    

                                    var txt = '<li id="lissp'+$("#secsoup").val()+'"> <input name="idsoups[]"  readonly="readonly" style="border:0px; width:0;" value="'+  $("#secsoup").val() +'"><span><i class="fa fa-angle-right"></i><input name="ltsoups[]" readonly="readonly" style="border:0px;" value="'+selecdE +'"><a  onclick="delSoup('+$("#secsoup").val()+')"><em class="fa fa-trash"></em></a></span></li>';
                                     
                                    
                            
                                    $("#lstsoup").append(txt);

                                     
                                 

                                }
                                else
                                {
                                    var ban=false;
                                    

                                    $('input[name="idsoups[]"]').each(function() {

                                        if(($(this).val())==$("#secsoup").val()){
                                            
                                            ban=true;

                                        }
                                        

                                    });

                                    if(ban){
                                        alert('la sopa ya se encuentra en la lista');
                                        

                                    }else
                                    {
                                        var a = document.getElementById("secsoup");
                                        var selecdEquipmentDropdown = a.options[a.selectedIndex].value;//change it here
                                        var selecdE = e.options[a.selectedIndex].text;
                                        alert(selecdE);

                                       var txt = '<li id="lissp'+$("#secsoup").val()+'"> <input name="idsoups[]" type="hidden" readonly="readonly" style="border:0px; width:0;" value="'+  $("#secsoup").val() +'"> <span><i class="fa fa-angle-right"></i><input name="ltsoups[]" readonly="readonly" style="border:0px;" value="'+selecdE +'"><a  onclick="delSoup('+$("#secsoup").val()+')"><em class="fa fa-trash"></em></a></span></li>';
            
                                          $("#lstsoup").append(txt);
                    
                               
                                        
                                       

                                    }

                                }
    

                                     
                            
                                            

        }


        function aggprinciple  ()
            {  
                            
                          
                                
                                if(($('input[name="ltprinciples[]"]').length)===0){
                                    var a = document.getElementById("secprinciple");
                                    var selecdEquipmentDropdown = a.options[a.selectedIndex].value;//change it here
                                    var selecdE = a.options[a.selectedIndex].text;

                                     var txt = '<li id="lispe'+$("#secprinciple").val()+'"><input name="idprinciples[]" type="hidden" readonly="readonly" style="border:0px" value="'+  $("#secprinciple").val()+'"><span><i class="fa fa-angle-right"></i><input name="ltprinciples[]" readonly="readonly" style="border:0px" value="'+selecdE +'"><a  onclick="delPrinciple('+$("#secprinciple").val()+')"><em class="fa fa-trash"></em></a></span></li>';

                                   
                            
                                    $("#lstprinciple").append(txt);

                                     
                                 

                                }
                                else
                                {
                                    ban=false;
                                    

                                    $('input[name="idprinciples[]"]').each(function() {

                                        if(($(this).val())==$("#secprinciple").val()){
                                            ban=true;

                                        }
                                        

                                    });

                                    if(ban){
                                        alert('la sopa ya se encuentra en la lista');
                                        

                                    }else
                                    {
                                        var a = document.getElementById("secprinciple");
                                        var selecdEquipmentDropdown = a.options[a.selectedIndex].value;//change it here
                                        var selecdE = a.options[a.selectedIndex].text;

                                        var txt = '<li id="lispe'+$("#secprinciple").val()+'"> <input name="idprinciples[]" type="hidden" readonly="readonly" style="border:0px" value="'+$("#secprinciple").val()+'"> <span><i class="fa fa-angle-right"></i><input name="ltprinciples[]" readonly="readonly" style="border:0px" value="'+selecdE +'"><a  onclick="delPrinciple('+$("#secprinciple").val()+')"><em class="fa fa-trash"></em></a></span></li>';

            
                                          $("#lstprinciple").append(txt);
                    
                               
                                        
                                       

                                    }

                                }
    

                                     
                            
                                            

        }
        function aggmeat  ()
            {  
                            
                          
                                
                                if(($('input[name="ltmeats[]"]').length)===0){

                                     var a = document.getElementById("secmeat");
                                    var selecdEquipmentDropdown = a.options[a.selectedIndex].value;//change it here
                                    var selecdE = a.options[a.selectedIndex].text;

                                     var txt = '<li id="lismt'+$("#secmeat").val()+'"> <input name="idmeats[]" type="hidden" readonly="readonly" style="border:0px" value="'+$("#secmeat").val()+'"> <span><i class="fa fa-angle-right"></i><input name="ltmeats[]" readonly="readonly" style="border:0px" value="'+selecdE +'"><a onclick="delMeat('+$("#secmeat").val()+')"><em class="fa fa-trash"></em></a></span></li>';


                                    
                            
                                    $("#lstmeat").append(txt);

                                     
                                 

                                }
                                else
                                {
                                    ban=false;
                                    

                                    $('input[name="idmeats[]"]').each(function() {

                                        if(($(this).val())==$("#secmeat").val()){
                                            ban=true;

                                        }
                                        

                                    });

                                    if(ban){
                                        alert('la sopa ya se encuentra en la lista');
                                        

                                    }else
                                    {
                                         var a = document.getElementById("secmeat");
                                    var selecdEquipmentDropdown = a.options[a.selectedIndex].value;//change it here
                                    var selecdE = a.options[a.selectedIndex].text;

                                     var txt = '<li id="lismt'+$("#secmeat").val()+'"><input name="idmeats[]" type="hidden" readonly="readonly" style="border:0px" value="'+  $("#secmeat").val()+'"> <span><i class="fa fa-angle-right"></i><input name="ltmeats[]" readonly="readonly" style="border:0px" value="'+selecdE +'"><a  onclick="delMeat('+$("#secmeat").val()+')"><em class="fa fa-trash"></em></a></span></li>';
                        
            
                                          $("#lstmeat").append(txt);
                    
                               
                                        
                                       

                                    }

                                }
    

                                     
                            
                                            

        }
        function aggbeverage  ()
            {  
                            
                          
                                
                                if(($('input[name="ltbeverages[]"]').length)===0){

                                    var a = document.getElementById("secbeverage");
                                    var selecdEquipmentDropdown = a.options[a.selectedIndex].value;//change it here
                                    var selecdE = a.options[a.selectedIndex].text;

                                     var txt = '<li id="lisbg'+$("#secbeverage").val()+'"><input name="idbeverages[]" type="hidden" readonly="readonly" style="border:0px" value="'+$("#secbeverage").val() +'"> <span><i class="fa fa-angle-right"></i><input name="ltbeverages[]" readonly="readonly" style="border:0px" value="'+selecdE +'"><a  onclick="delBeverage('+$("#secbeverage").val()+')"><em class="fa fa-trash"></em></a></span></li>';
                                    
                            
                                    $("#lstbeverage").append(txt);

                                     
                                 

                                }
                                else
                                {
                                    ban=false;
                                    

                                    $('input[name="idbeverages[]"]').each(function() {

                                        if(($(this).val())==$("#secbeverage").val()){
                                            ban=true;

                                        }
                                        

                                    });

                                    if(ban){
                                        alert('la sopa ya se encuentra en la lista');
                                        

                                    }else
                                    {
                                        var a = document.getElementById("secbeverage");
                                    var selecdEquipmentDropdown = a.options[a.selectedIndex].value;//change it here
                                    var selecdE = a.options[a.selectedIndex].text;

                                     var txt = '<li id="lisbg'+$("#secbeverage").val()+'"><input name="idbeverages[]" type="hidden" readonly="readonly" style="border:0px" value="'+$("#secbeverage").val() +'"> <span><i class="fa fa-angle-right"></i><input name="ltbeverages[]" readonly="readonly" style="border:0px" value="'+selecdE +'"><a  onclick="delBeverage('+$("#secbeverage").val()+')"><em class="fa fa-trash"></em></a></span></li>';
                            
                                    $("#lstbeverage").append(txt);
                               
                                        
                                       

                                    }

                                }
    

                                     
                            
                                            

        }

        function delSoup(id)
        {
           var  il='#lissp'+id;
            $(il).remove();


        }
    
    

    
       
        function delPrinciple(id)
        {
           var  il='#lispe'+id;
            $(il).remove();
        }




        function delBeverage(id)
        {
           var  il='#lisbg'+id;
            $(il).remove();
        }


        function delMeat(id)
        {
           var  il='#lismt'+id;
            $(il).remove();

        }