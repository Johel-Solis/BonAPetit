function aggSpecial(id,nom,cost){
   
    var t=$('input[name="total"]').val();
    if(($('input[name="canP'+id+'"]').length)===0){
        
        t =(Number(t)+Number(cost));
        

    var fila='<tr id="pS'+id+' " ><td><input  type="number" id="cantP'+id+'" name="canP'+id+'"  min=1 max=8 value=1 style="width: 40px"></td><td><input name="idplates[]" type="hidden" readonly="readonly" style="border:0px" value="'+id+'" >'+nom +'</td><td> $'+cost +'</td> <td><a onclick="delTr('+id+')"><em class="fa fa-trash"></em></a></td></tr>';
    
    var btn = document.createElement("TR");
    btn.setAttribute("id", 'fila'+id+'');
   	btn.innerHTML=fila;
    document.getElementById("tablita").appendChild(btn);
    }else{
        var c=$('input[name="canP'+id+'"]').val();
        c ++;
        $('input[name="canP'+id+'"]').val(c);
        t =(Number(t)+Number(cost));
        
    }
    $('input[name="total"]').val(t)
}


function aggExecutive(){

	var id_meat =$('[name="mea"]:checked').val();
    var id_soup =$('[name="sou"]:checked').val();
    var id_princ =$('[name="princ"]:checked').val();
    var id_beve =$('[name="beve"]:checked').val();

    var cant =$('#cant').val();
    var obs =$('#obsEx').val();
    var meat =$('#meat'+id_meat).text();
    var soup =$('#sou'+id_soup).text();
    var princ =$('#princ'+id_princ).text();
    var beve =$('#bev'+id_beve).text();
    var t=$('input[name="total"]').val();

    if(($('input[name="c'+id_soup+'_'+id_meat+'_'+id_princ+'_'+id_beve+'"]').length)===0){
        var id_tr='t'+id_soup+'_'+id_meat+'_'+id_princ+'_'+id_beve;
        t +=(Number(cant)*Number(7000));

    var fila='<tr id="trt'+id_soup+'_'+id_meat+'_'+id_princ+'_'+id_beve+'"> <td> <input  type="number" id="c'+id_soup+'_'+id_meat+'_'+id_princ+'_'+id_beve+'"  name= "c'+id_soup+'_'+id_meat+'_'+id_princ+'_'+id_beve+'"  min=1 max=8 value='+cant+' style="width: 40px"></td> <td> <input name="idmeats[]" type="hidden" readonly="readonly" style="border:0px" value='+id_meat+' ><input name="idsoups[]" type="hidden" readonly="readonly" style="border:0px" value="'+id_soup+'" > <input name="idprinciples[]" type="hidden" readonly="readonly" style="border:0px" value="'+id_princ+'" > <input name="idbeverages[]" type="hidden" readonly="readonly" style="border:0px" value="'+id_beve+'" > ('+meat+','+soup+','+princ+','+beve +') </td><td>$7000 <input name="obsExs[]" type="hidden" readonly="readonly" style="border:0px" value="'+obs+'" ></td>  <td><a onclick="delTr('+id_tr+')><em class="fa fa-trash"></em></a></td> </tr>';
  	var btn = document.createElement("TR");
   	btn.innerHTML=fila;
    document.getElementById("tablita").appendChild(btn);
    }else{
        var c=$('input[name="c'+id_soup+'_'+id_meat+'_'+id_princ+'_'+id_beve+'"]').val();
        c ++;
        $('input[name="c'+id_soup+'_'+id_meat+'_'+id_princ+'_'+id_beve+'"]').val(c);
        
         t =(Number(t)+Number(7000));
        
    }
    $('input[name="total"]').val(t)
    
}

function eliminarFila(index) {
    $("#fila" + index).remove();
}